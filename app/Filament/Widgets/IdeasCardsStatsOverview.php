<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Idea;
use App\Models\Categoria;

class IdeasCardsStatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {

   $registradas = Idea::where('estado', 'resgitrada')->count();
   $revision = Idea::where('estado', 'en revision')->count();
    $aprobadas = Idea::where('estado', 'aprobadas')->count();
    $rechazadas = Idea::where('estado', 'rechazada')->count();

        return [
            Stat::make('Total de idea', Idea::count())->icon('heroicon-o-light-bulb')

            ->description("Registrada: $registradas |" ."En revision: $revision |" . "Aprobadas: $aprobadas |" . "Rechazadas: $rechazadas |"),
            Stat::make('Total de categoria', Categoria::count())->icon('heroicon-s-tag'),
        ];
    }
}
