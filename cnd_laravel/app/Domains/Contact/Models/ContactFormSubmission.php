<?php

namespace App\Domains\Contact\Models;

use App\Domains\Abstract\Models\AbstractModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactFormSubmission extends AbstractModel
{

    use SoftDeletes;

    protected $table = 'contact_form_submissions';

    protected $fillable = [
        'contact_id',
        'subject',
        'message'
    ];

    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class, 'contact_id', 'id');
    }

}
