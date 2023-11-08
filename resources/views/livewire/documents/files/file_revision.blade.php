<x-app>
    <div>
        <x-slot:title>
            Documento Para Revisar
        </x-slot:title>
        <div class="card-header pb-0">
            @if(isset($id))
            <div class="row">
                <div class="col-md-2">
                    Docmuneto ID: {{ $id }}
                </div>
            </div>
            @endif
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <div class="row">
                    <div class="col-md-4">
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
                        <form action="{{route('documents.evaluar_file')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id_file" value="{{$file->id}}">
                            <label for="exampleFormControlTextarea1" class="form-label">Comentario</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="comentario" rows="3"></textarea>
                            <input type="radio" name="estado"  value="0" checked>
                            <label for="male">Aprobado</label>

                            <input type="radio" name="estado"  value="1">
                            <label for="female">FeedBack</label>
                            <div class="text-center mt-2">
                                <input type="submit" class="btn btn-sm bg-gradient-success w-100 mb-0" value="Enviar">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-8">
                        @if($extension == "pdf")
                        <embed src="{{ route('view.document_d',$file->id) }}" type="application/pdf" width="100%" height="630">
                        @endif
                        @if($extension != "pdf")
                        <iframe src="https://view.officeapps.live.com/op/embed.aspx?src={{ route('view.document_d',$id) }}" width="100%" height="630px" frameborder="0"> </iframe>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app>
