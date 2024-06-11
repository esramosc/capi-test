<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Phone extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone',
        'contact_id'
    ];

    /**
     * phone relationship with contact
     */
    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }
}