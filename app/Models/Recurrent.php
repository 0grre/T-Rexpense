<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Recurrent extends Transaction
{
    use HasFactory;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'total',
        'category_id',
        'user_id',
    ];

    /**
     * @return HasMany
     */
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     * @return bool
     */
    public function recurrent_is_paid(): bool
    {
        return $this->transactions()
            ->whereBetween('paid_at', [
                Carbon::now()->firstOfMonth()->format('Y-m-d'),
                Carbon::now()->lastOfMonth()->format('Y-m-d')
            ])->exists();
    }
}
