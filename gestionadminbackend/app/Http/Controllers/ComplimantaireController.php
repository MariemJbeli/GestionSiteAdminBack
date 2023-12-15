<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complimantaire;

class ComplimantaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //affichage
         $complimantaires= Complimantaire::with('article')->get()->toArray();
         return array_reverse($complimantaires);



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
         $complimantaire = new Complimantaire([

            'id_art' => $request->input('id_art'),

        ]);
        $complimantaire->save();
        return response()->json('complimantaire créé !');
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
         $complimantaire = Complimantaire::find($id);
         return response()->json($complimantaire);
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
          $complimantaire = Complimantaire::find($id);
          $complimantaire->update($request->all());
          return response()->json('Complimantaire MAJ !');
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
        $complimantaire = Complimantaire::find($id);
        $complimantaire->delete();
        return response()->json('complimantaire supprimé !');
    }
}
