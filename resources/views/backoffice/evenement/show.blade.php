@extends('adminlte::page')

@section('content')

<h1 class="text-center p-3">Détails de l'évènement</h1>
<div class="text-center">
    <a href="{{route('etape.create',$evenement->id)}}" class="mx-auto btn btn-primary my-3">Ajouter une étape</a>
</div>
@if (session()->has('msg'))
<div class="card-header alert alert-success alert-dismissible fade show" role="alert">
    <h3 class="card-title">{{session('msg')}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
    </h3>
</div>
@endif
<table class="table table-bordered table-hover shadow">
    <thead>
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Description</th>
            <th>Date</th>
            <th>Action: EDIT & DELETE</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach($evenement->etapes as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{$item->titre}}</td>
            <td>{{ $item->description }}</td>
            <td>{{ $item->date->format('d/m')}}</td>
            <td class="d-flex">
                <a href="{{route('etape.edit', $item->id)}}"
                    class="btn btn-warning mr-3">Edit</a>
                <form action="{{route('etape.destroy', $item->id)}}" method="POST">@csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection

@section('css')
  <link rel="stylesheet" href="{{asset('css/admin.css')}}">    
@endsection