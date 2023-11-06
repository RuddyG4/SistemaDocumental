<div>
    <div class="card-header pb-0">
        <div class="row">
            <div class="col-xl-8 col-sm-6 d-flex align-items-center">
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
            </div>
            <div class="col-xl-2 col-sm-3 text-end">
                <livewire:documents.create-folder :$currentFolderID />
            </div>
            <div class="col-xl-2 col-sm-3 text-end">
                <livewire:documents.upload-file :$currentFolderID />
            </div>
        </div>
    </div>

    <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Owner</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Last modified</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Size</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
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
                        <td>
                            <p class="text-xs font-weight-bold mb-0">{{ $folder->user->username }}</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <span class="text-secondary text-xs font-weight-bold">{{ $folder->updated_at }}</span>
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold"> --- </span>
                        </td>
                        <td class="align-middle dropstart">
                            <button type="button" class="btn btn-link text-secondary mb-0" aria-haspopup="true" id="dropdownMenuFolderButton{{ $folder->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-ellipsis-v text-xs"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuFolderButton{{ $folder->id }}">
                                <li><button type="button" wire:click="editFolder( {{ $folder->id }} )" data-bs-toggle="modal" data-bs-target="#editFolderModal" class="dropdown-item"><i class="fa-solid fa-pen-to-square"></i> &nbsp;Editar</button></li>
                                <li><button type="button" wire:click="downloadFolder( {{ $folder->id }} )" class="dropdown-item"><i class="fa-solid fa-download"></i> &nbsp;Descargar</button></li>
                            </ul>
                        </td>
                    </tr>
                    @endforeach

                    @foreach($files as $file)
                    <tr wire:key="{{ $file->id }}">
                        <td>
                            <div class="d-flex px-2 py-1 cursor-pointer">
                                <div>
                                    <i class="fa-solid fa-file me-3"></i>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{ $file->file_name }}</h6>
                                    <p class="text-xs text-secondary mb-0">{{ $file->description}}</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0">{{-- file->user->username --}}Propietario</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <span class="text-secondary text-xs font-weight-bold">{{ $file->updated_at }}</span>
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold"> --- </span>
                        </td>
                        <td class="align-middle dropstart">
                            <button type="button" class="btn btn-link text-secondary mb-0" aria-haspopup="true" id="dropdownMenuFileButton{{ $file->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-ellipsis-v text-xs"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuFileButton{{ $file->id }}">
                                <!-- TODO: hacer que de el boton de esta lista  -->
                                <li><button type="button" class="dropdown-item"><i class="fa-solid fa-pen-to-square"></i> &nbsp;Editar</button></li>
                                <livewire:documents.move-folder :fileID="$file->id" :key="$file->id" />
                                <li><button type="button" wire:click="downloadFile({{ $file->id }})" class="dropdown-item"><i class="fa-solid fa-download"></i> &nbsp;Descargar</button></li>
                                <li><a type="button" href="{{route('view.document',$file->id)}}" class="dropdown-item"><i class="fa-solid fa-eye"></i> &nbsp;Ver</a></li>
                                <li><a type="button" href="{{route('documents.show_history_versions',$file->id)}}" class="dropdown-item"><i class="fa-solid fa-code-merge"></i> &nbsp;History Versions</a></li>
                                <li><a type="button" href="{{route('documents.add_revisors',$file->id)}}" class="dropdown-item"><i class="fa-solid fa-users"></i> &nbsp;Add Revisores</a></li>
                                <form action="{{route('documents.delete_document',$file->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <li><button type="submit" class="dropdown-item"><i class="fa-solid fa-trash-can"></i>&nbsp;Eliminar</button></li>
                                </form>
                            </ul>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="editFolderModal" tabindex="-1" role="dialog" aria-labelledby="editFolder" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editFolder">Edit folder</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close" wire:click="cancel">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-start">
                    <form wire:submit="updateFolder" id="edit-folder-form">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" wire:model="folder_name" class="form-control" id="folder_name" placeholder="Folder name">
                                </div>

                                @error('folder_name')
                                <span class="error" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" wire:model="description" class="form-control" id="folder_description" placeholder="Folder description">
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
                    <button type="submit" form="edit-folder-form" class="btn bg-gradient-primary">Update folder</button>
                </div>
            </div>
        </div>
    </div>

</div>

@push('scripts')
<script>
    const editFolderModal = new bootstrap.Modal(document.getElementById('editFolderModal'));
    document.addEventListener('livewire:initialized', () => {
       @this.on('folder-updated', (event) => {
           editFolderModal.hide();
       });
    });
</script>
@endpush
