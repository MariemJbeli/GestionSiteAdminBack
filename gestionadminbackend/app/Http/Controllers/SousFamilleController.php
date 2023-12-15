<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SousFamille;

class SousFamilleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //affichage
        $sous_familles=SousFamille::with('famille')->get()->toArray();
        return array_reverse($sous_familles);



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
                 $sous_famille = new SousFamille([
                    'nomSF' => $request->input('nomSF'),
                    'id_F' => $request->input('id_F'),


                ]);
                $sous_famille->save();
                return response()->json('sous famille créé !');
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
       $sous_famille = SousFamille::find($id);
       return response()->json($sous_famille);
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
        // //mise a jour
         $sous_famille = SousFamille::find($id);
         $sous_famille->update($request->all());
         return response()->json('sous famille MAJ !');

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
        $sous_famille = SousFamille::find($id);
        $sous_famille->delete();
        return response()->json('sous famille supprimé !');
    }
}
