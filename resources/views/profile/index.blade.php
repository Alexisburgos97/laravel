@component('components.main')

    @slot('title')
        Mis datos
    @endslot

    <div class="row">
        <div class="col-12">
            <div class="table-responsive" >
                <table class="table table-bordered table-hover">
                    <tbody>
                        <tr>
                            <th>Nombre</th>
                            <td>{{auth()->user()->name}}</td>
                        </tr>
                        <tr>
                            <th>Apellido</th>
                            <td>{{auth()->user()->last_name}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{auth()->user()->email}}</td>
                        </tr>
                        <tr>
                            <th>Avatar</th>
                            <td>
                                @if(auth()->user()->avatar == 'default')
                                    <img src="{{ asset('/storage/avatar.png') }}" class="img-thumbnail" width="70" height="70" alt="Avatar por defecto">
                                @else
                                    <img src="{{ asset('/storage/avatars/'.auth()->user()->avatar) }}" class="img-thumbnail" width="70" height="70" alt="Avatar de {{auth()->user()->name}}">
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <br />

    <a href="{{ url('/') }}" class="btn btn-secondary" ><i class="fas fa-undo"></i> Ir al inicio</a>
    <a href="{{ route('profile.edit_personal_data') }}" class="btn btn-primary" ><i class="fas fa-edit"></i> Editar Datos</a>
    <a href="{{ route('profile.edit_password') }}" class="btn btn-warning" ><i class="fas fa-lock"></i> Editar Contraseña</a>

@endcomponent
