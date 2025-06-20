<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PertumbuhanResource\Pages;
use App\Models\Pertumbuhan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\Filter;
use Illuminate\Support\Collection;
use Filament\Notifications\Notification;

class PertumbuhanResource extends Resource
{
    protected static ?string $model = Pertumbuhan::class;
    protected static ?string $navigationIcon = 'heroicon-s-calendar';
    protected static ?string $pluralModelLabel = 'Pertumbuhan Balita';
    protected static ?string $navigationGroup = 'Data Posyandu';

    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::count() > 10 ? 'warning' : 'primary';
    }
    
    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('id_balita')
                ->label('Nama Balita')
                ->relationship('balita', 'nama_balita')
                ->getOptionLabelFromRecordUsing(fn ($record) => $record->nama_balita)
                ->preload()
                ->required(),

            Forms\Components\TextInput::make('berat_badan')
                ->label('Berat Badan (kg)')
                ->numeric()
                ->suffix('Kg')
                ->required(),

            Forms\Components\TextInput::make('tinggi_badan')
                ->label('Tinggi Badan (cm)')
                ->numeric()
                ->suffix('cm')
                ->required(),

            Forms\Components\TextInput::make('lingkar_kepala')
                ->label('Lingkar Kepala (cm)')
                ->numeric()
                ->suffix('cm')
                ->required(),

            Forms\Components\DatePicker::make('tanggal_input')
                ->label('Tanggal Pemeriksaan')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('balita.nama_balita')->label('Nama Balita')->searchable(),
                Tables\Columns\TextColumn::make('balita.umur')->label('Umur Balita')->searchable()->suffix(' bulan'),
                Tables\Columns\TextColumn::make('balita.jenis_kelamin')->label('Jenis Kelamin')->searchable(),
                Tables\Columns\TextColumn::make('berat_badan')->label('BB (kg)'),
                Tables\Columns\TextColumn::make('tinggi_badan')->label('TB (cm)'),
                Tables\Columns\TextColumn::make('lingkar_kepala')->label('LK (cm)'),
                Tables\Columns\TextColumn::make('kategori_pertumbuhan')->label('Kategori'),
                Tables\Columns\TextColumn::make('tanggal_input')->label('Tgl Pemeriksaan')->date(),
                Tables\Columns\TextColumn::make('created_at')->Label('Dibuat')->since(),
            ])
            ->filters([
                Filter::make('tanggal_input')
                    ->form([
                        Forms\Components\DatePicker::make('from')->label('Dari'),
                        Forms\Components\DatePicker::make('until')->label('Sampai'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when($data['from'], fn ($q) => $q->whereDate('tanggal_input', '>=', $data['from']))
                            ->when($data['until'], fn ($q) => $q->whereDate('tanggal_input', '<=', $data['until']));
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\BulkAction::make('Download PDF')
                    ->label('Unduh PDF')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->color('success')
                    ->action(function (Collection $records) {
                        $data = $records->load('balita');
                        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.laporan-pertumbuhan', ['data' => $data]);
                        return response()->streamDownload(function () use ($pdf) {
                            echo $pdf->stream();
                        }, 'laporan-pertumbuhan-balita.pdf');
                    })
                    ->deselectRecordsAfterCompletion(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPertumbuhans::route('/'),
            'create' => Pages\CreatePertumbuhan::route('/create'),
            'edit' => Pages\EditPertumbuhan::route('/{record}/edit'),
        ];
    }

 public static function hitungKategori(float $bb, float $tb, float $lk, int $umur, string $jenisKelamin): string
    {
        // Validasi input
        if ($tb <= 0 || $bb <= 0 || $umur <= 0) {
            Notification::make()
                ->title('Data Tidak Valid')
                ->body('Berat badan, tinggi badan, atau umur tidak boleh nol atau negatif.')
                ->danger()
                ->send();

            return 'Data Tidak Valid';
        }

        $tbMeter = $tb / 100;
        $imt = $bb / ($tbMeter * $tbMeter);

        // Logging IMT untuk debugging
        logger()->info('IMT dihitung', [
            'bb' => $bb,
            'tb' => $tb,
            'tbMeter' => $tbMeter,
            'imt' => $imt,
            'umur' => $umur,
            'jenisKelamin' => $jenisKelamin,
        ]);

        // Notifikasi hasil ke pengguna
        Notification::make()
            ->title('Hasil Perhitungan IMT')
            ->body('IMT Anda adalah: ' . number_format($imt, 2))
            ->success()
            ->send();

        // Klasifikasi IMT
        return match (true) {
            $imt >= 30     => 'Obesitas',
            $imt >= 25     => 'Kelebihan Berat',
            $imt >= 18.5   => 'Normal',
            default        => 'Kurus',
        };
    }
}
