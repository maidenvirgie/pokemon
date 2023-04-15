<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pokemon extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'base_experience',
        'height',
        'weight',
        'image'
    ];

    public function abilities(): BelongsToMany
    {
        return $this->belongsToMany(Ability::class);
    }

}
