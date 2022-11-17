<?php

namespace App\Models;

use App\Models\Store;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class review extends Model
{
    use HasFactory;

    public function review_id()
    {
        return $this->morphTo();
    }

    protected $fillable = [
        "title",
        "content"
    ];

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }
}
