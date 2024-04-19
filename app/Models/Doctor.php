<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "surname",
        "address",
        "phone_number",
        "user_id",
        "performances",
        "CV"
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

}
