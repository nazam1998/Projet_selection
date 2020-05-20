@extends('adminlte::page')

@section('content')

<h1 class="text-center p-3">Détails de l'évènement</h1>
<div class="text-center">
    <a href="{{route('etape.create',$evenement->id)}}" class="mx-auto btn my-4 btnShow">Ajouter une étape</a>
</div>
@if (session()->has('msg'))
<div class="card-header alert alert-success alert-dismissible fade show" role="alert">
    <h3 class="card-title">{{session('msg')}}
      <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
    </h3>
</div>
@endif
<table class="table table-bordered table-hover shadow text-white">
    <thead class="headShow">
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Description</th>
            <th>Date</th>
            <th class="text-center">Action: EDIT & DELETE</th>
        </tr>
    </thead>
    <tbody class="text-dark bg-white">
        
        @foreach($evenement->etapes as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{$item->titre}}</td>
            <td>{{ $item->description }}</td>
            <td>{{ $item->date->translatedFormat('j M y',strtotime("7 Janvier 2015"))}}</td>
            <td class="d-flex justify-content-center">
                <a href="{{route('etape.edit', $item->id)}}"
                    class="btn btn-warning mr-2">Edit</a>
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

@section('js')
<script src="{{asset('js/admin.js')}}"></script>
@endsection