<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Similaire;

class SimilaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //affichage
         $similaires=Similaire::with('article')->get()->toArray();
          return array_reverse($similaires);



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
          $similaire = new Similaire([

            'id_art' => $request->input('id_art'),

        ]);
        $similaire->save();
        return response()->json('similaire créé !');
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
        $similaire = Similaire::find($id);
        return response()->json($similaire);
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
        $similaire = Similaire::find($id);
        $similaire->update($request->all());
        return response()->json('similaire MAJ !');
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
         $similaire = Similaire::find($id);
         $similaire->delete();
         return response()->json('similaire supprimé !');
    }
}
