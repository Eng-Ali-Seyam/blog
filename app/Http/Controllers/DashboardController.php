<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('dashboard.home');
    }
    public function admin()
    {

        $users = User::all();

        return view('dashboard.admin',compact('users'));
    }
    public function my_news()
    {
        return view('dashboard.my_news');
    }
    public function add_news()
    {

        $categories = Category::all();
        return view('dashboard.add_news',compact('categories'));
    }

    public function categories()
    {

        return view('dashboard.categories');
    }
}
