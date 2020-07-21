<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\User;
use App\Models\Rubric;
use Validator;

class RubricController extends Controller
{
    //

    public function create(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required | min:5 '
        ]);
        if($validator->fails())
            return response()->json($validator->errors(), 400);

        return response()->json(Rubric::create($req->all()), 201);
    }
}
