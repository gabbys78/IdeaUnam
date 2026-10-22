<?php

namespace App\Filament\Resources\Categorias\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class CategoriaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                    ->label('Nombre Categoría')
                    ->helperText('Ingrese el nombre a la categoría')
                    //->default('valor')
                    ->placeHolder('Ej categoría')
                    ->required(),

                Textarea::make('descripcion')
                    ->label('Descripción')
                    ->helperText('Ingresa una descripción')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
