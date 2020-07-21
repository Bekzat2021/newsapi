<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\User;
use App\Models\Rubric;
use Validator;

class UserController extends Controller
{
    //
    public function allAuthors()
    {
        return response()->json(User::all(), 200);
    }

    public function create(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required | min: 3',
            'email' => 'required | min: 3',
        ]);

        if($validator->fails())
            return response()->json($validator->errors(), 400);

        return response()->json(User::create($req->all()), 201);
    }
}
