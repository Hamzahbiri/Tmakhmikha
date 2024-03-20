<?php

namespace App\Http\Controllers;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categorie::all();
        return $categories;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categorie = new Categorie([
            'nomcategorie' => $request->input('nomcategorie'),
           
        ]);
        $categorie->save();
        return response()->json($categorie,201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categorie = Categorie::find($id);
        return response()->json($categorie);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $categorie = Categorie::find($id);
        $categorie->update($request->all());
        return response()->json($categorie, 200);   
    }


    public function destroy($id)
{
    $categorie = Categorie::find($id);
    
    if (!$categorie) {
        return response()->json(['message' => 'Category not found'], 404);
    }

    $categorie->delete();
    
    return response()->json('Catégorie supprimée !');
}

}
