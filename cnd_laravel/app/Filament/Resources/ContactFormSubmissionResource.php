<?php

namespace App\Filament\Resources;

use App\Domains\Contact\Models\ContactFormSubmission;
use App\Filament\Resources\ContactFormSubmissionResource\Pages;
use App\Filament\Resources\ContactFormSubmissionResource\RelationManagers\ContactRelationManager;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ContactFormSubmissionResource extends Resource
{
    protected static ?string $model = ContactFormSubmission::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('subject')->label('Subject'),
                Textarea::make('message')->label('message')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('contact.name')->searchable()->label('From'),
                Tables\Columns\TextColumn::make('subject')->searchable()
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
            ContactRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListContactFormSubmissions::route('/'),
            'create' => Pages\CreateContactFormSubmission::route('/create'),
            'edit'   => Pages\EditContactFormSubmission::route('/{record}/edit'),
        ];
    }
}
