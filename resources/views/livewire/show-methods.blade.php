<div>

    @switch($module)
        @case('home')
            <x-contenedor>
                <x-home />
            </x-contenedor>
        @break

        @case('Register')
        <x-contenedor>
            <x-user.registro />
        </x-contenedor>
        @break

        @case('Login')
        <x-contenedor>
            <x-user.login />
        </x-contenedor>
        @break

        @default
    @endswitch

    {{-- @if ($module == 'home')
        <x-contenedor>

            <x-home />
        </x-contenedor>
    @else
        <x-contenedor>
            <h1>{{ $module }}</h1>
        </x-contenedor>
    @endif --}}

</div>
