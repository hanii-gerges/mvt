<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Http\Resources\ArticleResource;
use Illuminate\Support\Facades\Storage;

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
                return response()->json(['status'=>'No Category Found with this name'],404);
            }
            $articles=Article::where('category_id',$category->id)->paginate(12);
        }
        else $articles=Article::paginate(12);

        return ArticleResource::collection($articles);
    }

    public function showUnpublished()
    {
        $articles = Article::where('status',0)->get();
        return ArticleResource::collection($articles);
    }

    public function store(Request $request)
    {
        // if(Auth::user()->cant('create',Article::class))
        // return response()->json(['status'=>'Unauthorized'],403);

        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'body' => 'required',
            'status' => 'required|boolean',
            'category_id' => 'required',
            'image' => 'required',
        ]);

        if($validator->fails())
        {
            return response()->json(['status' => $validator->errors()],400);
        }

        $article = Article::create([
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'body' => $request->body,
            'status' => $request->status,
        ]);

        
        if($request->file('image'))
        $article->addMedia($request->file('image'))->toMediaCollection();

        //$path = Storage::disk('s3')->put('images/originals', $request->image);

        // //if tags array is null no tags will be attached
        // $filtered= null;
        // if(request('tags')) $filtered=array_unique(request('tags'));
        // $article->tags()->attach($filtered);

        return response()->json(['status'=>'ok']);
    }

    
    public function show($id)
    {
        if(!$article = Article::find($id))
        {
            return response()->json(['status'=>'No Article Found with this id'],404);
        }
        return new ArticleResource($article);
    }

    
    public function update(Request $request, $id)
    {
        if(!$article=Article::find($id))
        {
            return response()->json(['status'=>'No Article Found with this id'],404);
        }
        
        // if(Auth::user()->cant('update',$article))
        // return response()->json(['status'=>'Unauthorized'],403);

        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
        ]);

        if($validator->fails())
        {
            return response()->json(['status' => $validator->errors()],400);
        }


        $article->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'body' => $request->body,
        ]);
        
        
        // $filtered = null;
        // if(request('tags')) $filtered=array_unique(request('tags'));
        // $article->tags()->detach();
        // $article->tags()->attach($filtered);


        return response()->json(['status'=>'ok']);
    }

  
    public function destroy($id)
    {
        // i haven't used (Article $article) because it uses findOrFail and redirects to a not found page
        if(!$article=Article::find($id))
        {
            return response()->json(['status'=>'No Articles Found with this id'],404);
        }

        // if(Auth::user()->cant('delete',$article))
        // return response()->json(['status'=>'Unauthorized'],403);

        $article->delete();
        return response()->json(['status'=>'ok']);
    }

}
