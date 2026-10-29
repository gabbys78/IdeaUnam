<?php

// Alumno: Gabriela Pacheco Galvez

namespace App\Filament\Resources\Ideas\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Filters\SelectFilter;
use Filament\Actions\DeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Tables\Filters\TrashedFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Actions\Action;
use Filament\Forms\Components\Textarea;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Idea;
use Filament\Notifications\Notification;
use Filament\Support\Icons\Heroicon;


class IdeasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('titulo')
                    ->label('Idea')
                    ->wrap()
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('descripcion')
                    ->label('Descripción')
                    ->searchable()
                    ->sortable()
                    ->wrap()
                    ->toggleable(),
                TextColumn::make('estado')
                    ->label('Estado')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('autor')
                    ->label('Autor')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->toggleable(),
                TextColumn::make('categoria.nombre')
                    ->label('Categoria')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->toggleable(),
                TextColumn::make('created_at')
                    ->label('Creado el')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Actualizado el')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('estado')
                    ->options([
                        'registrada' => 'Registrada',
                        'en revisión' => 'En revisión',
                        'aprobada' => 'Aprobada',
                        'rechazada' => 'Rechazada',
                    ]),
                    TrashedFilter::make(),
            ])
            ->actions([
                EditAction::make(),
                ViewAction::make(),
                DeleteAction::make(),
                RestoreAction::make(),
                ForceDeleteAction::make(),
                
                // Acción de Aprobar
                Action::make('aprobar')
                ->icon(Heroicon::HandThumbUp)
                    ->label('Aprobar')
                    ->color('success')
                    ->requiresConfirmation()
                    ->modalHeading('Aprobación')
                    ->modalDescription('¿Desea aprobar esta idea?')
                    ->action(function (Idea $record) {
                        $record->update(['estado' => 'aprobada']);

                        Notification::make()
                            ->title('Idea aprobada correctamente')
                            ->success()
                            ->send();
                    })
                    ->visible(fn (Idea $record) => $record->estado !== 'aprobada'),

                // Acción de Rechazar con cuadro de texto para la observación
                Action::make('rechazar')
                    ->label('Rechazar')
                    ->icon(Heroicon::HandThumbDown)
                    ->color('danger')
                    ->form([
                        Textarea::make('observacion')
                            ->label('Motivo del rechazo')
                            ->placeholder('Escribe la razón por la cual se rechaza la idea...')
                            ->required()
                    ])
                    ->action(function (Idea $record, array $data) {
                        $record->update([
                            'estado' => 'rechazada',
                            'observacion' => $data['observacion']
                        ]);

                        Notification::make()
                            ->title('Idea rechazada correctamente')
                            ->danger()
                            ->send();
                    })
                    ->visible(fn (Idea $record) => $record->estado !== 'rechazada')
            ])
            ->recordUrl(null)
            ->recordAction(null)
        
            ->bulkActions([
                BulkActionGroup::make([
                    // DeleteBulkAction::make(),
                ]),
            ]);
    }
}