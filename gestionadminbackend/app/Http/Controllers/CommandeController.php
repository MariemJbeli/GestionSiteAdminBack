<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commandes = Commande::with('client')->get()->toArray();
         return array_reverse($commandes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $commande = new Commande([
            'date' => $request->input('date'),
            'id_client' => $request->input('id_client'),

        ]);
        $commande->save();
        return response()->json('commande créé !');
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
        $commande = Commande::find($id);
        return response()->json($commande);
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
        $commande =Commande::find($id);
        $commande->update($request->all());
        return response()->json('commande MAJ !');
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
        $commande = Commande::find($id);
        $commande->delete();
        return response()->json('commande supprimé !');
    }
    public function showCommandeByClient($idclient){
        $coms= Commande::where('id_client',$idclient)->with('client')->get()->toArray();
        return response()->json($coms);
    }
}
