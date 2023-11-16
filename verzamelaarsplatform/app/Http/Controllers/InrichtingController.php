<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Overview;
use App\Models\Sort;
use App\Models\Brand;
use App\Models\Epoche;
use App\Models\Owner;
use App\Models\Color1;
use App\Models\Color2;
use App\Models\User;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\EpocheController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SortController;
use App\Http\Controllers\InrichtingController;
use Illuminate\Http\Request;

class InrichtingController extends Controller
{
    public function index()
    {
        // $inrichtings = Inrichting::all()->sortBy('sort_id');
        // $inrichtings = Inrichting::paginate(3);

        return view('inrichtings.index');
    }

    public function create()
    {
        return view('inrichtings.create');
    }

    //SORT TOEVOEGEN
    public function createSort(Request $request)
    {
        Sort::create($request->all());
        return redirect()->back();
    }

    //BRAND TOEVOEGEN
    public function createBrand(Request $request)
    {
        Brand::create($request->all());
        return redirect()->back();
    }

    //EPOCHE TOEVOEGEN
    public function createEpoche(Request $request)
    {
         Epoche::create($request->all());
         return redirect()->back();
    }

    //OWNER TOEVOEGEN
    public function createOwner(Request $request)
    {
        Owner::create($request->all());
        return redirect()->back();
    }

    //COLOR1 TOEVOEGEN
    public function createColor1(Request $request)
    {
        Color1::create($request->all());
        return redirect()->back();
    }

    //COLOR2 TOEVOEGEN
    public function createColor2(Request $request)
    {
        Color2::create($request->all());
        return redirect()->back();
    }
}
