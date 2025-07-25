<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CpptResource\Pages;
use App\Filament\Resources\CpptResource\RelationManagers;
use Filament\Tables\Columns\TextColumn;
use App\Models\Cppt;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CpptResource extends Resource
{
    protected static ?string $model = Cppt::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    
    public static function getEloquentQuery(): Builder
{
    return Cppt::query()
        ->from('vicore_rme.dcppt as cp')
        ->select([
            'dsp.*',
            'ke.namadokter as namadokter',
            'ke2.nama as namaperawat',
            'kp.bagian as namabagian',
            'dp.id as pasien_id',
            'ke3.nama as nama_handover',
        ])
        ->leftJoin('rekam.dregister as dr', 'dsp.noreg', '=', 'dr.noreg')
        ->leftJoin('his.dprofilpasien as dp', 'dr.id', '=', 'dp.id')
        ->leftJoin('his.ktaripdokter as ke', 'dsp.ppa_finger_ttd', '=', 'ke.iddokter')
        ->leftJoin('mutiara.pengajar as ke2', 'dsp.ppa_finger_ttd', '=', 'ke2.id')
        ->leftJoin('vicore_lib.kpelayanan as kp', 'dsp.kd_bagian', '=', 'kp.kd_bag')
        ->leftJoin('mutiara.pengajar as ke3', 'dsp.hand_over', '=', 'ke3.id');
}

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
            TextColumn::make('subjektif')
                    ->label('Subjektif')
                      ->limit(20)
                    ->searchable(),
            TextColumn::make('objektif')
                    ->label('Objektif')
                      ->limit(20)
                    ->searchable(),
            TextColumn::make('asesmen')
                    ->label('Asesmen')
                    ->limit(20)
                    ->searchable(),
            TextColumn::make('plan')
                    ->label('Plan')
                      ->limit(20)
                    ->searchable(),
            ])
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
            ]) ->defaultSort('insert_dttm', 'desc');
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
            'index' => Pages\ListCppts::route('/'),
            'create' => Pages\CreateCppt::route('/create'),
            'edit' => Pages\EditCppt::route('/{record}/edit'),
        ];
    }


    public static function shouldRegisterNavigation(): bool
    {
        return false; // Tidak ditampilkan di sidebar
    }


 

}
