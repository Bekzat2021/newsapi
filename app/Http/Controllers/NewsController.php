<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\User;
use App\Models\Rubric;
use \Validator;

class NewsController extends Controller
{
    public function allArticles()
    {
        return News::all();
    }

    public function article($id)
    {
        $articles = News::find($id);
        
        if(is_null($articles))
            return response()->json(['error' => true, 'message' => 'Not found'], 404);

        return response()->json($articles, 200);
    }

    public function create(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'heading' => 'required | min: 3',
            'author' => 'required | min:3 ',
            'announcement' => 'required | min:3',
            'author' => 'required',
            'text' => 'required',
            'rubric' => 'required',
            'publication_date' => 'required'
        ]);
        if($validator->fails())
            return response()->json($validator->errors(), 400);
        
        $userExists = User::where('name', '=', $req->input('author'))->first();
        $rubricExists = Rubric::where('name', '=', $req->input('rubric'))->first();
        
        if(($userExists == null) || ($rubricExists == null)){
            return response()->json('Author or rubric does not exists', 404);
        }else{
            return response()->json(News::create($req->all()), 201);
        }
    }

    public function newsByAuthor($author)
    {
        $newsValidator = News::where('author', '=', $author);

        if(is_null($newsValidator))
            return response()->json(['error' => true, 'message' => 'Not found'], 404);
        
        return response()->json(News::where('author', '=', $author)->get(), 200);
    }

    public function newsByRubric($rubric)
    {
        $rubricValidator = News::where('rubric', '=', $rubric);

        if(is_null($rubricValidator))
            return response()->json(['error' => true, 'message' => 'Not found'], 404);

        return response()->json(News::where('rubric', '=', $rubric)->get(), 200);
    }

    public function newsByHeading($heading)
    {
        $headingValidator = News::where('heading', '=', $heading);

        if(is_null($headingValidator))
            return response()->json(['error' => true, 'message' => 'Not found'], 404);

        return response()->json(News::where('heading', '=', $heading)->get(), 200);
    }
}
