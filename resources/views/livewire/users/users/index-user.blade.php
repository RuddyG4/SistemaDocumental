<div>
    <x-slot:title>
        Users
    </x-slot:title>

    <div class="card-header pb-0">
        <div class="row">
            <div class="col-xl-8 col-sm-6 d-flex align-items-center">
                <h6 class="mb-0">
                    Users
                </h6>
            </div>
            <livewire:users.create-role />
        </div>

        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr wire:key="{{ $user->id }}">
                            <td>
                                <div class="d-flex px-2 py-1 cursor-pointer" wire:click="">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{ $user->username }}</h6>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="d-flex px-2 py-1 cursor-pointer" wire:click="">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{ $user->email }}</h6>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>