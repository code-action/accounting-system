@component('mail::message')
@lang('Te damos la bienvenida, estos son los detalles de tu cuenta'):<br>
@lang('Usuario: ') {{ $email }}<br>
@lang('Contraseña: ') {{ $password }}<br>
@component('mail::button', ['url' => config('app.url').'/login'])
@lang('Vamos')
@endcomponent

@lang('Atte.')<br>
{{config('app.name')}}
@endcomponent