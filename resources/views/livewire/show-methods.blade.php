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

        @case('Verify_Email')
        <x-contenedor>
            <x-user.verify_email />
        </x-contenedor>
        @break

        @case('Login')
        <x-contenedor>
            <x-user.login />
        </x-contenedor>
        @break

        @case('Resending_Email_Verification')
        <x-contenedor>
            <x-user.send_verify_email />
        </x-contenedor>
        @break

        @case('Forgot_Password')
        <x-contenedor>
            <x-user.forgot_password />
        </x-contenedor>
        @break

        @case('Profile')
        <x-contenedor>
            <x-user.profile />
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
