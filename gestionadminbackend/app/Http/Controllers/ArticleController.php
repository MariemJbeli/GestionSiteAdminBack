<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\DB;


class ArticleController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //affichage
         $articles = Article::with('sousFamille')->get()->toArray();
         return array_reverse($articles);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //public $idnew="";
    public function store(Request $request)
    {
        //enregistrer un enregistrement
        $article = new Article([
            'desgnArt' => $request->input('desgnArt'),
            'prix' => $request->input('prix'),
            'ancienPrix' => $request->input('ancienPrix'),
            'etat' => $request->input('etat'),
            'dureeGarantie' => $request->input('dureeGarantie'),
            'refInternational' => $request->input('refInternational'),
            'livraison' => $request->input('livraison'),
            'id_SF' => $request->input('id_SF'),
            'image' => $request->input('image')
        ]);
        /* $caracts= get('http://127.0.0.1:8000/api/caractsbyart/{idnew}');
         @for ($caracts as $caract)
            $art_caract = new ArtCaract([
                'valeur' => null->input('valeur'),
                'id_art' => $idnew->input('id_art'),
                'id_caract' => $caract->input('id_caract'),

            ]);
            $art_caract->save();

        @endfor */
        $article->save();
        $idnew= intval($article->getKey());
        return response()->json($idnew);

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
         $article = Article::find($id);
         return response()->json($article);
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
         $article = Article::find($id);
         $article->update($request->all());
         return response()->json('article MAJ !');
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
        $article = Article::find($id);
        $article->delete();
        return response()->json('article supprimé !');
    }
    public function getCaractsByArt($id_art) {
        $art_caracts = DB::table('articles')
        ->join('sous_familles', 'articles.id_SF', '=', 'sous_familles.id')
        ->join('familles', 'sous_familles.id_F', '=', 'familles.id')
        ->join('categories', 'familles.id_cat', '=', 'categories.id')
        ->join('modeles', 'categories.id', '=', 'modeles.id_cat')
        ->join('caracteristiques', 'modeles.id', '=', 'caracteristiques.id_mod')
        ->where('articles.id', '=', $id_art)
        ->select('caracteristiques.*')
      ->get();
     return response()->json($art_caracts);
    }
}
