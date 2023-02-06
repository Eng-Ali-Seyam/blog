<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddNewsRequest;
use App\Http\Requests\EditNewsRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $news = News::all()->where('user_id','=',Auth::user()->id);
        return view('dashboard.my_news' ,compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.add_news',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddNewsRequest $request)
    {
            $file=$request->file('image');
            $filename=$file->getClientOriginalName();
            $file=$request->file('image')->storeAs('news',$filename,'news_images');
            $news = News::create([
                'main_title' => $request->main_title,
                'sub_title' => $request->sub_title,
                'content'=>$request->news_content,
                'image_path' => $filename,
                'category_id'=>$request->category,
                'user_id' => Auth::user()->id ,
            ]);
        return redirect()->route('news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::findorFail($id);
        $categories = Category::all();
        return view('dashboard.edit_news',compact('news','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditNewsRequest $request, $id)
    {

            $news = News::findorFail($id);
            $file=$request->file('image');
            $filename=$news->image_path;

            if ($request->hasFile('image')){
                $filename =$file->getClientOriginalName() ;
                $file=$request->file('image')->storeAs('news',$filename,'news_images');
            }
            $news ->update([
                'main_title' => $request->main_title,
                'sub_title' => $request->sub_title,
                'content'=>$request->news_content,
                'image_path' => $filename,
                'category_id'=>$request->category,
            ]);

        return redirect()->route('news.index')  ;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::where('id',$id)->delete();
        return redirect()->route('news.index')  ;
    }
}
