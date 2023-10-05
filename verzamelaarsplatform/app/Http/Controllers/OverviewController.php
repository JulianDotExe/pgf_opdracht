<?php

namespace App\Http\Controllers;

use App\Models\Overview;
use App\Models\Sort;
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
            'user' => 'required',
            'sort' => 'required',
            'brand' => 'required',
            'catalogusnr' => 'required',
            'epoche' => '',
            'nummer' => '',
            'eigenschappen' => 'required',
            'owner' => '',
            'color1' => 'required',
            'color2' => '',
            'bijzonderheden' => '',
            'foto' => '',

        ]);
        Overview::create([
            'user' => $request->user_id,
            'sort' => $request->sort_name,
            'brand' => $request->brand_name,
            'catalogusnr' => $request->catalogusnr,
            'epoche' => $request->epoche_name,
            'nummer' => $request->nummer,
            'eigenschappen' => $request->eigenschappen,
            'owner' => $request->owner_name,
            'color1' => $request->color_name,
            'color2' => $request->color_name,
            'bijzonderheden' => $request->bijzonderheden,
            'foto' => $request->foto,
        ]);
        return to_route('overviews.index');
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
            'sort' => 'required',
            'brand' => 'required',
            'catalogusnr' => 'required',
            'epoche' => 'required',
            'nummer' => 'required',
            'eigenschappen' => 'required',
            'owner' => 'required',
            'color1' => 'required',
            'color2' => 'required',
            'bijzonderheden' => 'required',
            'foto' => 'required',

        ]);
        $overview->update([
            'sort' => $request->sort_name,
            'brand' => $request->brand_name,
            'catalogusnr' => $request->catalogusnr,
            'epoche' => $request->epoche_name,
            'nummer' => $request->nummer,
            'eigenschappen' => $request->eigenschappen,
            'owner' => $request->owner_name,
            'color1' => $request->color_name,
            'color2' => $request->color_name,
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
