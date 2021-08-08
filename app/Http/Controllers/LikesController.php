<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use App\Post;
use Auth;
use Validator;

class LikesController extends Controller
{
    public function store($id)
    {
        \Auth::user()->like($id);
        return back();
    }
    
    public function destroy($id)
    {
        \Auth::user()->unlike($id);
        return back();
    }
}
