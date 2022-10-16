@component('components.main')

    @slot('title')
        Listado de clientes
        <a href="{{route('customers.create')}}" class="btn btn-secondary float-right"><i class="fas fa-plus"></i> Crear</a>
    @endslot

    @include('customers.filter_form')

    <div class="table-responsive">
        <table class="table">
        <thead class="thead-dark">
            <tr>
                <th class="text-center">Número de identificación</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Apellido</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($customers as $customer)
                <tr id="target{{$customer->id}}">
                    <th class="text-center">{{$customer->id_number}}</th>
                    <td class="text-center">{{$customer->name}}</td>
                    <td class="text-center">{{$customer->last_name}}</td>
                    <td class="text-center">
                        <a href="{{ route('customers.show', [$customer->id]) }}" class="btn btn-outline-primary"><i class="fas fa-info-circle"></i> Ver más</a>
                        <a href="{{ route('customers.edit', [$customer->id]) }}" class="btn btn-outline-dark"><i class="fas fa-edit"></i> Editar</a>
                        <a href="{{ route('customers.destroy', [$customer]) }}" @click="getElementData" data-id={{$customer->id}} class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteRegister"><i class="fas fa-trash"></i> Eliminar</a>
                    </td>
                </tr>
            @empty
                <h3>No existen clientes</h3>
            @endforelse

        </tbody>
    </table>
    </div>

    <section class="d-flex justify-content-center w-100">
        {{--        {{ $customers->links()}} --}}
        {{ $customers->appends(request()->only('client_data'))->links() }}
    </section>

@endcomponent
