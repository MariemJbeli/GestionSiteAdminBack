<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;


class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //affichage
        $categories =Categorie::all()->toArray();
        return array_reverse($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //enregistrer un enregistrement
        $categorie = new Categorie([
            'nom_categ' => $request->input('nom_categ') 
            ]);
            $categorie->save();
            return response()->json('categorie créé !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //retourne un seul element
        $categorie = Categorie::find($id);
        return response()->json($categorie);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //mise a jour
        $categorie = Categorie::find($id);
        $categorie->update($request->all());
        return response()->json('Categorie MAJ !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete
        $categorie = Categorie::find($id);
        $categorie->delete();
        return response()->json('Categorie supprimé !');
    }
}
