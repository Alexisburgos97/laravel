@component('components.main')

    @slot('title')
        Información del cliente
    @endslot

    <div class="row">
        <div class="col-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link active" id="v-pills-customer-tab" data-toggle="pill" data-target="#v-pills-customer" type="button" role="tab" aria-controls="v-pills-customer" aria-selected="true">Customer</button>
                <button class="nav-link" id="v-pills-device-tab" data-toggle="pill" data-target="#v-pills-device" type="button" role="tab" aria-controls="v-pills-device" aria-selected="false">Devices</button>
                <button class="nav-link" id="v-pills-technician-tab" data-toggle="pill" data-target="#v-pills-technician" type="button" role="tab" aria-controls="v-pills-technician" aria-selected="false">Attended by</button>
            </div>
        </div>
        <div class="col-9">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-customer" role="tabpanel" aria-labelledby="v-pills-customer-tab">
                    <table class="table table-bordered table-hover">
                        <tbody>
                            <tr>
                                <th>Nombre</th>
                                <td>{{$customer->name}}</td>
                            </tr>
                            <tr>
                                <th>Apellido</th>
                                <td>{{$customer->last_name}}</td>
                            </tr>
                            <tr>
                                <th>Número de identificación</th>
                                <td>{{ $customer->id_number }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $customer->email }}</td>
                            </tr>
                            <tr>
                                <th>Dirección del cliente</th>
                                <td>{{ !empty($customer->address) ? $customer->address : '-' }}</td>
                            </tr>
                            <tr>
                                <th>Teléfono del cliente</th>
                                <td>{{ !empty($customer->phone) ? $customer->phone : '-' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="v-pills-device" role="tabpanel" aria-labelledby="v-pills-device-tab">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <th>Decripción</th>
                            <th>Estado</th>
                            <th>Tipo de mantenimientos</th>
                        </thead>
                        <tbody>
                            @foreach($customer->devices as $device)
                                <tr>
                                    <th>{{$device->description}}</th>
                                    <td><span class="badge badge-pill badge-{{config('status.'.$device->status)}}">{{$device->status}}</td>
                                    <td>
                                        <ul>
                                            @foreach( $device->maintenances as $maintenance)
                                                <li>{{$maintenance->name}}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="v-pills-technician" role="tabpanel" aria-labelledby="v-pills-technician-tab">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Email</th>
                        </thead>
                        <tbody>
                            @foreach($customer->devices as $device)
                                <tr>
                                    <td>{{$device->user->name}}</td>
                                    <td>{{$device->user->last_name}}</td>
                                    <td>{{$device->user->email}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <a href="{{ route('customers.index') }}" class="btn btn-secondary" ><i class="fas fa-undo"></i> Regresar</a>

@endcomponent
