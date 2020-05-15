@extends('adminlte::page')

@section('content')

<div class="card">
    
    <div class="card-header bg-info">
        <h3 class="card-title">Base de données pour les évènements</h3>
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
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>Titre Formulaire</th>
                    <th>Etat</th>
                    <th>Date</th>
                    <th class="text-center">Action: SHOW & EDIT & DELETE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($evenements as $item)
                <tr>
                    <td>{{$item->formulaire->titre}}</td>
                    <td>{{$item->etat}}</td>
                
                    <td>{{$item->date->translatedFormat('j M y',strtotime("7 Janvier 2015"))}}</td>
                    <td class="d-flex justify-content-center"><a href="{{route('evenement.show', $item->id)}}"
                        class="btn btn-primary">Show</a>
                        <a href="{{route('evenement.edit', $item->id)}}"
                            class="btn btn-warning mx-2">Edit</a>
                        <form action="{{route('evenement.destroy', $item->id)}}" method="POST">@csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>

@stop
@section('css')
  <link rel="stylesheet" href="{{asset('css/admin.css')}}">    
@endsection