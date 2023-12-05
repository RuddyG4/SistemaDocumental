<x-app :$permissions>
    <x-slot:title>
        Suscripciones
    </x-slot:title>
    @php
    $customer = auth()->user()->customer;
    $subscription = $customer->activeSubscription;
    $plan_active = $customer->activePlan();
    @endphp

    <div class="row">
        <div class="col-12">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                            <h5 class="mb-0">Subscription Information</h5>
                        </div>
                        <div class="col-md-4 text-end">
                            <a href="javascript:;">
                                <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" aria-hidden="true" data-bs-original-title="Edit Profile" aria-label="Edit Profile"></i><span class="sr-only">Edit Profile</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="col-md-8 d-flex align-items-center">
                        <h6 class="mb-0">{{ $plan_active->plan_name }}</h6>
                    </div>
                    <p class="text-sm">
                        {{ $plan_active->plan_description }}
                    </p>
                    <ul class="list-group">
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">End Date:</strong> &nbsp; {{ $subscription != null ? $subscription->end_date : 'Ilimitado'}}</li>
                        @if ($waiting_sub)
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Will change to plan {{ $waiting_sub->plan->plan_name }} on:</strong> &nbsp; {{ $waiting_sub->start_date }}</li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        @foreach ($plans as $plan)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header text-center pt-4 pb-3">
                    <span class="badge rounded-pill bg-light text-dark">{{ $plan->plan_name }}</span>
                    <h1 class="font-weight-bold mt-2">
                        <small class="text-sm">BOB</small> {{ $plan->plan_price }}
                    </h1>
                </div>
                <div class="card-body text-lg-left text-center pt-0">
                    @foreach ($plan->planDetails as $planDetail)
                    <div class="d-flex justify-content-lg-start justify-content-center p-2">
                        <div class="icon icon-shape icon-xs rounded-circle bg-gradient-success shadow text-center">
                            <i class="fas fa-check opacity-10" aria-hidden="true"></i>
                        </div>
                        <div>
                            <span class="ps-3">{{ $planDetail->pd_name }} : {{ $planDetail->pd_value }}</span>
                        </div>
                    </div>
                    @endforeach

                    @if ($plan->id == $plan_active->id)
                    <div class="btn btn-icon {{ $plan->plan_name == 'Enterprise' ? 'bg-gradient-primary' : 'bg-gradient-secondary' }} d-lg-block mt-3 mb-0">
                        This is your current plan &nbsp;
                        <i class="fas fa-check opacity-10" aria-hidden="true"></i>
                    </div>
                    @else
                    <a href="{{ route('subscriptions.change-plan', $plan->id) }}" class="btn btn-icon {{ $plan->plan_name == 'Enterprise' ? 'bg-gradient-primary' : 'bg-gradient-secondary' }} d-lg-block mt-3 mb-0">
                        Try {{ $plan->plan_name }} plan
                        <i class="fas fa-arrow-right ms-1" aria-hidden="true"></i>
                    </a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</x-app>