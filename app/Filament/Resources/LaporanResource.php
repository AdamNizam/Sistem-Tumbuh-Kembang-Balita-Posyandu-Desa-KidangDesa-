<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LaporanResource\Pages;
use App\Filament\Resources\LaporanResource\RelationManagers;
use App\Models\Laporan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LaporanResource extends Resource
{
    protected static ?string $model = Laporan::class;

    protected static ?string $navigationIcon = 'heroicon-s-clipboard-document';

    protected static ?string $pluralModelLabel = 'Laporan Kegiatan';

    protected static ?string $navigationGroup = 'Semua Laporan';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('periode')->required(),

            Forms\Components\Textarea::make('isi_laporan')->required(),

            Forms\Components\Select::make('id_balita')
                ->label('Nama Balita')
                ->relationship('balita', 'nama_balita')
                ->preload()
                ->required(),

            Forms\Components\Select::make('id_pertumbuhan')
                ->label('Data Pertumbuhan')
                ->relationship('pertumbuhan', 'kategori_pertumbuhan')
                ->getOptionLabelFromRecordUsing(function ($record) {
                    return $record->kategori_pertumbuhan . ' - ' . $record->balita->nama_balita;
                })
                ->preload()
                ->required(),

            Forms\Components\Select::make('id_jadwal')
                ->label('Jadwal')
                ->relationship('jadwal', 'kegiatan')
                ->preload()
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('periode'),
                Tables\Columns\TextColumn::make('isi_laporan')->limit(50),
                Tables\Columns\TextColumn::make('balita.nama_balita')->label('Balita'),
                Tables\Columns\TextColumn::make('balita.umur')->label('Umur'),
                Tables\Columns\TextColumn::make('pertumbuhan.kategori_pertumbuhan')->label('Kategori'),
                Tables\Columns\TextColumn::make('jadwal.kegiatan')->label('Kegiatan'),
                Tables\Columns\TextColumn::make('jadwal.tanggal')->date()->label('Jadwal Kegiatan'),
                Tables\Columns\TextColumn::make('created_at')->since(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\BulkAction::make('Download PDF')
                    ->label('Unduh PDF')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->color('success')
                    ->action(function (\Illuminate\Support\Collection $records) {
                        $data = $records->load(['balita', 'pertumbuhan', 'jadwal']);
                        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.laporan', ['data' => $data]);
                        return response()->streamDownload(function () use ($pdf) {
                            echo $pdf->stream();
                        }, 'laporan.pdf');
                    })
                    ->deselectRecordsAfterCompletion(),
            
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
            'index' => Pages\ListLaporans::route('/'),
        ];
    }
}
