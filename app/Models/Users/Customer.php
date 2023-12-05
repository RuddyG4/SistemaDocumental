<?php

namespace App\Models\Users;

use App\Models\Plan;
use App\Models\Subscription;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'company_name'
    ];

    public function subscriptions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Subscription::class);
    }

    public function activeSubscription(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Subscription::class)->whereBetween('start_date', [now()->subMonth()->format('Y-m-d'), now()->format('Y-m-d')]);
    }

    public function activePlan(): Plan
    {
        $subscription = $this->activeSubscription;
        if ($subscription == null) {
            return Plan::where('plan_name', 'Free')->first();
        }
        return $this->activeSubscription()->first()->plan;
    }
}
