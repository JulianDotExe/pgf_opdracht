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
    public function index(Request $request)
    {
        $overviewsQuery = Overview::query();

        // Zoekfunctionaliteit op e-mail
        if ($request->filled('search')) {
            $searchTerm = $request->input('search');
            $overviewsQuery->where(function ($query) use ($searchTerm) {
                $query->whereHas('sort', function ($subQuery) use ($searchTerm) {
                    $subQuery->where('sort_name', 'like', "%$searchTerm%");
                })
                ->orWhereHas('brand', function ($subQuery) use ($searchTerm) {
                    $subQuery->where('brand_name', 'like', "%$searchTerm%");
                })
                ->orWhereHas('owner', function ($subQuery) use ($searchTerm) {
                    $subQuery->where('owner_name', 'like', "%$searchTerm%");
                })
                ->orWhereHas('epoche', function ($subQuery) use ($searchTerm) {
                    $subQuery->where('epoche_name', 'like', "%$searchTerm%");
                })
                ->orWhereHas('color1', function ($subQuery) use ($searchTerm) {
                    $subQuery->where('color1', 'like', "%$searchTerm%");
                })
                ->orWhereHas('color2', function ($subQuery) use ($searchTerm) {
                    $subQuery->where('color2', 'like', "%$searchTerm%");
                })
                // Add similar clauses for other relationships...
                ->orWhere('catalogusnr', 'like', "%$searchTerm%")
                ->orWhere('nummer', 'like', "%$searchTerm%")
                ->orWhere('eigenschappen', 'like', "%$searchTerm%")
                ->orWhere('bijzonderheden', 'like', "%$searchTerm%");
            });
        }
        $overviews = $overviewsQuery->orderBy('created_at', 'desc')->paginate(3);

        return view('users.overviews.index', compact('overviews'));
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

        return view('users.overviews.create', compact('sorts', 'brands', 'epoches', 'owners', 'colors1', 'colors2'));
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
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            ]);

            // Handle image upload
            if ($request->hasFile('foto')) {
                $image = $request->file('foto');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                
                // Save the image directly to public/uploads/overviews
                if ($image->move(public_path('uploads/overviews'), $imageName)) {
                    // Log success or any additional information if needed
                } else {
                    // Log an error if the move fails
                    \Log::error('Failed to move the uploaded file.');
                }
                // $fotoPath = 'uploads/overviews/' . $imageName;
                $data['foto'] = 'uploads/overviews/' . $imageName;
            }

            $user_id = Auth::id();

            Overview::create([
                'user_id' => $user_id,
                'sort_id' => $request->sort_id,
                'brand_id' => $request->brand_id,
                'catalogusnr' => (int) $request->catalogusnr,
                'epoche_id' => $request->epoche_id,
                'nummer' => (int) $request->nummer,
                'eigenschappen' => $request->eigenschappen,
                'owner_id' => $request->owner_id,
                'color1_id' => $request->color1_id,
                'color2_id' => $request->color2_id,
                'bijzonderheden' => $request->bijzonderheden,
                'foto' => $data['foto'],
            ]);

            return redirect()->route('users.overviews.index')->with('success', 'Data stored successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error storing data. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Overview $overview)
    {
        return view('users.overviews.show', compact('overview'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Overview $overview)
    {
        $sorts = Sort::all();
        $brands = Brand::all();
        $epoches = Epoche::all();
        $owners = Owner::all();
        $colors1 = Color1::all();
        $colors2 = Color2::all();
    
        return view('users.overviews.edit', compact('overview', 'sorts', 'brands', 'epoches', 'owners', 'colors1', 'colors2'));
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
        'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Handle image upload
    if ($request->hasFile('foto')) {
        $image = $request->file('foto');
        $imageName = time() . '.' . $image->getClientOriginalExtension();

        // Save the new image to public/uploads/overviews
        $image->move(public_path('uploads/overviews'), $imageName);

        // Delete old images if any
        foreach (explode('|', $overview->foto) as $oldImage) {
            Storage::delete($oldImage);
        }

        // Update the foto field in the database with the new image path
        $overview->update(['foto' => 'uploads/overviews/' . $imageName]);
    }

    // Update other fields
    $overview->update([
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
    ]);

    return redirect()->route('users.overviews.show', ['overview' => $overview]);
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Overview $overview)
    {
        $overview->delete();
        return redirect(route('users.overviews.index'));
    }
}
