<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Question;
use App\Http\Resources\QuestionResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class QuestionController extends Controller
{
    public function index()
    {
        if(request('category'))
        {
            $category=Category::where('name',request('category'))->first();
            if(!$category)
            {
                return response()->json(['status'=>'No Category Found with this name'],404);
            }
            $questions=Question::where('category_id',$category->id)->paginate(3);
        }
        else $questions=Question::paginate(3);

        return QuestionResource::collection($questions);
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'fullname' => 'required',
            'age' => 'required|integer|between:10,100',
            'phone' => 'required',
            'email' => 'required|email',
            'reply_method' => ['required',Rule::in(['whatsapp','facebook','email'])],
            'title' => 'required',
            'body' => 'required',
            'sharable_name' => 'required|boolean',
            'sharable_content' => 'required|boolean',
            'category_id' => 'required|exists:categories,id',
        ]);

        if($validator->fails())
        {
            return response()->json(['status' => $validator->errors()],400);
        }

        $question= Question::create([
            'category_id' => $request->category_id,
            'fullname' => $request->fullname,
            'age' => $request->age,
            'phone' => $request->phone,
            'email' => $request->email,
            'reply_method' => $request->reply_method,
            'social_link' => $request->social_link,
            'title' => $request->title,
            'body' => $request->body,
            'sharable_name' => $request->sharable_name,
            'sharable_content' => $request->sharable_content,
        ]);

        // //if tags array is null no tags will be attached
        // $filtered= null;
        // if(request('tags')) $filtered=array_unique(request('tags'));
        // $question->tags()->attach($filtered);

        return response()->json(['status'=>'ok']);
    }

    public function show($id)
    {
        if(!$question=Question::find($id))
        {
            return response()->json(['status'=>'No Question Found with this id'],404);
        }
        return new QuestionResource($question);
    }

    public function update(Request $request, $id)
    {
        if(!$question=Question::find($id))
        {
            return response()->json(['status'=>'No Question Found with this id'],404);
        }
        
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'body' => 'required',
            'status' => 'required|boolean',
        ]);

        if($validator->fails())
        {
            return response()->json(['status',$validator->errors()],400);
        }


        $question->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'body' => $request->body,
            'status' => $request->status,

        ]);

        // $filtered = null;
        // if(request('tags')) $filtered=array_unique(request('tags'));
        // $question->tags()->detach();
        // $question->tags()->attach($filtered);


        return response()->json(['status'=>'ok']);
    }

    public function destroy($id)
    {
        // i haven't used (Request $request) because it uses findOrFail and redirects to a not found page
        if(!$question=Question::find($id))
        {
            return response()->json(['status'=>'No Question Found with this id'],404);
        }

        $question->delete();
        return response()->json(['status'=>'ok']);
    }
}
