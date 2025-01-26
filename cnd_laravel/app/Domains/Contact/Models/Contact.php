<?php

namespace App\Domains\Contact\Models;

use App\Domains\Abstract\Models\AbstractModel;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends AbstractModel
{

    use SoftDeletes;

    protected $table = 'contacts';

    protected $fillable = [
        'name',
        'email'
    ];

    public function formSubmissions(): HasMany
    {
        return $this->hasMany(ContactFormSubmission::class, 'contact_id', 'id');
    }
}
