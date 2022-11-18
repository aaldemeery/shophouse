<?php

namespace App\Models;

use App\Models\Store;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "content",
        "rate"
    ];

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    public function review_id()
    {
        return $this->morphTo();
    }
}
