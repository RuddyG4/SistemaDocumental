<div class="col-xl-2 col-sm-3 text-end">
    <button type="button" class="btn btn-secondary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#createRole">
        <span class="btn-inner--icon"><i class="fa fa-plus"></i></span>
        <span class="btn-inner--text">&nbsp; New Role</span>
    </button>

    @once
    <div wire:ignore.self class="modal fade" id="createRole" tabindex="-1" role="dialog" aria-labelledby="createNewRole" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createNewRole">Create new role</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close" wire:click="cancel">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-start">
                    <form wire:submit="createRole" id="create-role-form">
                        <div class="row">
                            <div class="col">
                            <div class="form-group">
                                    <input type="text" wire:model="role_name" class="form-control" id="role_name" placeholder="Role name">
                                </div>
                                @error('role_name')
                                <span class="error" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" wire:model="description" class="form-control" id="permission_description" placeholder="Role description">
                                </div>
                                @error('description')
                                <span class="error" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal" wire:click="cancel">Cancel</button>
                    <button type="submit" form="create-role-form" class="btn bg-gradient-primary">Create role</button>
                </div>
            </div>
        </div>
    </div>
    @endonce
</div>

@push('scripts')
<script>
    const createRoleModal = new bootstrap.Modal(document.getElementById('createRole'));
    document.addEventListener('livewire:initialized', () => {
       @this.on('close-create-role-modal', (event) => {
           createRoleModal.hide();
       });
    });
</script>
@endpush