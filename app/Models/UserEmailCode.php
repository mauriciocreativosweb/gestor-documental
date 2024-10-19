<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class UserEmailCode extends Model
{
    use HasFactory;

    public $table="user_email_codes";

    protected $fillable = [
        'user_id',
        'code'
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

}
