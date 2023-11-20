<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Overview;
use App\Models\Sort;
use App\Models\Brand;
use App\Models\Epoche;
use App\Models\Owner;
use App\Models\Color1;
use App\Models\Color2;
use App\Models\User;
use Illuminate\Http\Request;

class OverviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        try {
            $request->validate([
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
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // Handle image upload
            if ($request->hasFile('foto')) {
                $image = $request->file('foto');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                
                // Save the image directly to public/uploads/overviews
                $image->move(public_path('uploads/overviews'), $imageName);

                // $data['foto'] = 'uploads/overviews/' . $imageName;
                $fotoPath = 'uploads/overviews/' . $imageName;

            }

            $user_id = Auth::id();

            Overview::create([
                'user_id' => $user_id,
                'sort_id' => $request->sort_id,
                'brand_id' => $request->brand_id,
                'catalogusnr' => $request->catalogusnr,
                'epoche_id' => $request->epoche_id,
                'nummer' => $request->nummer,
                'eigenschappen' => $request->eigenschappen,
                'owner_id' => $request->owner_id,
                'color1_id' => $request->color1_id,
                'color2_id' => $request->color2_id,
                'bijzonderheden' => $request->bijzonderheden,
                'foto' => $fotoPath,
            ]);

            return redirect()->route('overviews.index')->with('success', 'Data stored successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error storing data. Please try again.');
        }
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
            'foto.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $images = [];
        foreach ($request->file('foto') as $image) {
            $imagePath = $image->storeAs('uploads/overviews', time() . '_' . $image->getClientOriginalName());
            $images[] = $imagePath;
        }

        $sort_id = $request->input('sort_id');
        $brand_id = $request->input('brand_id');
        $epoche_id = $request->input('epoche_id');
        $owner_id = $request->input('owner_id');
        $color_id = $request->input('color_id');

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
            'foto' => implode('|', $images),
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
