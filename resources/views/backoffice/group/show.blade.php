@extends('adminlte::page')

@section('content')

<h1 class="text-center p-3">Détails du groupe <span class="text-secondary">{{$group->nom}}</span></h1>


<table class="table table-bordered table-hover shadow">
    <thead class="headShow text-white">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody class="bg-white">
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

@section('css')
  <link rel="stylesheet" href="{{asset('css/admin.css')}}">    
@endsection

@section('js')
<script src="{{asset('js/admin.js')}}"></script>
@endsection