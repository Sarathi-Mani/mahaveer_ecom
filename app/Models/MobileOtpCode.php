<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MobileOtpCode extends Model
{
    protected $fillable = [
        'mobile',
        'otp_code',
        'expires_at',
    ];

    protected function casts(): array
    {
        return [
            'expires_at' => 'datetime',
        ];
    }
}
