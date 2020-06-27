@extends('home')

@section('home-content')
@php ($view = 'users')

<div class="content justify-content-center flex-direction-column no-wrap">
    <a href="{{ route('users.index') }}" class="back">
        <i class="fas fa-arrow-left"></i>
    </a>

    <h1>Nuevo usuario</h1>

    @if (session('status'))
        <div class="success log" role="alert">
            <div class="close" onclick="closeAlert(this.parentNode)">
                <i class="fas fa-times"></i>
            </div>
            
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="post" class="form" enctype="multipart/form-data">
        <div class="form__field">
            <label for="name">Nombre <span class="required">*</span></label>

            <input type="text" name="name" required value="{{ old('name') }}">
        </div>

        <div class="form__field">
            <label for="email">Correo <span class="required">*</span></label>

            <input type="email" name="email" required value="{{ old('email') }}">
        </div>

        <div class="form__field">
            <label for="password">Contraseña <span class="required">*</span></label>

            <input type="password" name="password" required value="{{ old('password') }}">
        </div>

        <div class="form__field">
            <label class="radio__label">Rol de usuario <span class="required">*</span></label>

            <div class="form__radio">
                <label class="container">Administrador
                    <input type="radio" name="role" value="admin" checked>

                    <span class="checkradio"></span>
                </label>

                <label class="container">Trabajador
                    <input type="radio" name="role" value="worker">
                    
                    <span class="checkradio"></span>
                </label>
            </div>
        </div>

        <div class="form__button">
            <p>Imagen</p>

            <label for="image">
                <i class="fas fa-edit"></i>

                <input type="file" name="image" id="image" onchange="previewImage(this)">
            </label>

            <img src="https://ui-avatars.com/api/?name=N&background=758290&color=4F5B69&size=200" alt="">
        </div>

        <div class="form__submit">
            @csrf

            <input type="submit" value="Crear usuario" class="btn btn-primary">
        </div>
    </form>
</div>
@endsection