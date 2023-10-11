<div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-secondary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#createFolder">
        <span class="btn-inner--icon"><i class="fa fa-plus"></i></span>
        <span class="btn-inner--text">&nbsp; New folder</span>
    </button>

    <!-- Modal -->
    <div class="modal fade" id="createFolder" tabindex="-1" role="dialog" aria-labelledby="createNewFolder" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createNewFolder">Create new folder</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close" wire:click="cancelar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-start">
                    <form wire:submit="createFolder" id="create-folder-form">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" wire:model="folder_name" class="form-control" id="folder_name" placeholder="Folder name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" wire:model="description" class="form-control" id="folder_description" placeholder="Folder description">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal" wire:click="cancelar">Cancel</button>
                    <button type="submit" form="create-folder-form" class="btn bg-gradient-primary">Create folder</button>
                </div>
            </div>
        </div>
    </div>

</div>
@push('scripts')
<script>
    const modal = new bootstrap.Modal(document.getElementById('createFolder'));
    document.addEventListener('livewire:initialized', () => {
       @this.on('close-modal', (event) => {
           modal.hide();
       });
    });
</script>
@endpush