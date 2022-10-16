{!! Form::model(request()->all(), ['route' => 'technicians.index', 'method' => 'GET']) !!}

<div class="row">

    {{ Form::label('tech_data', 'Dato del técnico', ['class' => 'control-label pr-2']) }}
    <div class="col col-md-3 text-center">
        {!!Form::text('tech_data', null, [
            'placeholder' => 'Ingrea el dato del técnico',
            'class' => 'form-control mr-sm-2' ] ) !!}
    </div>

    <div class="col col-md-3 text-center">
        <button type="submit" class="btn btn-primary mr-sm-2">
            <i class="fas fa-search"></i> Filtrar
        </button>
        <a href="{{route('technicians.index')}}" class="btn btn-dark mr-sm-2">
            <i class="fas fa-sync-alt"></i> Limpiar
        </a>
        <div class="col col-md-3 text-center mt-4">

        </div>
    </div>

    {!! Form::close() !!}

    <br>
