<?php

namespace App\Filament\Resources\ContactFormSubmissionResource\Pages;

use App\Filament\Resources\ContactFormSubmissionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContactFormSubmission extends EditRecord
{
    protected static string $resource = ContactFormSubmissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
