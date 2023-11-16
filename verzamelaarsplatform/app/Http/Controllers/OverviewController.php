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
use Illuminate\Http\Request;

class OverviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // echo 'JEMOER';

        $overviews = Overview::all()->sortBy('sort_id');
        $overviews = Overview::paginate(3);

        return view('overviews.index', ['overviews' => $overviews]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    $sorts = Sort::all();  
    $brands = Brand::all();
    $epoches = Epoche::all();
    $owners = Owner::all();
    $colors1 = Color1::all();
    $colors2 = Color2::all();


    return view('overviews.create', compact('sorts', 'brands', 'epoches', 'owners', 'colors1', 'colors2'));
    }   


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'sort_id' => 'required',
            'brand_id' => 'required',
            'catalogusnr' => 'required',
            'epoche_id' => 'required',
            'nummer' => 'required',
            'eigenschappen' => 'required',
            'owner_id' => 'required',
            'color1_id' => 'required',
            'color2_id' => 'required',
            'bijzonderheden' => 'required',
            'foto' => 'required',
        ]);


     // Haal de ID van de ingelogde gebruiker op
     $user_id = Auth::id();

     // Maak het overzichtsrecord met de juiste user_id
     Overview::create([
         'user_id' => $request->$user_id,
         'sort_id' => $request->$sort_id, 
         'brand' => $request->$brand_id,
         'catalogusnr' => $request->catalogusnr,
         'epoche' => $request->$epoche_id, 
         'nummer' => $request->nummer,
         'eigenschappen' => $request->eigenschappen,
         'owner' => $request->$owner_id, 
         'color1' => $request->$color1_id, 
         'color2' => $request->$color2_id, 
         'bijzonderheden' => $request->bijzonderheden,
         'foto' => $request->foto,
     ]);
 
     return redirect()->route('overviews.index');
}


    /**
     * Display the specified resource.
     */
    public function show(Overview $overview)
    {
        return view('overviews.show', compact('overview'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Overview $overview)
    {
        return view('overviews.edit', compact('overview'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Overview $overview)
    {
        $request->validate([
            'catalogusnr' => 'required',
            'nummer' => 'required',
            'eigenschappen' => 'required',
            'bijzonderheden' => 'required',
            'foto' => 'required',
        ]);
    
        $sort_id = $request->input('sort_id'); // Assuming you have sort_id in the request
        $brand_id = $request->input('brand_id'); // Assuming you have brand_id in the request
        $epoche_id = $request->input('epoche_id'); // Assuming you have epoche_id in the request
        $owner_id = $request->input('owner_id'); // Assuming you have owner_id in the request
        $color_id = $request->input('color_id'); // Assuming you have color_id in the request
    
        $overview->update([
            'sort_id' => $sort_id,
            'brand' => $brand_id,
            'catalogusnr' => $request->input('catalogusnr'),
            'epoche' => $epoche_id,
            'nummer' => $request->input('nummer'),
            'eigenschappen' => $request->input('eigenschappen'),
            'owner' => $owner_id,
            'color' => $color_id,
            'bijzonderheden' => $request->input('bijzonderheden'),
            'foto' => $request->input('foto'),
        ]);
    
        return redirect()->route('overviews.show', ['overview' => $overview]);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Overview $overview)
    {
        $overview->delete();
 
        return redirect(route('overviews.index'));
    }
}
