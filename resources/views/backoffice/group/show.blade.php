@extends('adminlte::page')

@section('content')

<h1 class="text-center p-3">Détails du groupe</h1>


<table class="table table-bordered table-hover shadow">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$group->responsable->id}}</td>
            <td>{{$group->responsable->nom}}</td>
            <td>{{$group->responsable->prenom}}</td>
            <td>{{$group->responsable->role->nom}}</td>
        </tr>
        @if ($group->coach_id!=null)
        <tr>
            <td>{{$group->coach->id}}</td>
            <td>{{$group->coach->nom}}</td>
            <td>{{$group->coach->prenom}}</td>
            <td>{{$group->coach->role->nom}}</td>
        </tr>
        @endif
        @foreach($group->users as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{$item->nom}}</td>
            <td>{{ $item->prenom }}</td>
            <td>{{ $item->role->nom }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
