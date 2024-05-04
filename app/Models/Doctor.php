<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

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
        "CV",
        'ProfilePic',
        'slug',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($doctor) {
            $doctor->slug = static::generateSlug($doctor->name, $doctor->surname);
        });
    }

    public static function generateSlug($name, $surname){
        $baseSlug = Str::slug($name . ' ' . $surname, '-');

        $count = static::where('slug', $baseSlug)->count();

        if($count > 0){
            $uniqueIdentifier = Str::random(5); 
            return $baseSlug . '-' . $uniqueIdentifier;
        }

        return $baseSlug;
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function specializations(): BelongsToMany{
        return $this->belongsToMany(Specialization::class);
    }

    public function sponsorizations(): BelongsToMany{
        return $this->belongsToMany(Sponsorization::class)->withPivot("start", "deadline");
    }

    public function messages(): HasMany{
        return $this->hasMany(Message::class);
    }

    public function reviews(): HasMany{
        return $this->hasMany(Review::class);
    }
}
