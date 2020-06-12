

@component('mail::message')
<h1>Bonjour {{$user->nom}},</h1>
<p>Votre candidature a été accepté. Voici vos identifiants: </p>
<ul>
<li>Identifiant: {{$user->email}}</li>
    <li>Mot de passe: {{$password}}</li>
</ul>
@endcomponent
