@extends('theme.backoffice.layouts.admin')

@section('title', 'Mostrar rol')

@section('head')
@endsection

@section('breadcrumbs')
    <li><a href="{{ route('backoffice.role.index') }}">Roles del sistema</a></li>
    <li>{{ $role->name }}</li>
@endsection

@section('content')
    <div class="section">
        <p class="caption"><strong>Rol:</strong> {{ $role->name }}</p>
        <div class="divider"></div>
        <div id="basic-form" class="section">
            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <div class="card-panel">
                        <h4 class="header2">Usuarios con el rol de {{ $role->name }}</h4>
                        <div class="row">
                            <p><strong>Slug:</strong> {{ $role->slug }}</p>
                            <p><strong>Descripción:</strong> {{ $role->description }}</p>
                            <div class="card-action">
                                <a href="{{ route('backoffice.role.edit', $role) }}">EDITAR</a>
                                <a href="#" style="color: red" onclick="enviar_formulario()">ELIMINAR</a>
                            </div>
                            {{-- <ul>
                                <li>Pedro Jesús</li>
                                <li>José Luis</li>
                                <li>Miguel Ángel</li>
                            </ul> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form method="post" action="{{ route('backoffice.role.destroy', $role) }}" name="delete_form">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
    </form>
@endsection

@section('foot')
    <script>
        function enviar_formulario(){
            Swal.fire({
                title: "¿Deseas eliminar este rol?",
                text: "Esta acción no se puede deshacer",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Si, continuar",
                cancelButtonText: "No, cancelar",
                closeOnCancel: false,
                closeOnConfirm: true
            }).then((result) => {
                if(result.value){
                    document.delete_form.submit();
                }else{
                    Swal.fire(
                        'Operación cancelada',
                        'Registro no eliminado',
                        'error'
                    );
                }
            });
            // document.delete_form.submit();
        }
    </script>
@endsection