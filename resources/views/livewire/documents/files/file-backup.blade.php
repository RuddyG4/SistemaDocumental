<x-app :$permissions>
    <div>
        <x-slot:title>
        Download - Upload - File
        </x-slot:title>
        <div class="card-header pb-0">
            <form role="form" method="POST" action="{{ route('documents.upload_backup') }}">
                @csrf
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-info w-100 mb-0" name="accion" value="1" >Realizar Copia</button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-success w-100 mb-0" name="accion" value="0">Restaurar Copia</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app>
