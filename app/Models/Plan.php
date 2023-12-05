<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plan extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = [
        'plan_name',
        'plan_description',
        'plan_price',
        'plan_duration',
        'created_at'
    ];

    public function planDetails(): HasMany
    {
        return $this->hasMany(PlanDetail::class);
    }

    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }
}
