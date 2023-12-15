<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArtCaract;

class ArtCaractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         //affichage
         $art_caracts = ArtCaract::with('caract','article')->get()->toArray();
         return array_reverse($art_caracts);
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
        $art_caract = new ArtCaract([
            'valeur' => $request->input('valeur'),

            'id_art' => $request->input('id_art'),
            'id_caract' => $request->input('id_caract'),

        ]);
        $art_caract->save();
        return response()->json('art_caract créé !');
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
         $art_caract = ArtCaract::find($id);
         return response()->json($art_caract);
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
         $art_caract = Article::find($id);
         $art_caract ->update($request->all());
         return response()->json('art_caract MAJ !');
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
        $art_caract =   ArtCaract::find($id);
        $art_caract->delete();
        return response()->json('art_caract supprimé !');
    }

    public function showCaractByArt($idart){
        $caractarts= ArtCaract::where('id_art',$idart)->with('article')->get()->toArray();
        return response()->json($caractarts);
    }


}
