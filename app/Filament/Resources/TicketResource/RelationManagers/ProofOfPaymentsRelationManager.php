<?php

namespace App\Filament\Resources\TicketResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
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


class ProofOfPaymentsRelationManager extends RelationManager
{
    protected static string $relationship = 'proofOfPayment';

    protected static ?string $recordTitleAttribute = 'uuid';

    public static function form(Form $form): Form
    {
        $uuid = Str::random(10);
        return $form
            ->schema([
                Card::make() -> schema([
                TextInput::make('uuid') -> required() ->default($uuid) -> disabled(),
                TextInput::make('type_payment')  ->required(),
                TextInput::make('payment_number') ->required(),
                FileUpload::make('image_post')->image() ->required(),
                TextInput::make('price') -> required(),
                Toggle::make('is_verify')
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id') -> sortable(),
                TextColumn::make('type_payment'),
                TextColumn::make('payment_number'),
                TextColumn::make('price') ,
                ToggleColumn::make('is_verify'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }    
}
