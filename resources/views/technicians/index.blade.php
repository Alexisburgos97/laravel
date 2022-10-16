@component('components.main')

    @slot('title')
        Listado de Técnicos
        <a href="{{route('technicians.create')}}" class="btn btn-secondary float-right"><i class="fas fa-plus"></i>
            Crear</a>
    @endslot

    @include('technicians.filter_form')

    <div class="table-responsive">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th class="text-center">Avatar</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Apellido</th>
                <th class="text-center">Email</th>
                <th class="text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>
                @forelse($technicians as $technician)
                    <tr id="target{{$technician->id}}">
                        <th class="text-center">
                            @if($technician->avatar == 'default')
                                <img src="{{ asset('/storage/avatar.png') }}" class="img-thumbnail" width="50" height="50" alt="Avatar por defecto">
                            @else
                                <img src="{{ asset('/storage/avatars/'.$technician->avatar) }}" class="img-thumbnail" width="50" height="50" alt="Avatar de {{$technician->name}}">
                            @endif
                        </th>
                        <th class="text-center">{{$technician->name}}</th>
                        <th class="text-center">{{$technician->last_name}}</th>
                        <td class="text-center">{{$technician->email}}</td>
                        <td class="text-center">
                            <a href="{{ route('technicians.show', [$technician->id]) }}" class="btn btn-outline-primary"><i class="fas fa-info-circle"></i> Ver más</a>
                            <a href="{{ route('technicians.edit', [$technician->id]) }}" class="btn btn-outline-dark"><i class="fas fa-edit"></i> Editar</a>
                            <a href="{{ route('technicians.destroy', [$technician->id]) }}" @click="getElementData" data-id={{$technician->id}} class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteRegister"><i class="fas fa-trash"></i> Eliminar</a>
                        </td>
                    </tr>
                @empty
                    <h3>No existen técnicos</h3>
                @endforelse

            </tbody>
        </table>
    </div>

    <section class="d-flex justify-content-center w-100">
        {{--        {{ $customers->links()}} --}}
        {{ $technicians->appends(request()->only('tech_data'))->links() }}
    </section>

@endcomponent
