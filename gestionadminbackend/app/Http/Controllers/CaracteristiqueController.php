<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Caracteristique;

class CaracteristiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //affichage
         $caracteristiques = Caracteristique::with('modele')->get()->toArray();
         return array_reverse($caracteristiques);


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
        $caracteristique = new Caracteristique([
            'desgnCaract' => $request->input('desgnCaract'),
            'libelle' => $request->input('libelle'),
            'id_mod' => $request->input('id_mod'),

        ]);
        $caracteristique->save();
        return response()->json('caracteristique créé !');
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
         $caracteristique = Caracteristique::find($id);
         return response()->json($caracteristique);
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
         $caracteristique = Caracteristique::find($id);
         $caracteristique->update($request->all());
         return response()->json('caracteristique MAJ !');
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
        $caracteristique = Caracteristique::find($id);
        $caracteristique->delete();
        return response()->json('caracteristique supprimé !');
    }
    public function showLigneCaractByModel($idmod){
        $lignecaracts= Caracteristique::where('id_mod',$idmod)->with('modele')->get()->toArray();
        return response()->json($lignecaracts);
    }
}
