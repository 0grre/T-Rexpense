<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Budget extends Transaction
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
}
