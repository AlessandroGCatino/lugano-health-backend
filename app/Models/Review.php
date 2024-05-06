<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['user_name', 'user_mail','comment', 'doctor_id'];

    public function doctor(): BelongsTo{
        return $this->belongsTo(Doctor::class);
    }
}
