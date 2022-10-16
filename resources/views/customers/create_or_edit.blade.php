
@component('components.main')

    @slot('title')
        {{ !empty($customer) ? 'Editar ': 'Crear ' }} Cliente
    @endslot

    @if( !empty($customer) )
        {!! Form::model($customer, ['route' => ['customers.update', $customer->id], 'method' => 'put']) !!}
    @else
        {!! Form::open(['route' => 'customers.store', 'method' => 'post']) !!}
    @endif

            <div class="form-group">
                {{ Form::label('name', 'Nombre', ['class' => 'control-label']) }}
                {!!Form::text('name', null, [
                    'placeholder' => 'Ingrese el nombre del cliente',
                    'class' => 'form-control '.( !empty($errors->first('name')) ? ' is-invalid ' : '' )]) !!}

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                {{ Form::label('last_name', 'Apellido', ['class' => 'control-label']) }}
                {!!Form::text('last_name', null, [
                    'placeholder' => 'Ingrese el apellido del cliente',
                    'class' => 'form-control '.( !empty($errors->first('last_name')) ? ' is-invalid ' : '' )]) !!}

                @error('last_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                {{ Form::label('id_number', 'Número de identificación', ['class' => 'control-label']) }}
                {!!Form::text('id_number', null, [
                    'placeholder' => 'Ingrese el número de identificación',
                    'class' => 'form-control '.( !empty($errors->first('id_number')) ? ' is-invalid ' : '' )]) !!}

                @error('id_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                {{ Form::label('email', 'Email', ['class' => 'control-label']) }}
                {!!Form::email('email', null, [
                    'placeholder' => 'Ingrese un email',
                    'class' => 'form-control '.( !empty($errors->first('email')) ? ' is-invalid ' : '' )]) !!}

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                {{ Form::label('address', 'Dirección del cliente', ['class' => 'control-label']) }}
                {!!Form::text('address', null, [
                    'placeholder' => 'Ingrese la dirección del cliente',
                    'class' => 'form-control '.( !empty($errors->first('address')) ? ' is-invalid ' : '' )]) !!}

                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                {{ Form::label('phone', 'Teléfono', ['class' => 'control-label']) }}
                {!!Form::text('phone', null, [
                    'placeholder' => 'Ingrese un número de teléfono',
                    'class' => 'form-control '.( !empty($errors->first('phone')) ? ' is-invalid ' : '' )]) !!}

                @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                {{ Form::submit( !empty($customer) ? 'Actualizar' : 'Crear ' , ['class' => 'btn btn-primary']) }}
                <a href="{{route('devices.index')}}" class="btn btn-secondary"><i class="fas fa-reply"></i> Ir al listado</a>
            </div>

        {!! Form::close() !!}

@endcomponent
