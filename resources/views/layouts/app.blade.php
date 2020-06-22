<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Compudram | Sistema</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <script src="{{ asset('js/main.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animations.css') }}">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    @yield('style')

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Muli:wght@300;400;700&display=swap" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
        <!-- Navigation bar start -->
        <nav>
            <div class="nav__logo-container">
                <a href="{{ url('/') }}">
                    <svg id="Capa_1" data-name="Capa 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 390 50"
                        height="15px">
                        <title>compudram-completo</title>
                        <path
                            d="M469.7,282a27.27,27.27,0,0,0-9.65-1.39c-1,0-1.86,0-2.54.06q-4.8.24-8.61.24c-.67,0-1.76,0-3.25-.08l-1.76,0a7.06,7.06,0,0,0-3.53.73,2.26,2.26,0,0,0-1.27,2,2.45,2.45,0,0,0,1.84,2.38,2.61,2.61,0,0,1,1.62,1.2,8,8,0,0,1,.35,3q0,5.72-.17,11.5c-.12,3.85-.25,6.45-.39,7.78a6.31,6.31,0,0,1-.59,2.33,2.21,2.21,0,0,1-1.44.87,3.51,3.51,0,0,0-1.61.84,2,2,0,0,0-.49,1.45,2.55,2.55,0,0,0,1.12,2.16,4.7,4.7,0,0,0,2.9.83c.34,0,.95,0,1.82-.11,1.38-.1,2.64-.16,3.76-.16h1.92c1.63,0,3.53,0,5.68.11l2.77.08,3.23.11a21.46,21.46,0,0,0,6.82-1.07,16.39,16.39,0,0,0,8.54-6.29,18.86,18.86,0,0,0,2.37-5.24,21.43,21.43,0,0,0,.88-6A21.09,21.09,0,0,0,477.65,289,15.07,15.07,0,0,0,469.7,282Zm-11.25,30.45a3.31,3.31,0,0,1-2.4-.71,3.24,3.24,0,0,1-.72-2.38V288.74a2.32,2.32,0,0,1,.52-1.71,2.57,2.57,0,0,1,1.8-.5,7,7,0,0,1,6.77,4q1.81,3.6,1.81,10.13Q466.23,312.46,458.45,312.47Z"
                            transform="translate(-226.38 -280.34)" style="fill:#FFF" />
                        <path
                            d="M522.12,312.82a2.93,2.93,0,0,1-2.8-3.28,15.84,15.84,0,0,0-1.86-6.29,7.8,7.8,0,0,0-4.11-3.07c-.87-.32-1.31-.74-1.31-1.25s.29-.73.86-1a7.5,7.5,0,0,0,3.22-3,8.76,8.76,0,0,0,1.18-4.47,8.07,8.07,0,0,0-3.36-6.88,15.53,15.53,0,0,0-9.44-2.75c-.68,0-1.86.07-3.55.19q-4,.31-6.4.32c-1,0-1.66,0-2.11-.05-2.34-.18-3.81-.27-4.4-.27a13.53,13.53,0,0,0-3.14.29,4.57,4.57,0,0,0-2.12,1.08,2.32,2.32,0,0,0-.76,1.72,1.79,1.79,0,0,0,.4,1.22,4.89,4.89,0,0,0,1.57,1,3,3,0,0,1,1.6,1.95,22.15,22.15,0,0,1,.37,5q0,11.68-.13,13.57a13.74,13.74,0,0,1-.57,3.64,4,4,0,0,1-1.59,1.83,5.84,5.84,0,0,0-1.33,1.08,1.62,1.62,0,0,0-.29,1q0,3.74,9.86,3.74a26.74,26.74,0,0,0,7.53-.74c1.49-.48,2.23-1.32,2.23-2.49a2.62,2.62,0,0,0-1.6-2.32,3.93,3.93,0,0,1-1-.72,1.84,1.84,0,0,1-.4-.83,24.82,24.82,0,0,1-.43-5.27,8.66,8.66,0,0,1,.28-2.86c.19-.41.62-.61,1.29-.61a3.67,3.67,0,0,1,2.71,1.12,8.31,8.31,0,0,1,1.56,3.57,53.64,53.64,0,0,0,1.67,5.81,10.72,10.72,0,0,0,1.72,3.1q2.24,2.74,7.44,2.74a14.71,14.71,0,0,0,6.13-1,4.4,4.4,0,0,0,1.65-1.32,2.72,2.72,0,0,0,.64-1.66,2,2,0,0,0-.34-1.16A1.6,1.6,0,0,0,522.12,312.82Zm-19.33-17.24a4.32,4.32,0,0,1-3.41,1.21,1.49,1.49,0,0,1-1.14-.32,2.09,2.09,0,0,1-.28-1.28V295l.3-6.21a2.72,2.72,0,0,1,.48-1.71,1.87,1.87,0,0,1,1.46-.48q3.66,0,3.66,5.15A5.8,5.8,0,0,1,502.79,295.58Z"
                            transform="translate(-226.38 -280.34)" style="fill:#FFF" />
                        <path
                            d="M566.92,312.6a2.64,2.64,0,0,1-1.47-.62,7.72,7.72,0,0,1-1.2-2l-5-10.8q-6.51-13.89-9.92-16.77a7.77,7.77,0,0,0-5.14-2.11,6.3,6.3,0,0,0-4.7,1.87,4.09,4.09,0,0,0-1.13,1.74,14.18,14.18,0,0,0-.28,3.19,15.41,15.41,0,0,1-.73,4.41,62.82,62.82,0,0,1-2.79,6.79l-3.76,8.24a25.48,25.48,0,0,1-2.55,4.73,5.7,5.7,0,0,1-2.62,1.72,3.67,3.67,0,0,0-1.48.83,1.81,1.81,0,0,0-.42,1.28,2.36,2.36,0,0,0,1.87,2.45,24.91,24.91,0,0,0,6.35.59c5.06,0,7.6-1.06,7.6-3.18a1.94,1.94,0,0,0-1.63-1.92,6.4,6.4,0,0,1-1.48-.57.94.94,0,0,1-.23-.76,3.2,3.2,0,0,1,.32-1.33,2.27,2.27,0,0,1,.75-1c.46-.29,1.88-.43,4.24-.43a51.36,51.36,0,0,1,6.53.32c1.44.21,2.16.92,2.16,2.11,0,.67-.41,1.15-1.25,1.44a3.78,3.78,0,0,0-1.53.81A1.72,1.72,0,0,0,547,315a2.34,2.34,0,0,0,.79,1.77,4.07,4.07,0,0,0,2.12,1,58.13,58.13,0,0,0,8.93.5,24.58,24.58,0,0,0,7.68-.85c1.57-.57,2.35-1.5,2.35-2.8Q568.84,312.9,566.92,312.6Zm-21-10h-5.23c-.81,0-1.22-.22-1.22-.67a14.81,14.81,0,0,1,1.12-3.25c.44-1.1.7-1.73.77-1.89.43-1.2,1-1.79,1.6-1.79a1.37,1.37,0,0,1,1,.53,13.94,13.94,0,0,1,1.39,2.11q2,3.44,2,4.32C547.32,302.37,546.84,302.58,545.88,302.58Z"
                            transform="translate(-226.38 -280.34)" style="fill:#FFF" />
                        <path
                            d="M615.42,313.16a7.32,7.32,0,0,1-1.72-1.36,3.87,3.87,0,0,1-.49-1.7,96.8,96.8,0,0,1-.64-11.92,55.48,55.48,0,0,1,.61-9,4.19,4.19,0,0,1,1.55-2.69,5.12,5.12,0,0,0,1.2-1.14,2.35,2.35,0,0,0,.29-1.24q0-3.43-7.54-3.44c-2.87,0-4.84.39-5.92,1.15a9.17,9.17,0,0,0-2.59,3.55c-.14.28-.45.89-.91,1.84l-3.76,7.33a5.65,5.65,0,0,1-1,1.49,1.32,1.32,0,0,1-.95.4,1.24,1.24,0,0,1-1-.37,12.86,12.86,0,0,1-1.25-2.05l-5.55-10.22a10.9,10.9,0,0,0-1.14-1.86,2.58,2.58,0,0,0-1.1-.72,14.31,14.31,0,0,0-4.82-.56,26.16,26.16,0,0,0-3.32.25,21.49,21.49,0,0,0-3.14.6,3.83,3.83,0,0,0-1.87,1.09,2.46,2.46,0,0,0-.71,1.71c0,1,.63,1.74,1.89,2.35a5.66,5.66,0,0,1,1.16.69,2.2,2.2,0,0,1,.55.8,17.36,17.36,0,0,1,.66,5.89q0,3.46-.21,8.34t-.45,7a10.63,10.63,0,0,1-.52,2.7,2.25,2.25,0,0,1-1.19,1.09,8,8,0,0,0-1.72,1,1.48,1.48,0,0,0-.33,1.08q0,2.91,6.45,2.91,7.65,0,7.65-3a1.61,1.61,0,0,0-.88-1.57,10.4,10.4,0,0,1-1.66-1,1.85,1.85,0,0,1-.5-.86,17.77,17.77,0,0,1-.26-3.76c0-1.77.06-3.71.18-5.81.06-.94.37-1.41.94-1.41s1,.55,1.52,1.65l3.52,7.92q.69,1.58,1.74,3.6a18,18,0,0,0,1.35,2.35,1.35,1.35,0,0,0,1,.5,1.43,1.43,0,0,0,1.12-.62,12.72,12.72,0,0,0,1.33-2.44l3.2-7.18a34.45,34.45,0,0,1,2.08-4.09,1.87,1.87,0,0,1,1.44-1,.82.82,0,0,1,.84.66,11.8,11.8,0,0,1,.2,2.8,39.82,39.82,0,0,1-.25,5.44,3.41,3.41,0,0,1-1,2.16,12.19,12.19,0,0,0-1.65,1.51,1.66,1.66,0,0,0-.32,1.05c0,1.16.82,2,2.45,2.45a26,26,0,0,0,6.72.64c2,0,3.41,0,4.35-.13a12.35,12.35,0,0,0,2.69-.56c1.65-.51,2.48-1.39,2.48-2.64A2,2,0,0,0,615.42,313.16Z"
                            transform="translate(-226.38 -280.34)" style="fill:#FFF" />
                        <path
                            d="M237.45,316.36a21.29,21.29,0,0,0,8.88,2,18.79,18.79,0,0,0,8.21-1.89,12.23,12.23,0,0,1,2.69-1,5.68,5.68,0,0,0,2.32-.8,8.72,8.72,0,0,0,2.24-3,8,8,0,0,0,.94-3.47,3.31,3.31,0,0,0-.67-2.09,2,2,0,0,0-1.6-.86,2.75,2.75,0,0,0-1.65.95,8.53,8.53,0,0,1-3.29,1.87,13.26,13.26,0,0,1-4.28.72,10,10,0,0,1-9-5.09,15.9,15.9,0,0,1-2.32-8.4,8.16,8.16,0,0,1,1.62-5.32,5.32,5.32,0,0,1,4.36-2,9.31,9.31,0,0,1,5.41,1.82,8.47,8.47,0,0,1,1.76,1.66,24.41,24.41,0,0,1,1.87,3,5.71,5.71,0,0,0,1.65,2.08,3.82,3.82,0,0,0,2.21.59,4.75,4.75,0,0,0,2.69-.8,5.29,5.29,0,0,0,2.22-4.72,11.67,11.67,0,0,0-2.56-7.68,3.05,3.05,0,0,0-2.43-1.28,3.09,3.09,0,0,0-.77.08,8,8,0,0,1-1.55.24,7.09,7.09,0,0,1-2.37-.8,17.46,17.46,0,0,0-7.52-1.71,20,20,0,0,0-8.08,1.71,20.48,20.48,0,0,0-8.35,6.48,17.53,17.53,0,0,0-3.68,10.8,19,19,0,0,0,11.07,16.87Z"
                            transform="translate(-226.38 -280.34)" style="fill:#FFF" />
                        <path
                            d="M276.65,316.44a21,21,0,0,0,8.82,1.92,22.78,22.78,0,0,0,7-1.12,19.5,19.5,0,0,0,9.2-6.05,17.06,17.06,0,0,0,4.16-11.25,19.15,19.15,0,0,0-2.11-8.53,20.15,20.15,0,0,0-5.63-7,19.14,19.14,0,0,0-12-3.92,22.22,22.22,0,0,0-8.05,1.39,18.53,18.53,0,0,0-8.62,6.34,18.31,18.31,0,0,0-3.6,11.2,18.7,18.7,0,0,0,2.8,10A17.73,17.73,0,0,0,276.65,316.44Zm3.41-26.29a4,4,0,0,1,3.55-2,5.09,5.09,0,0,1,2.69,1,8.71,8.71,0,0,1,2.35,2.56,24.14,24.14,0,0,1,2.69,6.37,26.17,26.17,0,0,1,1,7,6.11,6.11,0,0,1-1.24,4,4,4,0,0,1-3.27,1.52,4.58,4.58,0,0,1-2.46-.77,6.65,6.65,0,0,1-2-2.08,31.24,31.24,0,0,1-3.1-7,24.19,24.19,0,0,1-1.22-7A6.15,6.15,0,0,1,280.06,290.15Z"
                            transform="translate(-226.38 -280.34)" style="fill:#FFF" />
                        <path
                            d="M311.58,309.4a10.63,10.63,0,0,1-.52,2.7,2.25,2.25,0,0,1-1.19,1.09,8,8,0,0,0-1.72,1,1.48,1.48,0,0,0-.33,1.08q0,2.91,6.45,2.91,7.65,0,7.65-3a1.61,1.61,0,0,0-.88-1.57,10.4,10.4,0,0,1-1.66-1,1.85,1.85,0,0,1-.5-.86,17.77,17.77,0,0,1-.26-3.76c0-1.77.06-3.71.18-5.81.06-.94.37-1.41.94-1.41s1,.55,1.52,1.65l3.52,7.92q.69,1.58,1.74,3.6a18,18,0,0,0,1.35,2.35,1.35,1.35,0,0,0,1,.5,1.43,1.43,0,0,0,1.12-.62,12.72,12.72,0,0,0,1.33-2.44l3.2-7.18a34.45,34.45,0,0,1,2.08-4.09,1.87,1.87,0,0,1,1.44-1,.82.82,0,0,1,.84.66,11.8,11.8,0,0,1,.2,2.8,39.82,39.82,0,0,1-.25,5.44,3.41,3.41,0,0,1-.95,2.16,12.19,12.19,0,0,0-1.65,1.51,1.66,1.66,0,0,0-.32,1.05c0,1.16.82,2,2.45,2.45a26,26,0,0,0,6.72.64c2,0,3.41,0,4.35-.13a12.35,12.35,0,0,0,2.69-.56c1.65-.51,2.48-1.39,2.48-2.64a2,2,0,0,0-1-1.71A7.32,7.32,0,0,1,352,311.8a3.87,3.87,0,0,1-.49-1.7,96.8,96.8,0,0,1-.64-11.92,55.48,55.48,0,0,1,.61-9,4.14,4.14,0,0,1,1.55-2.69,5.12,5.12,0,0,0,1.2-1.14,2.35,2.35,0,0,0,.29-1.24q0-3.43-7.54-3.44c-2.87,0-4.84.39-5.92,1.15a9.17,9.17,0,0,0-2.59,3.55c-.14.28-.45.89-.91,1.84l-3.76,7.33a5.65,5.65,0,0,1-1,1.49,1.32,1.32,0,0,1-1,.4,1.24,1.24,0,0,1-1-.37,12.86,12.86,0,0,1-1.25-2.05l-5.55-10.22a10.9,10.9,0,0,0-1.14-1.86,2.58,2.58,0,0,0-1.1-.72,14.31,14.31,0,0,0-4.82-.56,26.16,26.16,0,0,0-3.32.25,21.49,21.49,0,0,0-3.14.6,3.91,3.91,0,0,0-1.88,1.09,2.49,2.49,0,0,0-.7,1.71c0,1,.63,1.74,1.89,2.35a5.66,5.66,0,0,1,1.16.69,2.2,2.2,0,0,1,.55.8,17.36,17.36,0,0,1,.66,5.89q0,3.46-.21,8.34T311.58,309.4Z"
                            transform="translate(-226.38 -280.34)" style="fill:#FFF" />
                        <path
                            d="M358.48,286.42a3.1,3.1,0,0,1,2,1.19,9.6,9.6,0,0,1,.37,3.45v14q-.06,4.94-.21,5.84a2,2,0,0,1-1.12,1.42,9.17,9.17,0,0,0-2,1.22,1.66,1.66,0,0,0-.43,1.23q0,3.39,9.87,3.39a22.77,22.77,0,0,0,7.25-.91c1.71-.6,2.56-1.47,2.56-2.59,0-.72-.58-1.4-1.73-2a4.58,4.58,0,0,1-1.7-1.3,3.77,3.77,0,0,1-.46-1.9l-.19-4.38v-.15c0-.59.26-.89.77-.89.18,0,.63,0,1.36.08,1.37.13,2.53.19,3.47.19a15,15,0,0,0,9.49-3.06,10.54,10.54,0,0,0,4.16-8.72,10.34,10.34,0,0,0-5.94-9.82,16.59,16.59,0,0,0-7.79-1.78,26.83,26.83,0,0,0-2.83.16c-3.11.28-4.92.44-5.42.46s-2.24.05-5.19.07h-1.6c-1.69-.05-2.75-.08-3.17-.08a5.53,5.53,0,0,0-2.94.64,2.06,2.06,0,0,0-1,1.84Q356.08,285.73,358.48,286.42Zm14.43,1.25c0-.69.65-1,2-1a4.89,4.89,0,0,1,3.09,1q2,1.54,2,5t-1.73,4.75a4.5,4.5,0,0,1-3,1,4.46,4.46,0,0,1-1.95-.38c-.3-.14-.45-.56-.45-1.25Z"
                            transform="translate(-226.38 -280.34)" style="fill:#FFF" />
                        <path
                            d="M395.17,286.79a3.58,3.58,0,0,1,1.45,1.6,9.3,9.3,0,0,1,.34,3.07c0,.68,0,2.06-.08,4.16q-.13,4.45-.14,6.4a23.37,23.37,0,0,0,1,7.62,10.53,10.53,0,0,0,3.47,4.64q5.15,4.08,13.71,4.08a25.26,25.26,0,0,0,8.8-1.44q6.42-2.31,8.32-7.49c.58-1.63.87-4.42.87-8.34v-6.51a59.73,59.73,0,0,1,.26-6.84,2.92,2.92,0,0,1,1.61-1.72,7.46,7.46,0,0,0,1.68-1.15,1.74,1.74,0,0,0,.32-1.14,2.44,2.44,0,0,0-1.85-2.3,18,18,0,0,0-6-.72,18.4,18.4,0,0,0-6.12.74,2.47,2.47,0,0,0-1.9,2.33,1.7,1.7,0,0,0,.5,1.25,6.59,6.59,0,0,0,1.9,1.12A2.75,2.75,0,0,1,425,288a73.61,73.61,0,0,1,.38,7.91v5.86a17.83,17.83,0,0,1-.27,3.5,6.1,6.1,0,0,1-3.62,4.46,9.17,9.17,0,0,1-3.87.79,7.74,7.74,0,0,1-5.49-2c-1.74-1.6-2.57-3.92-2.48-7q.21-7.71.21-10a12.3,12.3,0,0,1,.31-3.25,2,2,0,0,1,1.16-1.36,11.1,11.1,0,0,0,1.6-.83,2.17,2.17,0,0,0,.83-1.78c0-1.51-.95-2.48-2.86-2.91a33.6,33.6,0,0,0-7.3-.67,35.93,35.93,0,0,0-6.94.59,5,5,0,0,0-2.36,1.09,2.44,2.44,0,0,0-.89,1.84A3.16,3.16,0,0,0,395.17,286.79Z"
                            transform="translate(-226.38 -280.34)" style="fill:#FFF" />
                        <path
                            d="M603.65,328.5l-12.17-.18L567.14,328q-24.33-.27-48.68-.46c-16.22-.15-32.45-.18-48.68-.27l-48.68-.08-48.68.09c-16.22.08-32.45.12-48.68.26s-32.45.28-48.68.47l-24.34.35-12.17.19-12.17.23,12.17.24,12.17.19,24.34.35q24.35.28,48.68.47c16.23.14,32.46.18,48.68.26l48.68.09,48.68-.08c16.23-.09,32.46-.12,48.68-.27s32.46-.28,48.68-.46l24.34-.36,12.17-.18,12.17-.25Z"
                            transform="translate(-226.38 -280.34)" style="fill:#FFF" />
                    </svg>
                </a>
            </div>

            <i class="fas fa-bars hidden"></i>

            @guest
            @else
            <div class="menu-container">
                <form action="" class="menu-container__search">
                    <i class="fas fa-search"></i>

                    <input type="search" name="search-content" id="search-content" placeholder="Buscar...">
                </form>

                <div class="menu-container__dropdown">
                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=344859&color=E0E4E0" alt="Profile picture">

                    <div class="name hidden">
                        <p>{{ Auth::user()->name }}</p>
                    </div>

                    <i class="fas fa-chevron-down"></i>
                </div>

                <a class="menu-item hidden" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
            @endguest
        </nav>
        <!-- Navigation bar end -->

        <main>
            @yield('content')
        </main>
    </div>
</body>

</html>