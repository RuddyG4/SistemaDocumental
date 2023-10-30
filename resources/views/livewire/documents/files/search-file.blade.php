<x-app>
    <div>
        <x-slot:title>
            Search Documents by
        </x-slot:title>

        <div class="card-header pb-0">
            <form role="form" method="POST" action="{{ route('search.document_search_by') }}">
                @csrf
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <!--  <label for="role_id">Buscar por: </label> -->
                        <select class="form-control" id="tipo_busqueda" name="tipo_busqueda" required>
                            <option value="0" selected>Nombre del Archivo</option>
                            <option value="1">Nombre del Contenido del Archivo</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <!-- <label for="role_id">Buscador</label> -->
                        <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="texto_a_buscar" placeholder="Type here...">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-info w-100 mb-0">Buscar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <div class="row">
                    <div class="col-md-12">
                        @if(count($resultados)>0)
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
                                @foreach($resultados as $file)
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
                                            <li><button type="button" class="dropdown-item"><i class="fa-solid fa-pen-to-square"></i> &nbsp;Editar</button></li>
                                            <li><button type="button" wire:click="downloadFile({{ $file->id }})" class="dropdown-item"><i class="fa-solid fa-download"></i> &nbsp;Descargar</button></li>
                                            <li><a type="button" href="{{route('view.document',$file->id)}}" class="dropdown-item"><i class="fa-solid fa-eye"></i> &nbsp;Ver</a></li>
                                            <li><a type="button" href="{{route('documents.show_history_versions',$file->id)}}" class="dropdown-item"><i class="fa-solid fa-code-merge"></i> &nbsp;History Versions</a></li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <div class="container align-items-center mb-0">
                            <img src="{{ asset('assets/img/empty-state.jpg') }}" alt="" style="  object-fit: cover;
                                                                                                            width:100%;
                                                                                                            height:100%;
                                                                                                            opacity: 0.5;">
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>
