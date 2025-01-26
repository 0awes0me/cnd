<?php

namespace App\Domains\Contact\Observers;

use App\Domains\Contact\Actions\SendContactFormSubmittedEmail;
use App\Domains\Contact\Models\ContactFormSubmission;

class ContactFormSubmissionObserver
{
	/**
	 * Handle the ContactFormSubmission "created" event.
	 */
	public function created(ContactFormSubmission $contactFormSubmission): void
	{
		SendContactFormSubmittedEmail::dispatch($contactFormSubmission);
	}

	/**
	 * Handle the ContactFormSubmission "updated" event.
	 */
	public function updated(ContactFormSubmission $contactFormSubmission): void
	{
		//
	}

	/**
	 * Handle the ContactFormSubmission "deleted" event.
	 */
	public function deleted(ContactFormSubmission $contactFormSubmission): void
	{
		//
	}

	/**
	 * Handle the ContactFormSubmission "restored" event.
	 */
	public function restored(ContactFormSubmission $contactFormSubmission): void
	{
		//
	}

	/**
	 * Handle the ContactFormSubmission "force deleted" event.
	 */
	public function forceDeleted(ContactFormSubmission $contactFormSubmission): void
	{
		//
	}
}
