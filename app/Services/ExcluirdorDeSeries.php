<?php

namespace App\Services;

use App\Models\Episodio;
use App\Models\Serie;
use App\Models\Temporada;
use Illuminate\Support\Facades\DB;

class ExcluirdorDeSeries
{
    public function excluirSerie(int $serieId) :string
    {
        DB::transaction(function () use ($serieId, &$nomeSerie){
            $serie = Serie::find($serieId);
            $nomeSerie = $serie->nome;

            $this->excluirTemporadas($serie);
            $serie->delete();
        });



        return $nomeSerie;
    }

    /**
     * @param $serie
     */
    private function excluirTemporadas(Serie $serie): void
    {
        $serie->temporadas->each(function (Temporada $temporada) {
            $this->excluirEpisodios($temporada);
            $temporada->delete();
        });
    }

    /**
     * @param Temporada $temporada
     */
    private function excluirEpisodios(Temporada $temporada): void
    {
        $temporada->episodios()->each(function (Episodio $episodio) {
            $episodio->delete();
        });

    }

}
