@extends('home')

@section('home-content')
@php ($view = 'licenses')

<div class="content justify-content-center flex-direction-column no-wrap">
    <a href="{{ route('licenses.index') }}" class="back">
        <i class="fas fa-arrow-left"></i>
    </a>

    <h1>Editar licencia</h1>

    @if (session('status'))
        <div class="success log" role="alert">
            <div class="close" onclick="closeAlert(this.parentNode)">
                <i class="fas fa-times"></i>
            </div>
            
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('licenses.update', $license) }}" method="post" class="form">
        <div class="form__field">
            <label for="client_id" class="radio__label">Cliente <span class="required">*</span></label>

            <select name="client_id" id="client_id" class="form__radio">
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}" @if($client->id == $license->client_id) selected @endif >{{ $client->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form__field">
            <label for="system_id" class="radio__label">Sistema <span class="required">*</span></label>

            <select name="system_id" id="system_id" class="form__radio">
                @foreach ($systems as $system)
                    <option value="{{ $system->id }}" @if($system->id == $license->system_id) selected @endif >{{ $system->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form__field">
            <label for="serial_number">Número de serie / Llave <span class="required">*</span></label>

            <input type="text" name="serial_number" required value="{{ old('serial_number', $license->serial_number) }}">
        </div>

        <div class="form__field">
            <label for="activation_date">Fecha de activación <span class="required">*</span></label>

            <input type="date" name="activation_date" required value="{{ old('activation_date', $license->get_activation_date_other) }}">
        </div>

        <div class="form__field">
            <label for="due_date">Fecha de expiración <span class="required">*</span></label>

            <input type="date" name="due_date" required value="{{ old('due_date', $license->get_due_date_other) }}">
        </div>

        <div class="form__field">
            <label for="observations">Observaciones</label>

            <textarea name="observations" cols="30" rows="10">{{ old('observations', $license->observations) }}</textarea>
        </div>

        <div class="form__submit">
            @csrf
            @method('PUT')

            <input type="submit" value="Modificar licencia" class="btn btn-primary">
        </div>
    </form>
</div>
@endsection