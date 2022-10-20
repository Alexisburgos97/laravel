
@component('components.main')

    @slot('title')
        Editar mi contraseña
    @endslot

    {!! Form::model( auth()->user(), ['route' => 'profile.update_password', 'method' => 'put'] ) !!}

        <div class="form-group">
            {{ Form::label('current_password', 'Contraseña actual', ['class' => 'control-label']) }}
            {!!Form::password('current_password', [
                'placeholder' => 'Ingrese la contraseña actual',
                'class' => 'form-control '.( !empty($errors->first('current_password')) ? ' is-invalid ' : '' )]) !!}

            @error('current_password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            {{ Form::label('password', 'Nueva Contraseña', ['class' => 'control-label']) }}
            {!!Form::password('password', [
                'placeholder' => 'Ingrese la nueva contraseña',
                'class' => 'form-control '.( !empty($errors->first('password')) ? ' is-invalid ' : '' )]) !!}

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            {{ Form::label('password_confirmation', 'Confirmar nueva Contraseña', ['class' => 'control-label']) }}
            {!!Form::password('password_confirmation', [
                'placeholder' => 'Confirme la nueva contraseña',
                'class' => 'form-control '.( !empty($errors->first('password_confirmation')) ? ' is-invalid ' : '' )]) !!}

            @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
                {{ Form::submit( 'Actualizar' , ['class' => 'btn btn-primary']) }}
                <a href="{{route('profile.index')}}" class="btn btn-secondary"><i class="fas fa-reply"></i> Regresar</a>
            </div>

    {!! Form::close() !!}

@endcomponent
