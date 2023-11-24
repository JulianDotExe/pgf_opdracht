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
use Illuminate\Http\RedirectResponse;

class InrichtingController extends Controller
{
    public function index(Request $request)
    {
        $sorts = Sort::all();
        $brands = Brand::all();
        $epoches = Epoche::all();
        $owners = Owner::all();
        $categories = Categorie::all();
        $colors1 = Color1::all();
        $colors2 = Color2::all();
        $colors = $colors1->merge($colors2);
    
        $type = $request->get('type', 'sorts'); 
        $sortQuery = Sort::query();
        $brandQuery = Brand::query();
    
        if ($request->filled('search')) {
            $searchTerm = $request->input('search');
            $sortQuery->where(function ($query) use ($searchTerm) {
                $query->where('sort_name', 'like', "%$searchTerm%");
            });
        }
    
        if ($request->filled('search')) {
            $searchTerm = $request->input('search');
            $brandQuery->where(function ($query) use ($searchTerm) {
                $query->where('brand_name', 'like', "%$searchTerm%");
            });
        }
    
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $colors = $colors->filter(function ($color) use ($searchTerm) {
                return str_contains(strtolower($color->color_name), strtolower($searchTerm));
            });
        }
    
        $sortSearch = $sortQuery->paginate(3, ['*'], 'sort_page');
        $brandSearch = $brandQuery->paginate(3, ['*'], 'brand_page');
        // return view('inrichtings.index', compact('sortSearch', 'brandSearch'));

        return view('inrichtings.index', compact('sorts', 'brands', 'epoches', 'owners', 'colors', 'categories', 'type'));
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
    public function createColor(Request $request)
    {
        $request->validate([
            'color' => 'required|string|max:255', // Assuming you have a single input for color
        ]);
    
        $color = $request->input('color');
    
        // Create Color1 record
        Color1::create(['color1' => $color]);
    
        // Create Color2 record
        Color2::create(['color2' => $color]);
    
        return redirect()->route('inrichtings.index', ['type' => 'sorts'])->with('message', 'Soort deleted successfully!');
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

    public function destroySort(Sort $sort)
    {
        // Delete related overviews
        $sort->overviews()->delete();

        // Now, delete the Sort record
        $sort->delete();

        return redirect()->route('inrichtings.index')->with('message', 'Soort deleted successfully!');
    }

    public function destroyBrand(Brand $brand)
    {
        // Delete related overviews
        $brand->overviews()->delete();

        // Now, delete the Brand record
        $brand->delete();

        return redirect()->route('inrichtings.index', ['type' => 'brands'])->with('message', 'Merk deleted successfully!');
    }

    public function destroyEpoche(Epoche $epoche)
    {
        // Delete related overviews
        $epoche->overviews()->delete();

        // Now, delete the Epoche record
        $epoche->delete();

        return redirect()->route('inrichtings.index', ['type' => 'epoches'])->with('message', 'Epoche deleted successfully!');
    }

    public function destroyOwner(Owner $owner)
    {
        // Delete related overviews
        $owner->overviews()->delete();

        // Now, delete the Owner record
        $owner->delete();

        return redirect()->route('inrichtings.index', ['type' => 'owners'])->with('message', 'Eigenaar deleted successfully!');
    }

    public function destroyColor($colorId)
    {
        // Find the color using the color ID
        $color1 = Color1::findOrFail($colorId);
        $color2 = Color2::where('color2', $color1->color1)->first();

        // Delete related overviews for Color1
        $color1->overviews()->delete();

        // Delete related overviews for Color2
        if ($color2) {
            $color2->overviews()->delete();
        }

        // Now, delete the Color1 and Color2 records
        $color1->delete();
        if ($color2) {
            $color2->delete();
        }

        return redirect()->route('inrichtings.index', ['type' => 'colors'])->with('message', 'Kleur deleted successfully!');
    }


    public function destroyCategory(Categorie $category)
    {
        try {
            \Log::info('Deleting category: ' . $category->category_name);

            // Delete related news and events
            $category->news()->delete();
            $category->events()->delete();

            \Log::info('Related news and events deleted successfully.');

            // Now, delete the category record
            $category->delete();

            \Log::info('Category deleted successfully!');

            return redirect()->route('inrichtings.index', ['type' => 'categories'])->with('message', 'Category deleted successfully!');
        } catch (\Exception $e) {
            \Log::error('Error deleting category: ' . $e->getMessage());

            return redirect()->route('inrichtings.index', ['type' => 'categories'])->with('error', 'Error deleting category.');
        }
    }
}