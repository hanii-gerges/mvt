<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Http\Resources\EventResource;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return EventResource::collection($events);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'body' => 'required',
            'status' => 'required|boolean',
            'participants' =>'exists:users,id',
        ]);

        if($validator->fails())
        {
            return response()->json(['status' => $validator->errors()]);
        }

        $event = Event::create([
            'head_id' => 1, //Auth id
            'title' => $request->title,
            'body' => $request->body,
            'status' => $request->status,
        ]);

        //if tags array is null no tags will be attached
        $filtered = null;
        if(request('participants')) $filtered=array_unique(request('participants'));
        $event->users()->attach($filtered);

        return response()->json(['status'=>'ok']);
    }
    
    public function show($id)
    {
        if(!$event = Event::find($id))
        {
            return response()->json(['status' => 'No Event Found with this id'],404);
        }
        
        return new EventResource($event);
    }
    
    public function update(Request $request, $id)
    {
        if(!$event=Event::find($id))
        {
            return response()->json(['status'=>'No Event Found with this id'],404);
        }

        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'body' => 'required',
            'participants' =>'exists:users,id',
        ]);

        if($validator->fails())
        {
            return response()->json(['status' => $validator->errors()]);
        }


        $event->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        $filtered = null;
        if(request('participants')) $filtered=array_unique(request('participants'));
        $event->users()->detach();
        $event->users()->attach($filtered);

        return response()->json(['status'=>'ok']);

    }

    public function destroy($id)
    {
        // i haven't used (Request $request) because it uses findOrFail and redirects to a not found page
        if(!$event=Event::find($id))
        {
            return response()->json(['status'=>'No Event Found with this id']);
        }

        $event->delete();
        return response()->json(['status'=>'ok']);
    }
}
