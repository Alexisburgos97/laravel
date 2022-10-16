    {!! Form::model(request()->all(), ['route' => 'devices.index', 'method' => 'GET']) !!}

        <div class="row">

            <div class="col col-md-3">
                {{ Form::label('status', 'Estado del dispositivo', ['class' => 'control-label']) }}
                {!!Form::select('status', $status->get(), null, [
                    'placeholder' => 'Seleccione un Estado',
                    'class' => 'form-control mr-sm-2 ']) !!}
            </div>

            <div class="col col-md-3">
                {{ Form::label('entry_date_from', 'Desde: (Fecha entrada)', ['class' => 'control-label mr-sm-2']) }}
                {!!Form::date('entry_date_from', null, ['class' => 'form-control mr-sm-2 ']) !!}
            </div>

            <div class="col col-md-3">
                {{ Form::label('entry_date_to', 'Hasta: (Fecha entrada)', ['class' => 'control-label mr-sm-2']) }}
                {!!Form::date('entry_date_to', null, ['class' => 'form-control mr-sm-2 ']) !!}
            </div>

            <div class="col col-md-3 text-center mt-4">
                <button type="submit" class="btn btn-primary mr-sm-2">
                    <i class="fas fa-search"></i> Filtrar
                </button>
                <a href="{{route('devices.index')}}" class="btn btn-dark mr-sm-2">
                    <i class="fas fa-sync-alt"></i> Limpiar
                </a>
            </div>

        </div>

    {!! Form::close() !!}

<br>
