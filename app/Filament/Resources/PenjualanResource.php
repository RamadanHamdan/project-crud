<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Penjualan;
use Filament\Tables\Table;
use App\Models\PenjualanModel;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PenjualanResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PenjualanResource\RelationManagers;
use Filament\Tables\Columns\TextColumn;

class PenjualanResource extends Resource
{
    protected static ?string $model = PenjualanModel::class;

    protected static ?string $navigationGroup = 'Faktur';

    protected static ?string $navigationLabel = 'Laporan Penjualan';

    public static ?string $label = 'Laporan Penjualan';

    protected static ?string $slug = 'kelola-penjualan';

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

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
                TextColumn::make('tanggal')
                ->label('Tanggal')
                ->sortable()
                ->searchable()
                ->date('d F Y'),
                TextColumn::make('kode')
                ->label('Kode Faktur')
                ->sortable()
                ->searchable(),
                TextColumn::make('jumlah')
                ->label('Jumlah')
                ->sortable()
                ->searchable(),
                TextColumn::make('customer.nama_customer')
                ->label('Nama Customer')
                ->sortable()
                ->searchable(),
                TextColumn::make('status')
                ->label('Status')
                ->sortable()
                ->searchable()
                ->badge(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListPenjualans::route('/'),
            'create' => Pages\CreatePenjualan::route('/create'),
            'view' => Pages\ViewPenjualan::route('/{record}'),
            'edit' => Pages\EditPenjualan::route('/{record}/edit'),
        ];
    }
}
