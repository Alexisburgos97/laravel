@inject('status', 'App\Services\Status')

@component('components.main')

    @slot('title')
        {{ __('general.devices') }}
        <a href="{{route('devices.create')}}" class="btn btn-secondary float-right"><i class="fas fa-plus"></i> Crear</a>
    @endslot

    @if( session()->has('message') )
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif

    @include('devices.filter_form')

    <div class="row">
        @forelse($devices as $device)
                <div class="col-md-4 col-device" id="target{{$device->id}}">
                    <div class="card device" >
                        <div class="card-body">
                            <h5 class="card-title">Cliente: {{$device->customer->name}}</h5>
                            <p class="card-text">{{$device->description}}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Estado: <span class="badge badge-pill badge-{{config('status.'.$device->status)}}">{{$device->status}}</span></li>
                        </ul>
                        <div class="card-footer">
                            <a href="{{ route('devices.show', [$device->id]) }}" class="btn btn-primary"><i class="fas fa-info-circle"></i> Ver más</a>
                            <a href="{{ route('devices.edit', [$device->id]) }}" class="btn btn-dark"><i class="fas fa-edit"></i> Editar</a>
                            <a href="{{ route('devices.destroy', [$device]) }}" @click="getElementData" data-id={{$device->id}} class="btn btn-danger" data-toggle="modal" data-target="#deleteRegister"><i class="fas fa-trash"></i> Eliminar</a>
                        </div>
                    </div>
                </div>
        @empty
            <h3>No hay dispositivos</h3>
        @endforelse
    </div>

    <section class="d-flex justify-content-center">
        {{$devices->appends(request()->only('status', 'entry_date_from', 'entry_date_to'))->links()}}
    </section>

@endcomponent
