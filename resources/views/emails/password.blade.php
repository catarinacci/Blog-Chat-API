@component('mail::message')
Hello {{ $user->name }} <br>

Forgot Password?<br>

Please enter the code below in your password reset page:<br>

{{ $pin }}<br>

Thank you for using our application!<br>

{{ config('app.name') }}
@endcomponent
