<?php

namespace App\Http\Controllers;

use App\Models\Manga;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('welcome',['mangas' => Manga::orderBy('created_at', 'asc')->paginate(20)]);
    }
}
