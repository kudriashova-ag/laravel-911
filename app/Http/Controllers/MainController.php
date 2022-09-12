<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        $articles = Article::with(['category', 'tags'])->get();
        return view('home', compact('articles'));
    }

    public function contacts()
    {
        $title = 'Contact Us';
        return view('contacts', compact('title'));
    }

    public function getContactsForm(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'message' => 'required',
        ]);

        // return redirect('contacts')->with('success', 'Thank!');
        // return redirect()->route('mail')->with('success', 'Thank!');
        return to_route('mail')->with('success', 'Thank!');
    }

    public function category(Category $category)
    {
        //$articles = $category->articles()->paginate(15);
        $articles = Article::where('category_id', '=', $category->id)->paginate(3);
        return view('content.category', compact('articles', 'category'));
    }
}
