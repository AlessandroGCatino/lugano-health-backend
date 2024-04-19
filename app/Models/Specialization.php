<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Specialization extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
    ];

    public function  doctors():belongsToMany{
        return $this->belongsToMany(Doctor::class);
    }

}

