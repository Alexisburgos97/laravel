
@component('components.main')

    @slot('title')
        {{ !empty($technicians) ? 'Editar ': 'Crear ' }} Técnico
    @endslot

    @if( !empty($technicians) )
        {!! Form::model($technicians, ['route' => ['technicians.update', $technicians->id], 'method' => 'put', 'files' => true]) !!}
    @else
        {!! Form::open(['route' => 'technicians.store', 'method' => 'post', 'files' => true]) !!}
    @endif

            <div class="form-group">
                {{ Form::label('name', 'Nombre', ['class' => 'control-label']) }}
                {!!Form::text('name', null, [
                    'placeholder' => 'Ingrese el nombre del técnico',
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
                    'placeholder' => 'Ingrese el apellido del técnico',
                    'class' => 'form-control '.( !empty($errors->first('last_name')) ? ' is-invalid ' : '' )]) !!}

                @error('last_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                {{ Form::label('email', 'Email', ['class' => 'control-label']) }}
                {!!Form::text('email', null, [
                    'placeholder' => 'Ingrese el email del técnico',
                    'class' => 'form-control '.( !empty($errors->first('email')) ? ' is-invalid ' : '' )]) !!}

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                {{ Form::label('avatar_label', 'Avatar') }}
                <div class="custom-file">
                    {!! Form::file('avatar', ['id' => 'avatar','class' => 'custom-file-input '.( (!empty($errors->first('avatar')) || session()->has('file_error')) ? 'is-invalid' : '')]) !!}
                    {!! Form::label('avatar', 'Elige un archivo (jpg, jpeg, png, gif)', ['class' => 'custom-file-label']) !!}
                </div>
                @error('avatar')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                @if(session()->has('file_error'))
                    <span class="invalid" style="color: #e3342f" role="alert">
                        <strong>{{ session('file_error') }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                {{ Form::label('password', 'Contraseña', ['class' => 'control-label']) }}
                {!!Form::password('password', [
                    'placeholder' => 'Ingrese una contraseña',
                    'class' => 'form-control '.( !empty($errors->first('password')) ? ' is-invalid ' : '' )]) !!}

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                {{ Form::label('password_confirmation', 'Contraseña', ['class' => 'control-label']) }}
                {!!Form::password('password_confirmation', [
                    'placeholder' => 'Confirme la contraseña',
                    'class' => 'form-control '.( !empty($errors->first('password_confirmation')) ? ' is-invalid ' : '' )]) !!}

                @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                {{ Form::submit( !empty($technicians) ? 'Actualizar' : 'Crear ' , ['class' => 'btn btn-primary']) }}
                <a href="{{route('technicians.index')}}" class="btn btn-secondary"><i class="fas fa-reply"></i> Ir al listado</a>
            </div>

        {!! Form::close() !!}

@endcomponent
