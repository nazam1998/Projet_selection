@extends('adminlte::page')

@section('content')

<h1 class="text-center p-3">Détails de l'évènement</h1>
<div class="text-center">
    <a href="{{route('etape.create',$evenement->id)}}" class="mx-auto btn btn-primary my-3">Ajouter une étape</a>
</div>
<table class="table table-bordered table-hover shadow">
    <thead>
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Description</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach($evenement->etapes as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{$item->titre}}</td>
            <td>{{ $item->description }}</td>
            <td>{{ $item->date }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
