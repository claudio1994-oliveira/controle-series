<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episodio;
use App\Models\Serie;
use App\Models\Temporada;
use App\Services\CriadorDeSerie;
use App\Services\ExcluirdorDeSeries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeriesController extends Controller
{
/*    public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function index(Request $request) {

       /* if(!Auth::check()){
            echo "Não autenticado";
            exit();
        } */
        //$series = Serie::all();
        $series = Serie::query()
            ->orderBy('nome')
            ->get();

        $mensagem = $request->session()->get('mensagem');
       // $request->session()->remove('mensagem');

        //return view('series.index', ['series'=>$series]);
        return view('series.index', compact('series', 'mensagem'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request, CriadorDeSerie $criadorDeSerie)
    {
        $serie = $criadorDeSerie->criarSerie(
            $request->nome,
            $request->qtd_temporadas,
            $request->ep_por_temporada
        );

       $request->session()
           ->flash(
           'mensagem', "Série com id {$serie->id} e suas temporas com episodios foram criados criada: {$serie->nome}"
           );


        //echo "Série com id {$serie->id} criada: {$serie->nome}";
        return redirect()->route('listar_series');
    }

    public function destroy(Request $request, ExcluirdorDeSeries $excluirdorDeSeries)
    {
         $nomeSerie = $excluirdorDeSeries->excluirSerie($request->id);

        //Serie::destroy($request->id);
        $request->session()
            ->flash(
                'mensagem',
                "Série $nomeSerie removida com sucesso"
            );
        return redirect()->route('listar_series');
    }

    public function editaNome($id, Request $request)
    {
        $novoNome = $request->nome;
        $serie = Serie::find($id);
        $serie->nome = $novoNome;
        $serie->save();
    }

}
