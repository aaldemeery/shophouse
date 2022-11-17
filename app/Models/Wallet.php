<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = [
        "balance",
    ];

    protected $casts = [
        "balance" => "decimal"
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
