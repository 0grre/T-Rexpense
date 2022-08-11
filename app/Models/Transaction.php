<?php

namespace App\Models;

use Carbon\Carbon;
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
        'total',
        'paid_at',
        'category_id',
        'user_id',
    ];

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
            'amount' => 'required|numeric',
            'paid_at' => 'date',
            'category_id' => 'required',
        ])->validate();


        if ($request->paid_at) {
            $this->paid_at = $request->paid_at;
        }

        if ($request->recurrent_id) {
            $this->recurrent_id = $request->recurrent_id;
        }

        $this->name = $request->name ?? $this->name;
        $this->amount = $request->amount ?? $this->amount;
        $this->category_id = $request->category_id ?? $this->category_id;
        $this->user_id = $id ? $this->user_id : Auth::id();

        $this->save();
    }

    /**
     * @return bool
     */
    public function is_expense(): bool
    {
        return $this->category->is_expense == 1;
    }

    /**
     * @return bool
     */
    public function is_paid(): bool
    {
        return $this->paid_at <= Carbon::now()->format('Y-m-d');
    }

    /**
     * @return bool
     */
    public function is_monthly(): bool
    {
        return $this->paid_at >= Carbon::now()->firstOfMonth()->format('Y-m-d') && $this->paid_at <= Carbon::now()->lastOfMonth()->format('Y-m-d');
    }
}
