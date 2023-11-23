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
use App\Models\Categorie;
use App\Models\User;
use App\Models\Inrichting;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\EpocheController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SortController;
use Illuminate\Http\Request;

class InrichtingController extends Controller
{
    public function index(Request $request)
    {
       
        $sorts = Sort::all();
        $brands = Brand::all();
        $epoches = Epoche::all();
        $owners = Owner::all();
        $colors1 = Color1::all();
        $colors2 = Color2::all();
        $categories = Categorie::all();

        $type = $request->get('type', 'sorts'); 
        $sortQuery = Sort::query();
        $brandQuery = Sort::query();


        if ($request->filled('search')) {
            $searchTerm = $request->input('search');
            $sortQuery->where(function ($query) use ($searchTerm) {
                $query->where('sort_name', 'like', "%$searchTerm%");
            });
        }

        if ($request->filled('search')) {
            $searchTerm = $request->input('search');
            $brandQuery->where(function ($query) use ($searchTerm) {
                $query->where('sort_name', 'like', "%$searchTerm%");
            });
        }
        

        $sortSearch = $sortQuery->paginate(1);
        $brandSearch = $brandQuery->paginate(1);
        // return view('inrichtings.index', compact('sortSearch', 'brandSearch'));

        return view('inrichtings.index', compact('sorts', 'brands', 'epoches', 'owners', 'colors1', 'colors2', 'type'));
    }


    public function create()
    {
        return view('inrichtings.create');
    }

    //SORT TOEVOEGEN
    public function createSort(Request $request)
    {
        Sort::create($request->all());
        // $request->searchable();
        return redirect()->back()->with('message', 'Soort created successfully!');
    }

    //BRAND TOEVOEGEN
    public function createBrand(Request $request)
    {
        Brand::create($request->all());
        return redirect()->back()->with('message', 'Merk created successfully!');
    }

    //EPOCHE TOEVOEGEN
    public function createEpoche(Request $request)
    {
        Epoche::create($request->all());
        return redirect()->back()->with('message', 'Epoche created successfully!');
    }

    //OWNER TOEVOEGEN
    public function createOwner(Request $request)
    {
        Owner::create($request->all());
        return redirect()->back()->with('message', 'Eigenaar created successfully!');
    }

    //COLOR1 TOEVOEGEN
    public function createColor1(Request $request)
    {
        Color1::create($request->all());
        return redirect()->back()->with('message', 'Kleur 1 created successfully!');
    }

    //COLOR2 TOEVOEGEN
    public function createColor2(Request $request)
    {
        Color2::create($request->all());
        return redirect()->back()->with('message', 'Kleur 2 created successfully!');
    }

    //CATEGORY TOEVOEGEN
    public function createCategorie(Request $request)
{
    $data = $request->validate([
        'category_name' => 'required|string|max:255',
        // Add validation rules for other fields if needed
    ]);

    Categorie::create($data);

    return redirect()->back()->with('message', 'Categorie created successfully!');
}

    public function destroySort(Sort $inrichting)
    {
        $inrichting->delete();
        return redirect(route('inrichtings.index'))->with('message', 'Soort deleted successfully!');
    }

    public function destroyBrand(Brand $inrichting)
    {
        $inrichting->delete();
        return redirect(route('inrichtings.index'))->with('message', 'Merk deleted successfully!');
    }
}
