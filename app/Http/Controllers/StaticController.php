<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;

class StaticController extends Controller
{
    function index(){
//        $news = User::all()->news;

        $news = News::join('users', 'news.user_id', '=', 'users.id')
            ->get(['news.*', 'users.name']); // include the name column only from user table

        return view('home.news',compact('news'));
    }

    function about(){
        return view('home.about');
    }

    public function show($id)
    {
        $news = News::join('users', 'news.user_id', '=', 'users.id')
            ->find($id);
        return view('home.show',compact('news'));
    }
}
