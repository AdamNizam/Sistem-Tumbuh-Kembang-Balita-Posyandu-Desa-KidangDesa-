<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BalitaResource\Pages;
use App\Filament\Resources\BalitaResource\RelationManagers;
use App\Models\Balita;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BalitaResource extends Resource
{
    protected static ?string $model = Balita::class;

    protected static ?string $navigationIcon = 'heroicon-s-user-plus';

    protected static ?string $pluralModelLabel = 'Data Balita';

    protected static ?string $navigationGroup = 'Data Posyandu';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(2)
                    ->schema([
                        Forms\Components\TextInput::make('nama_balita')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\Select::make('jenis_kelamin')
                            ->required()
                            ->options([
                                'laki-laki' => 'Laki-laki',
                                'perempuan' => 'Perempuan',
                            ]),

                        Forms\Components\DatePicker::make('tanggal_lahir')
                            ->required(),

                        Forms\Components\TextInput::make('nama_orang_tua')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\Textarea::make('alamat')
                            ->required()
                            ->columnSpan(2),
                    ]),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_balita')->searchable(),
                Tables\Columns\TextColumn::make('jenis_kelamin'),
                Tables\Columns\TextColumn::make('tanggal_lahir')->date(),
                Tables\Columns\TextColumn::make('nama_orang_tua')->searchable(),
                Tables\Columns\TextColumn::make('umur'),
                Tables\Columns\TextColumn::make('alamat')->limit(30),
                Tables\Columns\TextColumn::make('created_at')->since(),
            ])
          ->filters([
                Tables\Filters\SelectFilter::make('jenis_kelamin')
                    ->options([
                        'laki-laki' => 'Laki-laki',
                        'perempuan' => 'Perempuan',
                    ])
                    ->label('Jenis Kelamin'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(), // Tambah action delete
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListBalitas::route('/'),
            'create' => Pages\CreateBalita::route('/create'),
            'edit' => Pages\EditBalita::route('/{record}/edit'),
        ];
    }
}
