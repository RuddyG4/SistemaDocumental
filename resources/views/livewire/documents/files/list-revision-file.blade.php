<x-app>
    <div>
        <x-slot:title>
            Revison Files
        </x-slot:title>

        <div class="card-header pb-0">
            <h6>algun titulo</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Owner</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Last modified</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Size</th>
                                    <th class="text-secondary opacity-7">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($revisors_files as $file)
                                <tr wire:key="{{ $file->file->id }}">
                                    <td>
                                        <div class="d-flex px-2 py-1 cursor-pointer">
                                            <div>
                                                <i class="fa-solid fa-file me-3"></i>
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $file->file->file_name }}</h6>
                                                <p class="text-xs text-secondary mb-0">{{ $file->file->description}}</p>
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
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuFileButton{{ $file->file->id }}">
                                            <li><button type="button" wire:click="downloadFile({{ $file->file->id }})" class="dropdown-item"><i class="fa-solid fa-download"></i> &nbsp;Descargar</button></li>
                                            <li><a type="button" href="{{route('documents.show_files_revision',$file->file->id)}}" class="dropdown-item"><i class="fa-solid fa-eye"></i> &nbsp;Ver</a></li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>
