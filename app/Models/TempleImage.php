<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TempleImage extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function temple(): BelongsTo
    {
        return $this->belongsTo(Temple::class);
    }
}
