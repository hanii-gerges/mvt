<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Question;
use App\Http\Resources\QuestionResource;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    public function index()
    {
        if(request('category'))
        {
            $category=Category::where('name',request('category'))->first();
            if(!$category)
            {
                return response()->json(['status'=>'No Category Found with this name']);
            }
            $questions=$category->questions;
        }
        else if(request('tag'))
        {
            $tag=Tag::where('name',request('tag'))->first();
            if(!$tag)
            {
                return response()->json(['status'=>'No Tag Found with this name']);
            }
            $questions=$tag->questions;
        }
        else $questions=Question::all();

        return QuestionResource::collection($questions);
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'body' => 'required',
            'tags' => 'exists:tags,id'
        ]);

        if($validator->fails())
        {
            return response()->json(['status' => $validator->errors()]);
        }

        $question= Question::create([
            'user_id' => 1,//Auth::user(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'body' => $request->body,
            'status' => $request->status
        ]);

        //if tags array is null no tags will be attached
        $filtered= null;
        if(request('tags')) $filtered=array_unique(request('tags'));
        $question->tags()->attach($filtered);

        return response()->json(['status'=>'ok']);
    }

    public function show($id)
    {
        if(!$question=Question::find($id))
        {
            return response()->json(['status'=>'No Question Found with this id']);
        }
        return new QuestionResource($question);
    }

    public function update(Request $request, $id)
    {
        if(!$question=Question::find($id))
        {
            return response()->json(['status'=>'No Question Found with this id']);
        }
        
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'body' => 'required',
            'tags' => 'exists:tags,id'
        ]);

        if($validator->fails())
        {
            return response()->json(['status',$validator->errors()]);
        }


        $question->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'body' => $request->body,
        ]);
        $filtered = null;
        if(request('tags')) $filtered=array_unique(request('tags'));
        $question->tags()->detach();
        $question->tags()->attach($filtered);


        return response()->json(['status'=>'ok']);
    }

    public function destroy($id)
    {
        // i haven't used (Request $request) because it uses findOrFail and redirects to a not found page
        if(!$question=Question::find($id))
        {
            return response()->json(['status'=>'No Question Found with this id']);
        }

        $question->delete();
        return response()->json(['status'=>'ok']);
    }
}
