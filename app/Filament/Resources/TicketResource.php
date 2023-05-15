<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TicketResource\Pages;
use App\Filament\Resources\TicketResource\RelationManagers;
use App\Filament\Resources\TicketResource\RelationManagers\ProofOfPaymentsRelationManager;
use App\Models\Ticket;
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
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Forms\Components\DatePicker;



class TicketResource extends Resource
{
    protected static ?string $model = Ticket::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    

    public static function form(Form $form): Form
    {
        $uuid = Str::random(100);
        return $form
            ->schema([
                Card::make() -> schema([
                    Select::make('tourist_attraction_id')->relationship('touristAttraction', 'name') ->required(),
                    TextInput::make('uuid') -> required() ->default($uuid) -> disabled(),
                    TextInput::make('name') -> required(),
                TextInput::make('phone_number') ->required(),
                Select::make('user_id')->relationship('user', 'name') ->required(),
                TextInput::make('email')-> required(),
                DatePicker::make('tanggal_pemesanan') -> required(),
                Toggle::make('is_verify'),
                Select::make('promo_id')->relationship('promo', 'id') ->nullable(),
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
                //
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
            ProofOfPaymentsRelationManager::class
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTickets::route('/'),
            'create' => Pages\CreateTicket::route('/create'),
            'edit' => Pages\EditTicket::route('/{record}/edit'),
        ];
    }    
}
