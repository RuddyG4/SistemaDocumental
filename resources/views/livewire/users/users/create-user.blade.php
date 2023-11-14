<div class="col-xl-2 col-sm-3 text-end">
    <button type="button" class="btn btn-secondary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#createUser">
        <span class="btn-inner--icon"><i class="fa fa-plus"></i></span>
        <span class="btn-inner--text">&nbsp; New user</span>
    </button>

    @once
    <div wire:ignore.self class="modal fade" id="createUser" tabindex="-1" role="dialog" aria-labelledby="createNewUser" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createNewUser">Create New User</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close" wire:click="cancel">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-start">
                    <form wire:submit="createUser" id="create-user-form">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="user_username">Username</label>
                                    <input type="text" wire:model="username" class="form-control" id="user_username_create" placeholder="Username">
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
                                    <input type="email" wire:model="email" class="form-control" id="user_email_create" placeholder="example@example.com">
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
                                    <select class="form-control" wire:model="role_id" id="role_id_create">
                                        <option value="">-- select a role --</option>
                                        @foreach ($this->getRoles() as $role)
                                        <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('role_id')
                                <span class="error" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Password</label>
                                    <div class="text-info">
                                        <small>Nota: la contraseña por defecto es "password"</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal" wire:click="cancel">Cancel</button>
                    <button type="submit" form="create-user-form" class="btn bg-gradient-primary" wire:loading.attr="disabled">
                        <span wire:loading class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Create user
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endonce
</div>

@push('scripts')
<script>
    const createUserModal = new bootstrap.Modal(document.getElementById('createUser'));
    document.addEventListener('livewire:initialized', () => {
        @this.on('user-created', (event) => {
            createUserModal.hide();
        });
    });
</script>
@endpush