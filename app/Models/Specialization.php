<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;


class Specialization extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
    ];

    public static function generateSlug($name){
        return Str::slug($name, '-');
    }

    public function doctors():BelongsToMany{
        return $this->belongsToMany(Doctor::class);
    }

}

