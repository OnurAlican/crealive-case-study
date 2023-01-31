<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Category;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents=Content::orderBy('created_at','desc')->get();
        return view('Admin.contents',[
            'contents'=>$contents
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contents=Content::all();
        $categories=Category::all();

        return view('admin.addContent',[
            'contents'=>$contents,
            'categories'=>$categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        if(!isset($request->categoryId))
        {
            return redirect('/admin/categories')->with('error','Önce Bir Kategori Eklemelisiniz!');
        }
        $content=new Content();
        $content->title=$request->title;
        $content->content=$request->contenttext;
        if($request->isActive=="on")
        {
            $content->isActive=true;
        }
        else{
            $content->isActive=false;
        }
        $content->categoryId=$request->categoryId;
        $content->save();
        return redirect('/admin/contents');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Content $content)
    {
        $contents=Content::all();
        $content=Content::find($content->id);
        $categories=Category::all();


        return view('admin.editContent',[
            'currentContent'=>$content,
            'contents'=>$contents,
            'categories'=>$categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Content $content)
    {
        $content=Content::find($content->id);
        $content->title=$request->title;
        $content->content=$request->contenttext;
        if($request->isActive=="on")
        {
            $content->isActive=true;
        }
        else{
            $content->isActive=false;
        }
        $content->categoryId=$request->categoryId;
        $content->save();
        return redirect('/admin/contents');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content)
    {
        $content=Content::find($content->id);
        $content->delete();
        return redirect('/admin/contents');
    }
}
