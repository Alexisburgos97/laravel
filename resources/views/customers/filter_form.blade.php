{!! Form::model(request()->all(), ['route' => 'customers.index', 'method' => 'GET']) !!}

<div class="row">

    {{ Form::label('customer_data', 'Dato del cliente', ['class' => 'control-label pr-2']) }}
    <div class="col col-md-3 text-center">
        {!!Form::text('customer_data', null, [
            'placeholder' => 'Ingrese el id, Nombre o Apellido del cliente',
            'class' => 'form-control mr-sm-2' ] ) !!}
    </div>

    <div class="col col-md-3 text-center">
        <button type="submit" class="btn btn-primary mr-sm-2">
            <i class="fas fa-search"></i> Filtrar
        </button>
        <a href="{{route('customers.index')}}" class="btn btn-dark mr-sm-2">
            <i class="fas fa-sync-alt"></i> Limpiar
        </a>
        <div class="col col-md-3 text-center mt-4">

    </div>
</div>

{!! Form::close() !!}

<br>
