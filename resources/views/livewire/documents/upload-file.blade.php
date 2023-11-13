<div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-info btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#uploadFile">
        <span class="btn-inner--icon"><i class="fa fa-plus"></i></span>
        <span class="btn-inner--text">&nbsp; Upload file</span>
    </button>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="uploadFile" tabindex="-1" role="dialog" aria-labelledby="uploadNewFile" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadNewFile">Upload new file</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close" wire:click="cancel">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-start">
                    <form wire:submit="uploadFile" id="upload-file-form">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="file" wire:model="file" class="form-control" id="file">
                                </div>
                                @error('file')
                                <span class="error" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal" wire:click="cancel">Cancel</button>
                    <button type="submit" form="upload-file-form" class="btn bg-gradient-primary"  wire.loading.attr="readonly" wire.loading.class="disable">
                        <span wire:loading class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Upload file
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    const uploadFileModal = new bootstrap.Modal(document.getElementById('uploadFile'));
    document.addEventListener('livewire:initialized', () => {
        @this.on('close-upload-file-modal', (event) => {
            uploadFileModal.hide();
        });
    });
</script>
@endpush