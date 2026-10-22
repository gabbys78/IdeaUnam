<?php

// Alumno: Gabriela Pacheco Galvez

namespace App\Filament\Resources\Ideas\Schemas;

use Filament\Schemas\Schema;
use Filament\Infolists\Components\TextEntry;

class IdeaInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('titulo')
                    ->label('Título de la Idea'),
                TextEntry::make('descripcion')
                    ->label('Descripción'),
                TextEntry::make('autor')
                    ->label('Autor'),
                TextEntry::make('estado')
                    ->label('Estado'),
                TextEntry::make('categoria.nombre')
                    ->label('Categoría'),
                TextEntry::make('created_at')
                    ->label('Fecha de creación')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->label('Última actualización')
                    ->dateTime(),
            ]);
    }
}