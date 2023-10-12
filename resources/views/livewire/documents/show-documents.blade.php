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
                        <th class="text-secondary opacity-7"></th>
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
                        <td class="align-middle">
                            <button class="btn btn-link text-secondary mb-0" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v text-xs"></i>
                            </button>
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
                        <td class="align-middle">
                            <button class="btn btn-link text-secondary mb-0" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v text-xs"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>