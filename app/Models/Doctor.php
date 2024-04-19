<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function specialization(): BelongsToMany{
        return $this->belongsToMany(Specialization::class);
    }

}
