<x-app>
    <x-slot:title>
        Dashboard
    </x-slot:title>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Titulo</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <h6>Reviciones Pendientes</h6>
                            </div>
                            <div class="card-body">
                                @if($cantidad_pendientes_revision>0)
                                <h1><a href="{{route('documents.index_files_revision')}}">{{$cantidad_pendientes_revision}}</a></h1>
                                @else
                                <h1>{{$cantidad_pendientes_revision}}</h1>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <h4>title2</h4>
                            </div>
                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <h4>title3</h4>
                            </div>
                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <h4>title4</h4>
                            </div>
                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>
