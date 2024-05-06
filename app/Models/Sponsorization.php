<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Sponsorization extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'name',
        'durata',
        'description',
    ];
    //una Sponsorization è collegato a + dottors
    public function doctors(): BelongsToMany{
        return $this->belongsToMany(Doctor::class);
    }
}
