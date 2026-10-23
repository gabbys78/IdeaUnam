<?php

// Alumno: Gabriela Pacheco Galvez

namespace App\Filament\Resources\Ideas\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use App\Helpers\EstadoIdea;

class IdeaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('titulo')
                    ->label('Título de la Idea')
                    ->helperText('Escribe un titulo que sea ilustrativa')
                    ->placeholder('Ej Aplicación de comida')
                    ->required()
                    ->maxLength(255),
                Textarea::make('descripcion')
                    ->label('Descripción de tu idea')
                    ->helperText('Escribe a detalle en que consiste tu idea del proyecto')
                    ->placeholder('Descripción')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('autor')
                    ->label('Autor')
                    ->helperText('Escribe el nombre completo del autor de la idea')
                    ->placeholder('Ej. Gabriela Pacheco')
                    ->required(),
                Select::make('estado')
                    ->label('Estado')
                    ->options(EstadoIdea::opciones())
                    ->required(),
                Select::make('categoria_id')
                    ->label('Categoría')
                    ->relationship('categoria', 'nombre')
                    ->required(),
            ]);
    }
}