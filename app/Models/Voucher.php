<?php

namespace App\Models;

use App\Models\Store;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = [
        "percentage",
        "remaining",
        "code",
    ];

    protected $casts = [
        "percentage" => "integer",
        "remaining" => "integer",
    ];

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }
}
