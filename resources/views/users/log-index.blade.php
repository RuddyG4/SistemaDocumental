<x-app :$permissions>
    <x-slot:title>
        Log
    </x-slot:title>

    <div class="card-header pb-0">
        <div class="row">
            <div class="col-xl-10 col-sm-6 d-flex align-items-center">
                <h6 class="mb-0">
                    Log (User's Activity)
                </h6>
            </div>
        </div>

        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Activity</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">By User</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date & Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($logs as $log)
                        <tr wire:key="{{ $log->id }}">
                            <td>
                                <div class="d-flex px-2 py-1" >
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{ $log->activity }}</h6>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{ $log->user->username }}</h6>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{ $log->created_at }}</h6>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    @if($logs->hasPages())
                    <tfoot>
                        <tr>
                            <td>
                                {{ $logs->links()}}
                            </td>
                        </tr>
                    </tfoot>
                    @endif
                </table>
            </div>
        </div>
    </div>
</x-app>