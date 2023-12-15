<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Famille;

class FamilleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //affichage
        $familles= Famille::with('categories')->get()->toArray();
        return array_reverse($familles);

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
         $famille = new Famille([
            'nomF' => $request->input('nomF'),
            'id_cat' => $request->input('id_cat'),


        ]);
        $famille->save();
        return response()->json('famille créé !');
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
       $famille = Famille::find($id);
       return response()->json($famille);
    }

    public function showFamilleByCateg($id)
    {
        $familles = Famille::where('id_cat','=',$id)->get();
        return response()->json($familles);
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
         $famille = Famille::find($id);
         $famille->update($request->all());
         return response()->json('famille MAJ !');

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
        $famille = Famille::find($id);
        $famille->delete();
        return response()->json('famille supprimé !');
    }
}
