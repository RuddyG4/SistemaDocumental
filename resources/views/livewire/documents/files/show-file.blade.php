<x-app>
    <div>
        <x-slot:title>
            Documento Pre-Visualizacion
        </x-slot:title>

        <div class="card-header pb-0">
            @if(isset($id))
            <div class="row">
                <div class="col-md-2">
                    Docmuneto ID: {{ $id }}
                </div>
                <div class="col-md-4">
                    <button type="button" onclick="madarARevision('{{$file->id}}')" class="btn btn-sm btn-secondary">Mandar a revision</button>
                </div>
            </div>
            @endif
        </div>

        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <!-- <span>{{Storage::url($rutaDocumento)}}</span> -->
                <div class="row">
                    <div class="col-md-2">
                        <span>Estado:</span>
                        @switch($file->estado_file_id)
                        @case(1)
                        <span class="badge bg-info">{{$file->estado_file->name}}</span>
                        @break
                        @case(2)
                        <span class="badge bg-warning">{{$file->estado_file->name}}</span>
                        @break
                        @default
                        <span class="badge bg-success">{{$file->estado_file->name}}</span>
                        @endswitch
                        @foreach($file->revisor_file as $revision)
                        @if($revision->estado_file_id == 1)
                        <div class="card">
                            <div class="card-header">
                                <span class="badge bg-danger">Pendientes {{$revision->user->username}}</span>
                                <p>{{$revision->updated_at}}</p>
                                <p>{{$revision->comentario}}</p>
                            </div>
                        </div>
                        @endif
                        @if($revision->estado_file_id == 3)
                        <div class="card">
                            <div class="card-header">
                                <span class="badge bg-success">Aprobado por {{$revision->user->username}}</span>
                                <p>{{$revision->updated_at}}</p>
                                <p>{{$revision->comentario}}</p>
                            </div>
                        </div>
                        @else
                        <div class="card">
                            <div class="card-header">
                                <span class="badge bg-info">Por abrobar {{$revision->user->username}}</span>
                            </div>
                        </div>
                        @endif

                        @endforeach
                    </div>
                    <div class="col-md-7">
                        @if($extension == "pdf")
                        <embed src="{{ route('view.document_d',$id) }}" type="application/pdf" width="100%" height="630">
                        @endif
                        @if($extension != "pdf")
                        <iframe src="https://view.officeapps.live.com/op/embed.aspx?src={{ route('view.document_d',$id) }}" width="100%" height="630px" frameborder="0"> </iframe>
                        @endif
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <form action="{{route('update.version_doc')}}" enctype='multipart/form-data' method="POST">
                                @csrf
                                <div class="card-header">
                                    <h6>Subir nueva version</h6>
                                    <div class="input-group">
                                        <input type="file" class="form-control" name="archivo" accept=".jpg,.docx,.pdf">
                                    </div>
                                    <input type="hidden" name="id_file_antiguo" value="{{$file->id}}">
                                    <div class="input-group">
                                        <input type="submit" class="form-control" value="Guardar">
                                    </div>
                                </div>
                            </form>
                            <div class="card-body">
                                @switch($extension)
                                @case("pdf")
                                <h5>{{$file->file_name}} <i class="fa-solid fa-file-pdf"></i></h5>
                                @break
                                @case("docx")
                                <h5>{{$file->file_name}} <i class="fa-solid fa-file-word"></i></h5>
                                @break
                                @default
                                <h4>Turno: No Seleccionado</h4>
                                @endswitch
                                <h6>Version: V.{{$file->version_history->version}}</h6>
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Version</th>
                                                <th class="text-secondary opacity-7"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($lista_archivos as $archivo)
                                            <tr>
                                                <td>{{$archivo->file_name}}</td>
                                                <td>V.{{$archivo->version_history->version}}</td>
                                                <td class="align-middle dropstart">
                                                    <button type="button" class="btn btn-link text-secondary mb-0" aria-haspopup="true" id="dropdownMenuFolderButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v text-xs"></i>
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuFolderButton">
                                                        <li><button type="button" onclick="ChangeViewDocument('{{$archivo->id}}')" class="dropdown-item"><i class="fa-solid fa-eye"></i> &nbsp;Ver</button></li>
                                                        <li><button type="button" class="dropdown-item"><i class="fa-solid fa-download"></i> &nbsp;Descargar</button></li>
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
            </div>
        </div>

    </div>
</x-app>

<script>
    function ChangeViewDocument(id) {
        const embed = document.querySelector('embed');
        let url = "{{ route('view.document_d','value') }}"
        url = url.replace('value', id);
        embed.src = url;
    }

    function madarARevision(revision_id) {
        let url_actualizar = "{{ route('documents.mandar_revision','value') }}"
        url_actualizar = url_actualizar.replace('value', revision_id);
        fetch(url_actualizar, {
                method: "GET",
            })
            .then((response) => {
                return response.json();
            })
            .then((data) => {
                if (data.success) {
                    location.reload();
                } else {
                    alert("Error al mandar a revision");
                }
            })
            .catch((error) => console.error(error));
    }
</script>
