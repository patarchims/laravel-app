<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ViewCpptExtendedResource\Pages;
use App\Filament\Resources\ViewCpptExtendedResource\RelationManagers;
use App\Models\ViewCpptExtended;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;

class ViewCpptExtendedResource extends Resource
{
    protected static ?string $model = ViewCpptExtended::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('noreg')->label('No. Reg')->searchable(),
                TextColumn::make('namadokter')->label('Dokter'),
                TextColumn::make('namaperawat')->label('Perawat'),
                TextColumn::make('namabagian')->label('Bagian'),
                TextColumn::make('nama_handover')->label('Serah Terima'),
                TextColumn::make('situation')->label('S')->limit(30),
                TextColumn::make('background')->label('B')->limit(30),
                TextColumn::make('recomendation')->label('R')->limit(30),
                TextColumn::make('insert_dttm')->label('Waktu')->dateTime(),
            ])->defaultSort('insert_dttm', 'desc')

            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListViewCpptExtendeds::route('/'),
            'create' => Pages\CreateViewCpptExtended::route('/create'),
            'edit' => Pages\EditViewCpptExtended::route('/{record}/edit'),
        ];
    }


  
    protected function getTitle(): string
    {
        return 'Daftar Data CPPT';
    }

    public static function getModelLabel(): string
    {
        return 'Data CPPT';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Data CPPT';
    }
 
}
