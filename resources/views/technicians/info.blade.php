@inject('customers', 'App\Services\Customers')

@component('components.main')

    @slot('title')
        Información del técnico
    @endslot

    <div class="row">
        <div class="col-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link active" id="v-pills-tech-tab" data-toggle="pill" data-target="#v-pills-tech" type="button" role="tab" aria-controls="v-pills-tech" aria-selected="true">Técnico</button>
                <button class="nav-link" id="v-pills-devices-tab" data-toggle="pill" data-target="#v-pills-devices" type="button" role="tab" aria-controls="v-pills-devices" aria-selected="false">Dispositivos</button>
                <button class="nav-link" id="v-pills-customers-tab" data-toggle="pill" data-target="#v-pills-customers" type="button" role="tab" aria-controls="v-pills-customers" aria-selected="false">Clientes atendidos</button>
            </div>
        </div>
        <div class="col-9">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-tech" role="tabpanel" aria-labelledby="v-pills-tech-tab">
                    <table class="table table-bordered table-hover">
                        <tbody>
                            <tr>
                                <th>Nombre</th>
                                <td>{{$technician->name}}</td>
                            </tr>
                            <tr>
                                <th>Apellido</th>
                                <td>{{$technician->last_name}}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{$technician->email}}</td>
                            </tr>
                            <tr>
                                <th>Avatar</th>
                                <td>
                                    @if($technician->avatar == 'default')
                                        <img src="{{ asset('/storage/avatar.png') }}" class="img-thumbnail" width="50" height="50" alt="Avatar por defecto">
                                    @else
                                        <img src="{{ asset('/storage/avatars/'.$technician->avatar) }}" class="img-thumbnail" width="50" height="50" alt="Avatar de {{$technician->name}}">
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="v-pills-devices" role="tabpanel" aria-labelledby="v-pills-devices-tab">
                    <table class="table table-bordered table-hover">
                        <tbody>
                            @foreach($technician->devices as $device)
                                <tr>
                                    <th>Descripción</th>
                                    <td>{{$device->description}}</td>
                                </tr>
                                <tr>
                                    <th>Estado</th>
                                    <td><span class="badge badge-pill badge-{{config('status.'.$device->status)}}">{{$device->status}}</td>
                                </tr>
                                <tr>
                                    <th>Mantenimiento</th>
                                    <td>
                                        <ul>
                                            @foreach($device->maintenances as $maintenance)
                                               <li>{{$maintenance->name}}</li>
                                           @endforeach
                                        </ul>
                                    </td>
                                </tr>
                               @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="v-pills-customers" role="tabpanel" aria-labelledby="v-pills-customers-tab">
                    <table class="table table-bordered table-hover">
                        <tbody>
                            @foreach($customers->getCustomersFromDevice($technician) as $customer)
                                <tr>
                                    <th>Nombre</th>
                                    <td>{{$customer->name}}</td>
                                </tr>
                                <tr>
                                    <th>Apellido</th>
                                    <td>{{$customer->last_name}}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{$customer->email}}</td>
                                </tr>
                                <tr>
                                    <th>Ver más</th>
                                    <td><a href="{{ route('customers.show', $customer->id  ) }}">Ver cliente</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <br />

    <a href="{{ route('technicians.index') }}" class="btn btn-secondary" ><i class="fas fa-undo"></i> Regresar</a>

@endcomponent
