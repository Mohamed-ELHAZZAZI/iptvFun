<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_uuid',
        'cardHolder',
        'email',
        'iptv_plans_id',
        'mac_address',
        'ip_address',
        'amount',
        'payment_id',
        'status',
        'receipt',
        'risk_score',
        'risk_level',
        'card_id',
        'country',
        'card_brand',
        'last4',
        'token'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function iptvPlans()
    {
        return $this->belongsTo(IptvPlans::class);
    }
}
