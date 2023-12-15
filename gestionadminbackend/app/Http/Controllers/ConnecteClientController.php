<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConnecteClient;

class ConnecteClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $connecte_clients= ConnecteClient::with('client')->get()->toArray();
         return array_reverse($connecte_clients);
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
         $connecter = new ConnecteClient([

            'id_client' => $request->input('id_client'),

        ]);
        $connecter->save();
        return response()->json('connecter créé !');
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
         $connecter = ConnecteClient ::find($id);
         return response()->json($connecter);
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
         $connecter = ConnecteClient::find($id);
         $connecter->update($request->all());
         return response()->json('connecter MAJ !');
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
        $connecter = ConnecteClient::find($id);
        $connecter->delete();
        return response()->json('ConnecteClient supprimé !');
    }
}
