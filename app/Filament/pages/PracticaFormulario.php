<?php

// Alumno: Gabriela Pacheco Galvez

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Schemas\Schema;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Forms\Components\TextInput;

class PracticaFormulario extends Page implements HasSchemas
{
    use InteractsWithSchemas;

    protected string $view = 'filament.pages.practica-formulario';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                    ->label('Nombre del proyecto')
                    ->required(),
            ])
            ->statePath('data');
    }

    public function guardar(): void
    {
        $datos = $this->form->getState();
    }
}