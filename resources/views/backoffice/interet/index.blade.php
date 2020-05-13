@extends('adminlte::page')

@section('content')

<div class="card">
    <div class="card-header bg-success">
      <h3 class="card-title">Base de données pour les interets</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
      <table class="table table-hover text-nowrap">
        <thead>
          <tr>
            <th>Nom</th>
            <th>Action: EDIT & DELETE</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($interet as $item)
        <tr>
          <td>{{$item->nom}}</td>
          <td class="d-flex"><a href="{{route('interet.edit', $item->id)}}" class="btn btn-warning mr-3">Edit</a><form action="{{route('interet.destroy', $item->id)}}" method="POST">@csrf @method('DELETE')<button type="submit" class="btn btn-warning">Delete</button></form></td>
        </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>

@stop