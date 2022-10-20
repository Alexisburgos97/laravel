
@component('components.main')

    @slot('title')
        Editar {{auth()->user()->name.' '.auth()->user()->last_name}}
    @endslot

    {!! Form::model( auth()->user(), ['route' => 'profile.update_personal_data', 'method' => 'put', 'files' => true] ) !!}

        <div class="form-group">
            {{ Form::label('name', 'Nombre', ['class' => 'control-label']) }}
            {!!Form::text('name', null, [
                'placeholder' => 'Ingrese el nombre',
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
                'placeholder' => 'Ingrese el apellido',
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
                'placeholder' => 'Ingrese el email',
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
            {{ Form::submit( 'Actualizar' , ['class' => 'btn btn-primary']) }}
            <a href="{{route('profile.index')}}" class="btn btn-secondary"><i class="fas fa-reply"></i> Regresar</a>
        </div>

    {!! Form::close() !!}

@endcomponent
