@component('mail::message')
    
Olá {{ $tutor }}. 

{{ $name }} está interessado no seu {{ $pet }}! 

Entre em contato atráves do e-mail {{ $email }} ou do telefone {{ $phone }}.

@endcomponent