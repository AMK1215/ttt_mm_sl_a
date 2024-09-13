<?php

namespace App\Models;

use App\Models\User;
use App\Models\PlaceBet;
use App\Enums\TransactionName;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Bavix\Wallet\Models\Transaction as ModelsTransaction;

class Transaction extends ModelsTransaction
{
    use HasFactory;

    /**
     * @var array<string, string>
     */
    protected $fillable = ['target_user_id'];

    protected $casts = [
        'wallet_id' => 'int',
        'confirmed' => 'bool',
        'meta' => 'json',
        'name' => TransactionName::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function wager()
    {
        return $this->belongsTo(Wager::class);
    }

    public function placeBets()
    {
        return $this->hasMany(PlaceBet::class, 'transaction_id', 'id');
    }

    public function targetUser()
{
    return $this->belongsTo(User::class, 'target_user_id'); // Use a different foreign key if needed
}


    // public function targetUser()
    // {
    //     return $this->belongsTo(User::class);
    // }
}