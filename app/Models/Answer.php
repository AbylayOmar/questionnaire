<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'text', // if answer text is "other" it means this is custom users answer
    ];

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }
}
