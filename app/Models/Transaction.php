<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class Transaction extends Model
{
    use HasFactory;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'amount',
        'paid_at',
        'category_id',
        'user_id',
    ];

    /**
     * @param Request $request
     * @param $id
     * @return void
     * @throws ValidationException
     */
    public function StoreUpdateValidator(Request $request, $id = null): void
    {
        Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:25',
            'amount' => 'required|decimal',
            'paid_at' => 'datetime',
            'category_id' => 'required',
        ])->validate();


        $this->name = $request->name ?? $this->name;
        $this->amount = $request->amount ?? $this->amount;
        $this->paid_at = $request->paid_at ?? $this->paid_at;
        $this->category_id = $request->category_id ?? $this->category_id;
        $this->user_id = $id ? $this->user_id : Auth::id();

        $this->save();
    }

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
