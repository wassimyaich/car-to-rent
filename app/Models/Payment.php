<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_id',
        'amount',
        'payment_method',
        'transaction_id',
        'status'
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isPending()
    {
        return $this->status === 'pending';
    }
    
    public function isCompleted()
    {
        return $this->status === 'completed';
    }
    
    public function isFailed()
    {
        return $this->status === 'failed';
    }
    
    public function isRefunded()
    {
        return $this->status === 'refunded';
    }
 



    

}
