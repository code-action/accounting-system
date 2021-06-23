@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('Hola!')
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ "Recibimos una solicitud de restablecimiento de contraseña para su cuenta." }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ "Restablecer contraseña" }}
@endcomponent
@endisset

{{ "Este enlace de restablecimiento de contraseña expirará en 60 minutos." }}
{{ "Si no solicitó un restablecimiento de contraseña, no es necesario realizar ninguna otra acción." }}

@lang('Atte.')<br>
{{ config('app.name') }}

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
    "Si tienes problemas al usar el botón \":actionText\", copia y pega la  siguiente URL\n".
    'en tu buscador web:',
    [
        'actionText' => "Restablecer contraseña",
    ]
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
@endslot
@endisset
@endcomponent
