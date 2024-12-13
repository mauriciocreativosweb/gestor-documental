<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payments extends Model
{
    use HasFactory;

    protected $fillable = [
        'idCompany',
        'paymentDate',
        'paymentInfo'
    ];

    public function company() : BelongsTo{
        return $this->belongsTo(Company::class);
    }
}
