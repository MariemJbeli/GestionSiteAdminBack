<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LigneCommande;
class LigneCommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //affichage
         $ligne_commandes =  LigneCommande ::with('commande','article')->get()->toArray();
         return array_reverse($ligne_commandes);
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
        $lignecommande = new LigneCommande ([
            'quantite' => $request->input('quantite'),
            'id_art' => $request->input('id_art'),
            'id_com' => $request->input('id_com'),

        ]);
        $lignecommande->save();
        return response()->json('lignecommande créé !');
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
         $lignecommande = LigneCommande::find($id);
         return response()->json($lignecommande);
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
         $lignecommande = LigneCommande::find($id);
         $lignecommande->update($request->all());
         return response()->json('lignecommande MAJ !');
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
        $lignecommande =   LigneCommande::find($id);
        $lignecommande->delete();
        return response()->json('ligne commande supprimé !');
    }
    public function showArtCommandeByArticle($idart){
        $lignearts= LigneCommande::where('id_art',$idart)->with('article')->get()->toArray();
        return response()->json($lignearts);
    }
    public function showArtticleByCommande($idcom){
        $lignecoms= LigneCommande::where('id_com',$idcom)->with('article')->get()->toArray();
        return response()->json($lignecoms);
    }
    public function showLigneCByCommande($idcom){
        $lignec= LigneCommande::where('id_com',$idcom)->with('commande')->get()->toArray();
        return response()->json($lignec);
    }
}
