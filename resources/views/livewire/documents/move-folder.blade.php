<li>
    <button type="button" data-bs-toggle="modal" data-bs-target="#moveToFolder" class="dropdown-item">
        <i class="fa-solid fa-pen-to-square"></i>
        &nbsp;Mover
    </button>

    @once
    @teleport('body')
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="moveToFolder" tabindex="-1" role="dialog" aria-labelledby="createNewFolder" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="mb-0">
                        <span class="cursor-pointer" wire:click="openFolder()">{{ Auth::user()->customer->company_name }}/</span>
                        @foreach($currentPath as $key => $path)
                        @if ($loop->last)
                        <span class="cursor-pointer" wire:click="openFolder({{ $key }})">{{ $path }}</span>
                        @else
                        <span class="cursor-pointer" wire:click="openFolder({{ $key }})">{{ $path }}/</span>
                        @endif
                        @endforeach
                    </h6>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close" wire:click="cancelar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-start">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($folders as $folder)
                                <tr wire:key="{{ $folder->id }}">
                                    <td>
                                        <div class="d-flex px-2 py-1 cursor-pointer" wire:click="openFolder({{ $folder->id }})">
                                            <div>
                                                <i class="fa-regular fa-folder me-3"></i>
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $folder->folder_name }}</h6>
                                                <p class="text-xs text-secondary mb-0">{{ $folder->description}}</p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal" wire:click="cancelar">Cancel</button>
                    <button type="submit" form="create-folder-form" class="btn bg-gradient-primary">Move here</button>
                </div>
            </div>
        </div>
    </div>
    @endteleport
    @endonce

</li>

@pushOnce('scripts')
<script>
    const moveFileModal = new bootstrap.Modal(document.getElementById('moveToFolder'));
    document.addEventListener('livewire:initialized', () => {
        @this.on('close-modal', (event) => {
            moveFileModal.hide();
        });
    });
</script>
@endPushOnce