<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataCatalog = Catalog::all();

        return view('catalog', compact('dataCatalog'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'img' => 'required',
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'selected_category' => 'required',
            'price' => 'required',
        ]);

        $file = $request->file('img');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('img'), $filename);

        $newRequest = new Catalog([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $filename,
            'category_id' => $request->selected_category,
        ]);

        $newRequest->save();

        return redirect('catalog');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dataItem = Catalog::find($id);

        return view('catalog-item', compact('dataItem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
