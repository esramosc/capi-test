<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'state',
        'city'
    ];

    /**
     * phones from the contact
     */
    public function phones(): HasMany
    {
        return $this->hasMany(Phone::class);
    }

    /**
     * email from the contact
     */
    public function emails(): HasMany
    {
        return $this->hasMany(Email::class);
    }

    /**
     * addresses from the contact
     */
    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

}
