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

        @case('Update_User')
        <x-contenedor>
            <x-user.update />
        </x-contenedor>
        @break


        @case('Logout')
        <x-contenedor>
            <x-user.logout />
        </x-contenedor>
        @break

        @case('Delete_User')
        <x-contenedor>
            <x-user.delete />
        </x-contenedor>
        @break


        @case('Create_Note')
        <x-contenedor>
            <x-note.create />
        </x-contenedor>
        @break

        @case('Select_Note')
        <x-contenedor>
            <x-note.show />
        </x-contenedor>
        @break

        @case('Update_Note')
        <x-contenedor>
            <x-note.update />
        </x-contenedor>
        @break

        @case('All_Notes')
        <x-contenedor>
            <x-note.all />
        </x-contenedor>
        @break

        @case('Delete_Note')
        <x-contenedor>
            <x-note.delete />
        </x-contenedor>
        @break

        @case('My_Notes')
        <x-contenedor>
            <x-note.my_notes />
        </x-contenedor>
        @break

        @case('Search_Notes')
        <x-contenedor>
            <x-note.search />
        </x-contenedor>
        @break

        @case('Create_Comment')
        <x-contenedor>
            <x-comment.create />
        </x-contenedor>
        @break

        @case('Delete_Comment')
        <x-contenedor>
            <x-comment.delete />
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
