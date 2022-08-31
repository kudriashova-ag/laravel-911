<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $title = 'Home page';
        $subtitle = '<h2>Subtitle</h2>';
        $arr = ['one', 'two', 'three'];

        return view('home', compact('title', 'subtitle', 'arr'));
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
}
