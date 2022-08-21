@component('components.main')

    @slot('title')
        {{ __('general.devices') }}
        <a href="{{route('dispositivos.create')}}" class="btn btn-secondary float-right"><i class="fas fa-plus"></i> Crear</a>
    @endslot

    @if( session()->has('message') )
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <div class="row">
        @forelse($devices as $device)
                <div class="col-md-4 col-device" id="device{{$device->id}}">
                    <div class="card device" >
                        <div class="card-body">
                            <h5 class="card-title">Cliente: {{$device->customer->name}}</h5>
                            <p class="card-text">{{$device->description}}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Estado: {{$device->status}}</li>
                        </ul>
                        <div class="card-footer">
                            <a href="{{ route('dispositivos.show', [$device->id]) }}" class="btn btn-primary"><i class="fas fa-info-circle"></i> Ver más</a>
                            <a href="{{ route('dispositivos.edit', [$device->id]) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</a>
                            <a href="#" @click="getRoute" data-id={{$device->id}} class="btn btn-danger" data-toggle="modal" data-target="#deleteDispositivo"><i class="fas fa-trash"></i> Eliminar</a>
                        </div>
                    </div>
                </div>
        @empty
            <h3>No hay dispositivos</h3>
        @endforelse
    </div>

    @include('partials.modal')

@endcomponent
