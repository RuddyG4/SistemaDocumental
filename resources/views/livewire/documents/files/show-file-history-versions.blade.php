<x-app>
    <div>
        <x-slot:title>
            Document History Versions
        </x-slot:title>

        <div class="card-header pb-0">
            @if(isset($id))
            <div class="row">
                <div class="col-xl-8 col-sm-6 d-flex align-items-center">
                    <h6 class="mb-0">
                        Historial de Versiones del Documento ID: {{ $id }}
                    </h6>
                </div>
            </div>
            @endif
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No Version</th>
                                    <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Modified</th>
                                    <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">modified By</th>
                                    <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Size</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lista_archivos as $archivo)
                                <tr>
                                    <td class="align-middle text-center">V.{{$archivo->version_history->version}}.0</td>
                                    <td class="align-middle text-center">{{$archivo->version_history->version_date}}</td>
                                    <td class="align-middle text-center">{{$archivo->version_history->name_user}}</td>
                                    <td class="align-middle text-center"> -- </td>
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
