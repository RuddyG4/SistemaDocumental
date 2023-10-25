<x-app>
<div>
    <x-slot:title>
        Documento Pre-Visualizacion
    </x-slot:title>

    <div class="card-header pb-0">
        @if(isset($id))
        <div class="row">
            <div class="col-xl-8 col-sm-6 d-flex align-items-center">
                <h6 class="mb-0">
                    Docmuneto ID: {{ $id }}
                </h6>
            </div>
        </div>
        @endif
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <!-- <span>{{Storage::url($rutaDocumento)}}</span> -->
                <embed src="{{ $rutaDocumento }}" type="application/pdf" width="100%" height="500">
            </div>
        </div>
    </div>
</div>
</x-app>
