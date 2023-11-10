<style>
    #miDiv {
        display: none;
    }
</style>
<x-app :$permissions>
    <div>
        <x-slot:title>
            Add Revisors
        </x-slot:title>

        <div class="card-header pb-0">
            <form action="">
                <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}" />
                <div class="row">
                    <div class="col-md-4">
                        <select class="form-control" id="revisor" name="revisor" required>
                            <option value="0" selected>Seleccione Revisores</option>
                            @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->username}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center">
                            <button type="button" onclick="agregarRevisor()" class="btn bg-gradient-info w-100 mb-0">Agregar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table p-0">
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div id="miDiv" class="col-md-4 mt-4">

                        <table class="table align-items-center mb-0" id="tablaDatos">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">nombre</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">email</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <div class="text-center">
                            <button type="button" onclick="guardarRevisores()" class="btn bg-gradient-success w-100 mb-0">Mandar a Revision</button>
                        </div>
                    </div>
                    <div class="col-md-4">

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>
<script>
    let revisores = [];
    let documento_id = '{{$id}}';
    const csrfToken = document.getElementById("token").value;
    $(document).ready(function() {
        $("#revisor")
            .select2({
                placeholder: "Seleccione una opcion",
            })
            .on("select2:open", function(e) {
                document.querySelector('.select2-search__field').focus();
            })
    });

    function agregarRevisor() {
        let revisor = document.getElementById("revisor").value;
        let tabla = $("#tablaDatos tbody");
        let url = "{{ route('users.get_user_by_id','value') }}"
        url = url.replace('value', revisor);

        fetch(url, {
                method: "GET",
            })
            .then((response) => {
                return response.json();
            })
            .then((data) => {
                revisores.push(data);
                if (revisores.length == 1) {
                    $("#miDiv").css("display", "block");
                }
                tabla.empty();
                revisores.forEach(function(objeto) {
                    tabla.append("<tr><td>" + objeto.username + "</td><td>" +
                        objeto.email + "</td></tr>");
                });

            })
            .catch((error) => console.error(error));
    }

    function guardarRevisores() {
        let ruta_guardar_revisores = "{{ route('documents.store_revisores') }}"
        fetch(ruta_guardar_revisores, {
                method: "POST",
                body: JSON.stringify({
                    document_id: documento_id,
                    revisores: revisores,
                }),
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-Token": csrfToken,
                },
            })
            .then((response) => {
                return response.json();
            })
            .then((data) => {
                console.log(data);
                if (data.success) {
                    window.location.href = "{{ route('documents.index') }}";
                } else if (data.success == false) {
                    alert("Error al guardar los revisores");
                }
            })
            .catch((error) => console.error(error));
    }
</script>
