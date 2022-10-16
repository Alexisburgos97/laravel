{!! Form::model(request()->all(), ['route' => 'maintenances.index', 'method' => 'GET']) !!}

<div class="row">

    {{ Form::label('customer_data', 'Nombre del mantenimiento', ['class' => 'control-label pr-2']) }}
    <div class="col col-md-3 text-center">
        {!!Form::text('maintenance_name', null, [
            'placeholder' => 'Ingrea el nombre del mantenimiento',
            'class' => 'form-control mr-sm-2' ] ) !!}
    </div>

    <div class="col col-md-3 text-center">
        <button type="submit" class="btn btn-primary mr-sm-2">
            <i class="fas fa-search"></i> Filtrar
        </button>
        <a href="{{route('maintenances.index')}}" class="btn btn-dark mr-sm-2">
            <i class="fas fa-sync-alt"></i> Limpiar
        </a>
        <div class="col col-md-3 text-center mt-4">

        </div>
    </div>

    {!! Form::close() !!}

    <br>
