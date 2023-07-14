<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TouristAttractionResource\Pages;
use App\Filament\Resources\TouristAttractionResource\RelationManagers;
use App\Models\TouristAttraction;
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
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\RichEditor;

class TouristAttractionResource extends Resource
{
    protected static ?string $model = TouristAttraction::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationLabel = 'Tempat Wisata';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make() -> schema([
                    TextInput::make('name') 
                ->reactive()
                ->afterStateUpdated(function (Closure $set, $state) {
                    $set('slug', Str::slug($state));
                })-> required(),
                TextInput::make('slug') ->required(),
                TextInput::make('location') ->required(),
                TextInput::make('definition') ->required(),
                RichEditor::make('description') ->required(),
                TextInput::make('ticket') ->required() -> numeric(),
                FileUpload::make('image_post')->image() ->required()
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id') -> sortable(),
                TextColumn::make('name')->limit(50) -> sortable(),
                TextColumn::make('slug')->limit(50),
                TextColumn::make('location'),
                TextColumn::make('ticket'),
                ImageColumn::make('image_post'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTouristAttractions::route('/'),
            'create' => Pages\CreateTouristAttraction::route('/create'),
            'edit' => Pages\EditTouristAttraction::route('/{record}/edit'),
        ];
    }    
}
