<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Http\Resources\NewsResource;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    
    public function index()
    {
        $news = News::all();
        return NewsResource::collection($news);
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'body' => 'required',
            'status' => 'required|boolean'
        ]);

        if($validator->fails())
        {
            return response()->json(['status' => $validator->errors()]);
        }

        News::create([
            'user_id' => 1,//Auth::user(),
            'title' => $request->title,
            'body' => $request->body,
            'status' => $request->status
            
        ]);

        return response()->json(['status'=>'ok']);

    }

    
    public function show($id)
    {
        if(!$news=News::find($id))
        {
            return response()->json(['status'=>'No News Found with this id']);
        }
        return new NewsResource($news);
    }

   

   
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'body' => 'required',
        ]);

        if($validator->fails())
        {
            return response()->json(['status',$validator->errors()]);
        }

        if(!$news=News::find($id))
        {
            return response()->json(['status'=>'No News Found with this id']);
        }

        $news->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return response()->json(['status'=>'ok']);

    }

    
    public function destroy($id)
    {
        if(!$news=News::find($id))
        {
            return response()->json(['status'=>'No News Found with this id']);
        }

        $news->delete();
        return response()->json(['status'=>'ok']);
    }
}
