<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Email extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'contact_id'
    ];

    /**
     * email relationship with contact
     */
    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }
}
