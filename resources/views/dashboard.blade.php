@extends('home')

@section('home-content')
@php ($view = 'dashboard')

<div class="content dash">
    <div class="card dashboard">
        <div class="card__header">
            <div class="card__header__title">
                <p class="name normal">Licencias próximas a expirar</p>

                <p class="date">{{ $todayDate }}</p>
            </div>
        </div>

        <div class="card__content">
            <p class="title" onclick="displayItem(this)">En una semana <i class="fas fa-chevron-down"></i></p>

            <div class="card__item">
                @foreach ($licensesWeek as $license)
                    <div class="content__item">
                        <div>
                            <p>{{ $license->client->name }}</p>
        
                            <p class="system">{{ $license->system->name }}</p>
                        </div>

                        <p class="date">{{ $license->get_due_date }}</p>
                    </div>
                @endforeach
            </div>

            <p class="title" onclick="displayItem(this)">En un mes <i class="fas fa-chevron-up"></i></p>

            <div class="card__item hidden">
                @foreach ($licensesMonth as $license)
                    <div class="content__item">
                        <div>
                            <p>{{ $license->client->name }}</p>
        
                            <p class="system">{{ $license->system->name }}</p>
                        </div>

                        <p class="date">{{ $license->get_due_date }}</p>
                    </div>
                @endforeach
            </div>

            <p class="title" onclick="displayItem(this)">Recién expirados <i class="fas fa-chevron-down"></i></p>

            <div class="card__item">
                @foreach ($licensesExpired as $license)
                    <div class="content__item">
                        <div>
                            <p>{{ $license->client->name }}</p>
        
                            <p class="system">{{ $license->system->name }}</p>
                        </div>

                        <span class="status @if($license->status == 'activo') active-status @elseif($license->status == 'expirado') expired-status @else inactive-status @endif status-index">{{ $license->status }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="card dashboard">
        <div class="card__header">
            <div class="card__header__title">
                <p class="name normal">Servicios a entregar</p>

                <p class="date">{{ $todayDate }}</p>
            </div>
        </div>

        <div class="card__content">
            <p class="title" onclick="displayItem(this)">En una semana <i class="fas fa-chevron-down"></i></p>

            <div class="card__item">
                @foreach ($servicesWeek as $service)
                    <div class="content__item">
                        <div>
                            <p>{{ $service->owner }}</p>
        
                            <p class="system">{{ substr($service->description, 0, 40) }}...</p>
                        </div>

                        <p class="date">{{ $service->get_delivery_date }}</p>
                    </div>
                @endforeach
            </div>

            <p class="title" onclick="displayItem(this)">En un mes <i class="fas fa-chevron-up"></i></p>

            <div class="card__item hidden">
                @foreach ($servicesMonth as $services)
                    <div class="content__item">
                        <div>
                            <p>{{ $services->owner }}</p>
        
                            <p class="system">{{ $services->get_description }}</p>
                        </div>

                        <p class="date">{{ $services->get_delivery_date }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection