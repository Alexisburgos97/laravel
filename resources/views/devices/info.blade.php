@component('components.main')

    @slot('title')
        Información del dispositivo
    @endslot

    <div class="row">
        <div class="col-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link active" id="v-pills-device-tab" data-toggle="pill" data-target="#v-pills-device" type="button" role="tab" aria-controls="v-pills-device" aria-selected="true">Dispositivos</button>
                <button class="nav-link" id="v-pills-customer-tab" data-toggle="pill" data-target="#v-pills-customer" type="button" role="tab" aria-controls="v-pills-customer" aria-selected="false">Clientes</button>
                <button class="nav-link" id="v-pills-technician-tab" data-toggle="pill" data-target="#v-pills-technician" type="button" role="tab" aria-controls="v-pills-technician" aria-selected="false">Técnicos</button>
                <button class="nav-link" id="v-pills-maintenance-tab" data-toggle="pill" data-target="#v-pills-maintenance" type="button" role="tab" aria-controls="v-pills-maintenance" aria-selected="false">Sevicios</button>
            </div>
        </div>
        <div class="col-9">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-device" role="tabpanel" aria-labelledby="v-pills-device-tab">
                    <table class="table table-bordered table-hover">
                        <tbody>
                            <tr>
                                <th>Descripción</th>
                                <td>{{$device->description}}</td>
                            </tr>
                            <tr>
                                <th>Estado</th>
                                <td><span class="badge badge-pill badge-{{config('status.'.$device->status)}}">{{$device->status}}</td>
                            </tr>
                            <tr>
                                <th>Fecha de entrada</th>
                                <td>{{ $device->entry_date }}</td>
                            </tr>
                            <tr>
                                <th>Fecha de salida</th>
                                <td>{{ !empty($device->departure_date) ? $device->departure_date : '-' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="v-pills-customer" role="tabpanel" aria-labelledby="v-pills-customer-tab">
                    <table class="table table-bordered table-hover">
                        <tbody>
                            <tr>
                                <th>Nombre del cliente</th>
                                <td>{{$device->customer->name}}</td>
                            </tr>
                            <tr>
                                <th>Apellido del cliente</th>
                                <td>{{$device->customer->last_name}}</td>
                            </tr>
                            <tr>
                                <th>Número de identificación</th>
                                <td>{{$device->customer->id_number}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="v-pills-technician" role="tabpanel" aria-labelledby="v-pills-technician-tab">
                    <table class="table table-bordered table-hover">
                        <tbody>
                            @if( !empty($device->user) )
                                <tr>
                                    <th>Nombre del técnico</th>
                                    <td>{{$device->user->name}}</td>
                                </tr>
                                <tr>
                                    <th>Apellido del técnico</th>
                                    <td>{{$device->user->last_name}}</td>
                                </tr>
                            @else
                                <h5>No existe un técnico disponible</h5>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="v-pills-maintenance" role="tabpanel" aria-labelledby="v-pills-maintenance-tab">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Tipo de mantenimiento</th>
                                <th>Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if( !empty($device->maintenances) )
                                @foreach($device->maintenances as $maintenance)
                                    <tr>
                                        <th >{{$maintenance->id}}</th>
                                        <th >{{$maintenance->name}}</th>
                                        <th >{{$maintenance->price}}</th>
                                    </tr>
                                @endforeach
                            @else
                                <h5>No existe un mantenimiento disponible</h5>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <a href="{{ route('devices.index') }}" class="btn btn-secondary" ><i class="fas fa-undo"></i> Regresar</a>

@endcomponent
