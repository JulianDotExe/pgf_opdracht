<?php

namespace App\Http\Controllers;
use App\Models\Views;

use Illuminate\Http\Request;

class ViewsController extends Controller
{
    public function index() {
        $news = News::all(); // Haal alle nieuwsitems op (je kunt dit aanpassen op basis van je vereisten)

        return view('views.news', ['news' => $news]);
    }
}
