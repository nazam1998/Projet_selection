<h1>Bonjour {{$user->nom}}</h1>

<p>Vous vous êtes inscrits à l'évènement suivant: {{$titre}}</p>
<p>Voici les différentes étapes de cet évènement: </p>
<ul>
    @foreach ($evenement->etapes as $item)
    <li>{{$item->titre}}, le {{$item->date->translatedFormat('j M Y',strtotime("7 Janvier 2015"))}}</li>
    @endforeach
</ul>