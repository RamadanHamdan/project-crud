<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Barang;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Tables\Actions\BuyAction;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\BarangResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BarangResource\RelationManagers;
use Faker\Core\File;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;
use Laravel\Pail\Files;
use Psy\Readline\Hoa\FileRead;

class BarangResource extends Resource
{
    protected static ?string $model = Barang::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    protected static ?string $navigationLabel = 'Barang';

    protected static ?string $navigationGroup = 'Kelola';

    public static ?string $label = 'Barang';

    protected static ?string $slug = 'kelola-barang';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('gambar_barang')
                    ->required()
                    ->label('Gambar Barang')
                    ->imagePreviewHeight('250')
                    ->loadingIndicatorPosition('left')
                    ->panelAspectRatio('2:1')
                    ->panelLayout('integrated')
                    ->removeUploadedFileButtonPosition('right')
                    ->uploadButtonPosition('left')
                    ->uploadProgressIndicatorPosition('left')
                    ->placeholder('Masukan Gambar...'),
                TextInput::make('nama_barang')
                    ->columnSpan([
                        'default' => 2,
                        'lg' => 1,
                        'md' => 1,
                        'xl' => 1,
                    ])
                    ->required()
                    ->label('Nama Barang')
                    ->placeholder('Masukan Nama...'),
                TextInput::make('kode_barang')
                    ->required()
                    ->label('Kode Barang')
                    ->placeholder('Masukan Kode Barang...'),
                TextInput::make('harga_barang')->numeric()
                    ->required()
                    ->label('Harga Barang')
                    ->placeholder('Masukan Harga...')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('gambar_barang')
                    ->label('Gambar Barang'),
                TextColumn::make('nama_barang')
                    ->sortable()
                    ->copyable()
                    ->copyMessage('Name Copied')
                    ->searchable()
                    ->label('Nama Barang'),
                TextColumn::make('kode_barang')
                    ->copyable()
                    ->label('Kode Barang'),
                TextColumn::make('harga_barang')
                    ->label('Harga')
                    ->formatStateUsing(fn(Barang $record): string => 'Rp ' . number_format($record->harga_barang, 0, '.', '.')),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListBarangs::route('/'),
            'create' => Pages\CreateBarang::route('/create'),
            'edit' => Pages\EditBarang::route('/{record}/edit'),
        ];
    }
}
