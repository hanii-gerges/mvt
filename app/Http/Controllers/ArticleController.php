<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Resources\ArticleResource;

class ArticleController extends Controller
{
    // sql injection ??!!
    public function index()
    {
        if(request('category'))
        {
            $category=Category::where('name',request('category'))->first();
            if(!$category)
            {
                return response()->json(['status'=>'No Category Found with this name']);
            }
            $articles=$category->articles;
        }
        else if(request('tag'))
        {
            $tag=Tag::where('name',request('tag'))->first();
            if(!$tag)
            {
                return response()->json(['status'=>'No Tag Found with this name']);
            }
            $articles=$tag->articles;
        }
        else $articles=Article::all();

        return ArticleResource::collection($articles);
    }

   
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'body' => 'required',
            'status' => 'required|boolean',
            'category_id' => 'required',
            'tags' => 'exists:tags,id'
        ]);

        if($validator->fails())
        {
            return response()->json(['status' => $validator->errors()]);
        }

        $article= Article::create([
            'user_id' => 1,//Auth::user(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'body' => $request->body,
            'status' => $request->status
            
        ]);

        //if tags array is null no tags will be attached
        $filtered= null;
        if(request('tags')) $filtered=array_unique(request('tags'));
        $article->tags()->attach($filtered);

        return response()->json(['status'=>'ok']);
    }

    
    public function show($id)
    {
        if(!$article = Article::find($id))
        {
            return response()->json(['status'=>'No Article Found with this id']);
        }
        return new ArticleResource($article);
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
            'tags' => 'exists:tags,id'
        ]);

        if($validator->fails())
        {
            return response()->json(['status' => $validator->errors()]);
        }

        if(!$article=Article::find($id))
        {
            return response()->json(['status'=>'No Article Found with this id']);
        }

        $article->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'body' => $request->body,
        ]);
        $filtered = null;
        if(request('tags')) $filtered=array_unique(request('tags'));
        $article->tags()->detach();
        $article->tags()->attach($filtered);


        return response()->json(['status'=>'ok']);
    }

  
    public function destroy($id)
    {
        // i haven't used (Request $request) because it uses findOrFail and redirects to a not found page
        if(!$article=Article::find($id))
        {
            return response()->json(['status'=>'No Articles Found with this id']);
        }

        $article->delete();
        return response()->json(['status'=>'ok']);
    }

}