<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::paginate(3);
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('admin.news.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'titel' => 'required|string',
                'categories_id' => 'required|exists:categories,id',
                'inhoud' => 'required|string',
                'auteur' => 'nullable|string',
                'link' => 'nullable|url',
            ]);
    
            News::create($validatedData);
            // If everything goes well, redirect
            return redirect()->route('admin.news.index')->with('success', 'News created successfully!');
            } catch (ValidationException $e) {
                // Validation failed; redirect back with errors
                return redirect()->back()->withErrors($e->validator)->withInput();
            } catch (\Exception $e) {
                // Other exceptions/errors occurred
                // Log the error or handle it as needed
                return redirect()->back()->with('error', 'An error occurred while creating the news.');
            }

    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        $news = News::find($news->artikel_id);

        if (!$news) {
            // Handle if the event is not found
            return abort(404);
        }
    
        // Display the event information
        return view('admin.news.show', compact('news'));    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        $categories = Categorie::all();
        return view('admin.news.edit', compact('news', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        try {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'titel' => 'required|string',
                'categories_id' => 'required|exists:categories,id',
                'inhoud' => 'required|string',
                'auteur' => 'nullable|string',
                'link' => 'nullable|url',
            ]);

            $validatedData['updated_at'] = now();
            // Update the event attributes with validated data
            $news->update($validatedData);
    
            // If everything goes well, redirect
            return redirect()->route('admin.news.index')->with('message', 'News updated successfully!');
        } catch (ValidationException $e) {
            // Validation failed; redirect back with errors
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            // Other exceptions/errors occurred
            // Log the error or handle it as needed
            return redirect()->back()->with('message', 'An error occurred while updating the news.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        try {
            // Use the delete method to remove the event
            $news->delete();
    
            // Redirect with a success message
            return redirect()->route('admin.news.index')->with('message', 'News deleted successfully!');
        } catch (\Exception $e) {
            // Log the error or handle it as needed
            return redirect()->back()->with('message', 'An error occurred while deleting the news.');
        }
    }
}