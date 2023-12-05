<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index()
    {
        $permissions = auth()->user()->getPermissions();
        $plans = Plan::with('planDetails')->get();
        $waiting_sub = Subscription::where('customer_id', auth()->user()->tenan_id)->where('status', 'W')->first();
        return view('subscriptions.index', compact('permissions', 'plans', 'waiting_sub'));
    }

    public function changePlan($plan_id)
    {
        $plan = Plan::with('planDetails')->find($plan_id);
        $permissions = auth()->user()->getPermissions();
        return view('subscriptions.change-plan', compact('plan', 'permissions'));
    }

    public function confirmPlanChange($plan_id)
    {
        $current_subscription = auth()->user()->customer->activeSubscription;
        if ($current_subscription == null) {
            $current_subscription = Subscription::create([
                'customer_id' => auth()->user()->tenan_id,
                'plan_id' => $plan_id,
                'start_date' => now()->format('Y-m-d'),
                'end_date' => now()->addMonth()->format('Y-m-d'),
                'status' => 'A'
            ]);
        } else {
            $waiting_sub = Subscription::where('customer_id', auth()->user()->tenan_id)->where('status', 'W')->first();
            if ($waiting_sub != null) {
                $waiting_sub->status = 'C';
                $waiting_sub->save();
            }
            $end_date = Carbon::createFromFormat("Y-m-d", $current_subscription->end_date);
            Subscription::create([
                'customer_id' => auth()->user()->tenan_id,
                'plan_id' => $plan_id,
                'start_date' => $end_date->format('Y-m-d'),
                'end_date' => $end_date->addMonth()->format('Y-m-d'),
                'status' => 'W'
            ]);
        }

        return redirect()->to('/subscriptions');
    }
}
