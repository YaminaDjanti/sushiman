@component('mail::message')

# A l'attention de l'administrateur


- {{$nom}}
- {{$email}}


@component('mail::panel')
Sujet {{$messageSubject}}
@endcomponent

@component('mail::panel')
Message: {{$textMessage}}
@endcomponent

@component('mail::button', [
    'url' => 'route("/shop")',
    'color'=> 'success'
    ])
Accueil M.Sushi
@endcomponent



Thanks,<br>
{{ config('app.name') }}
@endcomponent
