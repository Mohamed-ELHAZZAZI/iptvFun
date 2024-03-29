<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IptvPlans extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'period',
        'type',
        'sluck'
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
