@component('components.main')

    @slot('title')
        Tipos de mantenimientos
        @can('check-admin')
            <a href="{{route('maintenances.create')}}" class="btn btn-secondary float-right"><i class="fas fa-plus"></i>
                Crear</a>
        @endcan
    @endslot

    @include('maintenances.filter_form')

    <div class="table-responsive">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th class="text-center">Tipo</th>
                <th class="text-center">Precio</th>
                @can('check-admin')
                    <th class="text-center">Acciones</th>
                @endcan
            </tr>
            </thead>
            <tbody>
            @forelse($maintenances as $maintenance)
                <tr id="target{{$maintenance->id}}">
                    <th class="text-center">{{$maintenance->name}}</th>
                    <td class="text-center">{{$maintenance->price}}</td>
                    @can('check-admin')
                        <td class="text-center">
                            <a href="{{ route('maintenances.edit', [$maintenance->id]) }}" class="btn btn-outline-dark"><i class="fas fa-edit"></i> Editar</a>
                            <a href="{{ route('maintenances.destroy', [$maintenance->id]) }}" @click="getElementData" data-id={{$maintenance->id}} class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteRegister"><i class="fas fa-trash"></i> Eliminar</a>
                        </td>
                    @endcan
                </tr>
            @empty
                <h3>No existen mantenimientos</h3>
            @endforelse

            </tbody>
        </table>
    </div>

    <section class="d-flex justify-content-center w-100">
        {{--        {{ $customers->links()}} --}}
        {{ $maintenances->appends(request()->only('maintenance_name'))->links() }}
    </section>

@endcomponent
