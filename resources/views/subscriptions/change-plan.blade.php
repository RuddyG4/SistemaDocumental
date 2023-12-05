<x-app :$permissions>
    <x-slot:title>
        Change subscription
    </x-slot:title>

    <div class="row">
        <div class="col-lg-8">
            <div class="row">
                <div class="col-md-12 mb-lg-0 mb-4">
                    <div class="card">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="mb-0">Payment Method</h6>
                                </div>
                                <div class="col-6 text-end">
                                    <a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="fas fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Add New Card</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-md-6 mb-md-0 mb-4">
                                    <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                                        <img class="w-10 me-3 mb-0" src="{{ asset('assets/img/logos/mastercard.png') }}" alt="logo">
                                        <h6 class="mb-0">****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;7852</h6>
                                        <i class="fas fa-pencil-alt ms-auto text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="" aria-hidden="true" data-bs-original-title="Edit Card" aria-label="Edit Card"></i><span class="sr-only">Edit Card</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                                        <img class="w-10 me-3 mb-0" src="{{ asset('assets/img/logos/visa.png') }}" alt="logo">
                                        <h6 class="mb-0">****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;5248</h6>
                                        <i class="fas fa-pencil-alt ms-auto text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="" aria-hidden="true" data-bs-original-title="Edit Card" aria-label="Edit Card"></i><span class="sr-only">Edit Card</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 mb-xl-0 mb-4">
                <div class="card bg-transparent shadow-xl mt-4">
                    <div class="overflow-hidden position-relative border-radius-xl" style="background-image: url('../assets/img/curved-images/curved14.jpg');">
                        <span class="mask bg-gradient-dark"></span>
                        <div class="card-body position-relative z-index-1 p-3">
                            <i class="fas fa-wifi text-white p-2" aria-hidden="true"></i>
                            <h5 class="text-white mt-4 mb-5 pb-2">4562&nbsp;&nbsp;&nbsp;1122&nbsp;&nbsp;&nbsp;4594&nbsp;&nbsp;&nbsp;7852</h5>
                            <div class="d-flex">
                                <div class="d-flex">
                                    <div class="me-4">
                                        <p class="text-white text-sm opacity-8 mb-0">Card Holder</p>
                                        <h6 class="text-white mb-0">Jack Peterson</h6>
                                    </div>
                                    <div>
                                        <p class="text-white text-sm opacity-8 mb-0">Expires</p>
                                        <h6 class="text-white mb-0">11/22</h6>
                                    </div>
                                </div>
                                <div class="ms-auto w-20 d-flex align-items-end justify-content-end">
                                    <img class="w-60 mt-2" src="{{ asset('assets/img/logos/mastercard.png') }}" alt="logo">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Invoices</h6>
                        </div>
                        <div class="col-6 text-end">
                            <button class="btn btn-outline-primary btn-sm mb-0">View All</button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3 pb-0">
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="mb-1 text-dark font-weight-bold text-sm">March, 01, 2020</h6>
                                <span class="text-xs">#MS-415646</span>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                $180
                                <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fas fa-file-pdf text-lg me-1" aria-hidden="true"></i> PDF</button>
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="text-dark mb-1 font-weight-bold text-sm">February, 10, 2021</h6>
                                <span class="text-xs">#RV-126749</span>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                $250
                                <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fas fa-file-pdf text-lg me-1" aria-hidden="true"></i> PDF</button>
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="text-dark mb-1 font-weight-bold text-sm">April, 05, 2020</h6>
                                <span class="text-xs">#FB-212562</span>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                $560
                                <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fas fa-file-pdf text-lg me-1" aria-hidden="true"></i> PDF</button>
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="text-dark mb-1 font-weight-bold text-sm">June, 25, 2019</h6>
                                <span class="text-xs">#QW-103578</span>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                $120
                                <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fas fa-file-pdf text-lg me-1" aria-hidden="true"></i> PDF</button>
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="text-dark mb-1 font-weight-bold text-sm">March, 01, 2019</h6>
                                <span class="text-xs">#AR-803481</span>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                $300
                                <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fas fa-file-pdf text-lg me-1" aria-hidden="true"></i> PDF</button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-6 col-7">
                                <h6>Confirm Payment</h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div>
                                <span>You are about to change your plan to <strong>{{ $plan->plan_name }}</strong>.</span>
                            </div>
                            <div class="mt-3">
                                <span><strong>Amount:</strong> {{ $plan->plan_price }} BOB</span>
                            </div>
                            @php $subscription = auth()->user()->customer->activeSubscription; @endphp
                            @if ($subscription)
                            <div class="mt-3">
                                <span>Your current plan will expire on <strong>{{ $subscription->end_date }}</strong>.</span>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="card-footer py-2">
                        <hr>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-link text-secondary mb-0" type="button">Cancel</button>
                            <form action="{{ route('subscriptions.confirm-plan-change', $plan->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-info mb-0" type="submit">Confirm Payment</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>