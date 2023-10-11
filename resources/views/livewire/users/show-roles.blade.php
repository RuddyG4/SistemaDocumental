<div class="card mb-4">
    <div class="card-header pb-0">
        <div class="row">
            <div class="col-xl-8 col-sm-6 d-flex align-items-center">
                <h6 class="mb-0">
                    Roles and permissions
                </h6>
            </div>
            <div class="col-xl-2 col-sm-3 text-end">
                <button type="button" class="btn btn-secondary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#createFolder">
                    <span class="btn-inner--icon"><i class="fa fa-plus"></i></span>
                    <span class="btn-inner--text">&nbsp; New Role</span>
                </button>
            </div>
            <div class="col-xl-2 col-sm-3 text-end">
                <button type="button" class="btn btn-info btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#createPermission">
                    <span class="btn-inner--icon"><i class="fa fa-plus"></i></span>
                    <span class="btn-inner--text">&nbsp; New permission</span>
                </button>
            </div>
        </div>
    </div>
    <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rol name</th>
                        <th class="text-secondary opacity-7"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                    <tr wire:key="{{ $role->id }}">
                        <td>
                            <div class="d-flex px-2 py-1 cursor-pointer" wire:click="openFolder({{ $role->id }})">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{ $role->role_name }}</h6>
                                    <p class="text-xs text-secondary mb-0">Some role description, maybe.</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="createPermission" tabindex="-1" role="dialog" aria-labelledby="createNewPermission" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createNewPermission">Upload new file</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close" wire:click="cancel">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-start">
                    <form wire:submit="createPermission" id="upload-file-form">
                        <div class="row">
                            <div class="col">
                            <div class="form-group">
                                    <input type="text" wire:model="permission_name" class="form-control" id="permission_name" placeholder="Folder name">
                                </div>
                                @error('permission_name')
                                <span class="error" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" wire:model="description" class="form-control" id="permission_description" placeholder="Folder description">
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
                    <button type="submit" form="upload-file-form" class="btn bg-gradient-primary">Upload file</button>
                </div>
            </div>
        </div>
    </div>
</div>