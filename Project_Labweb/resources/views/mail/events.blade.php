@component('mail::message')
    # Viva !
    
    Foi recebido um novo formulário de evento:
    
    Nome : {{ $validated['name'] }}@if (!array_key_exists('company', $validated)) {{$validated['last_name']}}@endif
    @if (array_key_exists('company', $validated))
    Empresa : {{ $validated['company'] }}@endif
    Email : {{ $validated['email'] }}
    Telefone : {{ $validated['phone'] }}
    Tipo de evento : {{ $validated['type'] }}
    Número de convidados : {{ $validated['participants'] }}
    Mensagem : {{ $validated['suggestions'] }}
    
@endcomponent
