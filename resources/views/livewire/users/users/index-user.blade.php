<div>
    <x-slot:title>
        Users
    </x-slot:title>

    <div class="card-header pb-0">
        <div class="row">
            <div class="col-xl-10 col-sm-6 d-flex align-items-center">
                <h6 class="mb-0">
                    Users
                </h6>
            </div>
            @if (in_array('users.create', $permissions))
            <livewire:users.users.create-user />
            @endif
        </div>
        @php
        $canEdit = in_array('users.modify', $permissions);
        $canShow = in_array('users.show', $permissions);
        @endphp

        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users = $this->loadUsers() as $user)
                        <tr wire:key="{{ $user->id }}">
                            <td>
                                <div class="d-flex px-2 py-1 cursor-pointer row-title" @if($canShow) data-bs-toggle="modal" data-bs-target="#showUser" wire:click="showUser({{ $user->id }})" @endif>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{ $user->username }}</h6>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{ $user->email }}</h6>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{ $user->role->role_name }}</h6>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    @if($users->hasPages())
                    <tfoot>
                        <tr>
                            <td>
                                {{ $users->links()}}
                            </td>
                        </tr>
                    </tfoot>
                    @endif
                </table>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="showUser" tabindex="-1" role="dialog" aria-labelledby="showUserModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showUserModal">Show user</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close" wire:click="cancel">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-start">
                    <form wire:submit="updateUser" id="show-user-form">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="user_username">Username</label>
                                    <input type="text" wire:model="username" class="form-control" id="user_username" placeholder="Username" {{ $canEdit ? '' : 'disabled'}}>
                                </div>
                                @error('username')
                                <span class="error" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="user_email">Email</label>
                                    <input type="email" wire:model="email" class="form-control" id="user_email" placeholder="example@example.com" {{ $canEdit ? '' : 'disabled'}}>
                                </div>
                                @error('email')
                                <span class="error" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="role_id">Role</label>
                                    <select class="form-control" wire:model="role_id" id="role_id" {{ $canEdit ? '' : 'disabled'}}>
                                        <option value="">-- select a role --</option>
                                        @foreach ($this->roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('role_id')
                                <span class="error" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    @if($canEdit)
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal" wire:click="cancel">Cancel</button>
                    <button type="submit" form="show-user-form" class="btn bg-gradient-primary">Update user</button>
                    @else
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>

@push('scripts')
<script>
    const showUserModal = new bootstrap.Modal(document.getElementById('showUser'));
    document.addEventListener('livewire:initialized', () => {
        @this.on('user-updated', (event) => {
            showUserModal.hide();
        });
    });
</script>
@endpush