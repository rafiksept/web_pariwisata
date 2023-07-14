<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProofOfPaymentResource\Pages;
use App\Filament\Resources\ProofOfPaymentResource\RelationManagers;
use App\Filament\Resources\ProofOfPaymentResource\RelationManagers\TicketsRelationManager;
use App\Models\ProofOfPayment;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Closure;
use Illuminate\Support\Str;
use Filament\Forms\Components\Card;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Support\Facades\DB;

class ProofOfPaymentResource extends Resource
{
    protected static ?string $model = ProofOfPayment::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationLabel = 'Bukti Pembayaran';

    public static function form(Form $form): Form
    {
        $uuid = Str::random(10);
        return $form
            ->schema([
                Card::make() -> schema([
                TextInput::make('uuid') -> required() ->default($uuid) -> disabled(),
                TextInput::make('type_payment')  ->required(),
                TextInput::make('price') -> required() ->numeric(),
                Toggle::make('is_verify'),
                FileUpload::make('image_post')->image() ->required()->imagePreviewHeight('700'),
                
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id') -> sortable(),
                TextColumn::make('uuid') -> sortable(),
                TextColumn::make('type_payment'),
                TextColumn::make('price'),
                ImageColumn::make('image_post'),
                ToggleColumn::make('is_verify'),
                
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            TicketsRelationManager::class 
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProofOfPayments::route('/'),
            'create' => Pages\CreateProofOfPayment::route('/create'),
            'edit' => Pages\EditProofOfPayment::route('/{record}/edit'),
        ];
    }    
}
