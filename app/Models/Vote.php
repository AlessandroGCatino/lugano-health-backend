<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = [
        'stars',
        'description'
    ];
    //una Vote è collegato a + dottors
    public function  doctors():BelongsToMany{
        return $this->belongsToMany(Doctor::class);
    }

}
