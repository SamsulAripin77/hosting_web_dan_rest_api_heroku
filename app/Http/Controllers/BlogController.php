<?php

namespace App\Http\Controllers;

use App\article;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $articles = article::latest()->paginate(5);
        return view('blogs.index',compact('articles'))->with('i',(request()->input('page',1)-1)*5);


        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'author' => 'required',
            'title' => 'required|min:10',
            'paragraph' => 'required|min:20'
        ]);

        article::create($request->all());

        return redirect()->route('blogs.index')->with('status','berhasil menambahkan article');

    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\article  $article
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = article::find($id);
        return view('blogs.edit',['article'=>$article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = article::find($id);
        $request->validate([
            'author' => 'required',
            'title' => 'required|min:15',
            'paragraph' => 'required|min:30'
        ]);

        $article->update($request->all());

        return redirect()->route('blog.edit')->with('status','berhasil merubah article');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = article::find($id);
        $blog->delete();
        

    }
}
