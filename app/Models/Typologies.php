<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Typologies extends Model
{
    use HasFactory;

    protected $fillable=[
        'typologyName'
    ];

    public function company() : BelongsTo{
        return $this->belongsTo(Company::class);
    }
}
