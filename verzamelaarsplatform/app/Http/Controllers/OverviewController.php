<?php

namespace App\Http\Controllers;

use App\Models\Overview;
use App\Models\Sort;
use App\Models\Brand;
use App\Models\Epoche;
use App\Models\Owner;
use App\Models\Color;
use App\Models\User;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\EpocheController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OverviewController;
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

    $sorts = Sort::pluck('sort_name', 'id');

    return view('overviews.create', ['sorts' => $sorts]);
    }   


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'catalogusnr' => 'required',
        'nummer' => 'required',
        'eigenschappen' => 'required',
        'bijzonderheden' => 'required',
        'foto' => 'required',
    ]);

    $user = (1); // Standaardwaarde is "Ninoh"

    // SORT
    if ($request->filled('sort_name')) {
        $sort = Sort::create([
            'sort_name' => $request->input('sort_name'),
        ]);
        $sort_id = $sort->id;
    } else {
        $sort_id = $request->input('sort_id');
    }
    // SORT

    // BRAND
    if ($request->filled('brand_name')) {
        $brand = Brand::create([
            'brand_name' => $request->input('brand_name'),
        ]);
        $brand_id = $brand->id;
    } else {
        $brand_id = $request->input('brand_id');
    }
    // BRAND

    // EPOCHE
    if ($request->filled('epoche_name')) {
        $epoche = Epoche::create([
            'epoche_name' => $request->input('epoche_name'),
        ]);
        $epoche_id = $epoche->id;
    } else {
        $epoche_id = $request->input('epoche_id');
    }
    // EPOCHE

    // OWNER
    if ($request->filled('owner_name')) {
        $owner = Owner::create([
            'owner_name' => $request->input('owner_name'),
        ]);
        $owner_id = $owner->id;
    } else {
        $owner_id = $request->input('owner_id');
    }
    // OWNER

    // // COLOR1
    // if ($request->filled('color_name')) {
    //     $color = Color::create([
    //         'color_name' => $request->input('color_name'),
    //     ]);
    //     $color_id = $color->id;
    // } else {
    //     $color_id = $request->input('color_id');
    // }
    // // COLOR1

    $defaultUser = User::where('name', 'admin')->first();

    Overview::create([
        'user' => $defaultUser->id, // Hier gebruiken we de ID van de juiste gebruiker
        'sort_id' => $sort_id,
        'brand' => $brand_id,
        'catalogusnr' => $request->catalogusnr,
        'epoche' => $epoche_id,
        'nummer' => $request->nummer,
        'eigenschappen' => $request->eigenschappen,
        'owner' => $owner_id,
        // 'color' => $color_id,
        // 'color' => $color_id,
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
        $overview->update([
            'user' => $user,
            'sort_id' => $sort_id,
            'brand' => $brand_id,
            'catalogusnr' => $request->catalogusnr,
            'epoche' => $epoche_id,
            'nummer' => $request->nummer,
            'eigenschappen' => $request->eigenschappen,
            'owner' => $owner_id,
            'color' => $color_id,
            'color' => $color_id,
            'bijzonderheden' => $request->bijzonderheden,
            'foto' => $request->foto,
        ]);
        return to_route('overviews.show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Overview $overview)
    {
        //
    }
}
