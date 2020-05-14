@extends('adminlte::page')

@section('content')

<h1 class="text-center p-3">Détails du groupe</h1>


        <table class="table table-bordered table-hover shadow">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nom du groupe</th>
                <th>Responsable du groupe</th>
                <th>Coach du groupe</th>
                <th>Membres du groupe</th>
            </tr>
            </thead>
            <tbody>
                @foreach($group->users as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{$group->nom}}</td>
                    <td>{{ $item->nom }}</td>
                    <td>{{ $item->nom }}</td>
                    <td>{{ $item->users }}</td>
                </tr>
            @endforeach
            </tbody>
          </table>

@endsection