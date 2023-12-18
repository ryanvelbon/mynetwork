<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Filament\Resources\ContactResource\RelationManagers;
use App\Models\Contact;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('sex')
                    ->options([
                        'm' => 'Male',
                        'f' => 'Female',
                    ])
                    ->required(),
                Forms\Components\DatePicker::make('dob'),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(255),
                Forms\Components\Select::make('category_id')
                    ->label('Category')
                    ->relationship('category', 'title')
                    ->searchable()
                    ->preload(),
                Forms\Components\Select::make('country_id')
                    ->label('Nationality')
                    ->relationship('country', 'title')
                    ->searchable()
                    ->preload(),
                Forms\Components\Select::make('city_id')
                    ->label('City')
                    ->relationship('city', 'title')
                    ->searchable()
                    ->preload(),
                Forms\Components\Select::make('religion_id')
                    ->label('Religion')
                    ->relationship('religion', 'title')
                    ->searchable()
                    ->preload(),
                Forms\Components\Select::make('hobbies')
                    ->multiple()
                    ->relationship('hobbies', 'title')
                    ->preload(),
                Forms\Components\CheckboxList::make('skills')
                    ->relationship('skills', 'title'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category.title'),
                Tables\Columns\TextColumn::make('city.title'),
                Tables\Columns\TextColumn::make('country.title')
                    ->label('Nationality'),
                Tables\Columns\TextColumn::make('religion.title'),
                Tables\Columns\TextColumn::make('sex')
                    ->searchable(),
                Tables\Columns\TextColumn::make('dob')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }
}
