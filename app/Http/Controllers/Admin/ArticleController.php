<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::paginate(3);
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.articles.create', compact('categories'));
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
            'name' => 'required|min:3|max:100',
            'content' => 'required',
            'category' => 'exists:categories,id'
        ]);

        // $article = new Article();
        // $article->name = $request->name;
        // $article->content = $request->content;
        // $article->category_id = $request->category;
        // $article->save();

        // $article = Article::create([
        //     'name'=> $request->name,
        //     'content'=> $request->content,
        //     'category_id'=> $request->category,
        // ]);

        $article = Article::create($request->all());
        
        $file = $request->file('image');
        if($file){
            $fName = $file->getClientOriginalName();
            $file->move(Storage::path('public/uploads/'), $fName);
            $article->image = 'public/uploads/' . $fName;
            $article->save();
        }
        return redirect()->route('admin.articles.index')->with('success', 'Article ' . $article->id . ' added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:100',
            'content' => 'required',
            'category' => 'exists:categories,id'
        ]);
        $article = Article::find($id);
        $article->update($request->all());

        return redirect()->route('admin.articles.index')->with('success', 'Article ' . $article->id . ' added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
