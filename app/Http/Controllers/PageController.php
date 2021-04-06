<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
class PageController extends Controller
{
    public function index()
    {
        return view('pages', [
            'pages' => Page::all()
        ]);
    }
    public function show($id)
    {
        return view('page', [
            'page' => Page::findOrFail($id)
        ]);
    }
}
