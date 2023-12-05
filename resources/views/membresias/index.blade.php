<style>
    .bodi {
        font-family: 'Arial', sans-serif;
        display: flex;
        justify-content: space-around;
        padding: 20px;
        background-color: #f4f4f4;
    }

    .card {
        max-width: 300px;
        background-color: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin: 20px;
    }

    .card-header {
        background-color: #3498db;
        color: #fff;
        padding: 15px;
        text-align: center;
        font-size: 18px;
        font-weight: bold;
    }

    .card-body {
        padding: 20px;
    }

    .price {
        font-size: 24px;
        font-weight: bold;
        color: #333;
    }

    .features {
        margin-top: 20px;
    }

    ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    li {
        margin-bottom: 8px;
    }

    span {
        font-size: 13px;
    }
</style>
<x-app :$permissions>
    <x-slot:title>
        Membresias
    </x-slot:title>

    <div class="row">
        <div class="col-12 bodi">
            <div class="card">
                <div class="card-header">Ilimitado</div>
                <div class="card-body">
                    <div class="price">$7/mes</div>
                    <div class="features">
                        <ul>
                            <li> <i class="fa-solid fa-check"></i>
                                <span>Todas las funciones del plan Free</span>
                            </li>
                            <li> <i class="fa-solid fa-check"></i>
                                <span>Almacenamiento ilimitado</span>
                            </li>
                            <li> <i class="fa-solid fa-check"></i>
                                <span>Espacios ilimitados</span>
                            </li>
                            <li> <i class="fa-solid fa-check"></i>
                                <span>Campos personalizados ilimitados</span>
                            </li>
                            <li> <i class="fa-solid fa-check"></i>
                                <span>Diagramas de Gantt ilimitados</span>
                            </li>
                            <li> <i class="fa-solid fa-check"></i>
                                <span>Documentos privados</span>
                            </li>
                            <li> <i class="fa-solid fa-check"></i>
                                <span>Compatible con IA</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('documents.payment', '7') }}" class="btn btn-info">Actualizar</a>
                </div>
            </div>

            <div class="card">
                <div class="card-header">Negocio</div>
                <div class="card-body">
                    <div class="price">$12/mes</div>
                    <div class="features">
                        <ul>
                            <li><i class="fa-solid fa-check"></i> <span> Todas las funciones del plan Ilimitado</span></li>
                            <li><i class="fa-solid fa-check"></i> <span> Vistas Cronograma ilimitadas</span></li>
                            <li><i class="fa-solid fa-check"></i> <span> Análisis de carga de trabajo ilimitados</span></li>
                            <li><i class="fa-solid fa-check"></i> <span> Pizarras ilimitadas</span></li>
                            <li><i class="fa-solid fa-check"></i> <span> Equipos ilimitados</span></li>
                            <li><i class="fa-solid fa-check"></i> <span> Hojas de horas</span></li>
                            <li><i class="fa-solid fa-check"></i> <span> Paneles ilimitados con widgets avanzados</span></li>
                            <li><i class="fa-solid fa-check"></i> <span> Inicio de sesión único (SSO) de Google</span></li>
                            <li><i class="fa-solid fa-check"></i> <span> Autenticación de dos factores mediante SMS</span></li>
                            <li><i class="fa-solid fa-check"></i> <span> Compatible con IA</span></li>
                        </ul>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('documents.payment', '12') }}" class="btn btn-info">Actualizar</a>
                </div>
            </div>

            <div class="card">
                <div class="card-header">Negocio Plus</div>
                <div class="card-body">
                    <div class="price">$19/mes</div>
                    <div class="features">
                        <ul>
                            <li><i class="fa-solid fa-check"></i> <span> Todas las funciones del plan Negocio</span></li>
                            <li><i class="fa-solid fa-check"></i> <span> Soporte prioritario</span></li>
                            <li><i class="fa-solid fa-check"></i> <span> Formación para administradores</span></li>
                            <li><i class="fa-solid fa-check"></i> <span> Formularios de marca personalizados</span></li>
                            <li><i class="fa-solid fa-check"></i> <span> Lógica condicional en formularios</span></li>
                            <li><i class="fa-solid fa-check"></i> <span> Adición de subtareas a listas ilimitadas</span></li>
                            <li><i class="fa-solid fa-check"></i> <span> Permisos personalizados (ACL)</span></li>
                            <li><i class="fa-solid fa-check"></i> <span> Uso compartido en equipos</span></li>
                            <li><i class="fa-solid fa-check"></i> <span> Planificación de capacidad avanzada</span></li>
                            <li><i class="fa-solid fa-check"></i> <span> Búsqueda universal</span></li>
                            <li><i class="fa-solid fa-check"></i> <span> Límite de API más alto</span></li>
                            <li><i class="fa-solid fa-check"></i> <span> Compatible con IA</span></li>
                        </ul>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('documents.payment', '19') }}" class="btn btn-info">Actualizar</a>
                </div>
            </div>
        </div>
    </div>

</x-app>
