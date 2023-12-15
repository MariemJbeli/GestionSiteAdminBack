<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modele;

class ModeleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          //affichage
          $modeles=Modele::with('categories')->get()->toArray();
          return array_reverse($modeles);



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
         $modele = new Modele([
            'desgnModele' => $request->input('desgnModele'),
            'id_cat' => $request->input('id_cat'),

        ]);
        $modele->save();
        return response()->json('modele créé !');
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
         $modele = Modele::find($id);
         return response()->json($modele);
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
         $modele = Modele::find($id);
         $modele->update($request->all());
         return response()->json('modele MAJ !');
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
        $modele = Modele::find($id);
        $modele->delete();
        return response()->json('modele supprimé !');
    }

   
}
