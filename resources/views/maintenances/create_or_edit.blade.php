
@component('components.main')

    @slot('title')
        {{ !empty($maintenances) ? 'Editar ': 'Crear ' }} Mantenimiento
    @endslot

    @if( !empty($maintenances) )
        {!! Form::model($maintenances, ['route' => ['maintenances.update', $maintenances->id], 'method' => 'put']) !!}
    @else
        {!! Form::open(['route' => 'maintenances.store', 'method' => 'post']) !!}
    @endif

            <div class="form-group">
                {{ Form::label('name', 'Nombre', ['class' => 'control-label']) }}
                {!!Form::text('name', null, [
                    'placeholder' => 'Ingrese el nombre del tipo de mantenimiento',
                    'class' => 'form-control '.( !empty($errors->first('name')) ? ' is-invalid ' : '' )]) !!}

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                {{ Form::label('price', 'Precio', ['class' => 'control-label']) }}
                {!!Form::text('price', null, [
                    'placeholder' => 'Ingrese el precio del tipo de mantenimiento',
                    'class' => 'form-control '.( !empty($errors->first('price')) ? ' is-invalid ' : '' )]) !!}

                @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                {{ Form::submit( !empty($maintenances) ? 'Actualizar' : 'Crear ' , ['class' => 'btn btn-primary']) }}
                <a href="{{route('maintenances.index')}}" class="btn btn-secondary"><i class="fas fa-reply"></i> Ir al listado</a>
            </div>

        {!! Form::close() !!}

@endcomponent
