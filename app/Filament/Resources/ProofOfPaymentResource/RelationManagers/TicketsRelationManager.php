<?php

namespace App\Filament\Resources\ProofOfPaymentResource\RelationManagers;

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

class TicketsRelationManager extends RelationManager
{
    protected static string $relationship = 'tickets';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        $uuid = Str::random(100);
        return $form
            ->schema([
                Card::make() -> schema([
                    Select::make('tourist_attraction_id')->relationship('touristAttraction', 'name'),
                    TextInput::make('uuid') -> required() ->default($uuid) -> disabled(),
                    TextInput::make('name') -> required(),
                TextInput::make('phone_number') ->required(),
                TextInput::make('email')-> required(),
                Toggle::make('is_verify'),
                Select::make('proof_of_payment_id')->relationship('proofOfPayment', 'uuid') ->nullable()
    
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id') -> sortable(),
                TextColumn::make('name')->limit(50) -> sortable(),
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
