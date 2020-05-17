@extends('adminlte::page')

@section('content')

<div class="card">
    
    <div class="card-header bg-info">
        <h3 class="card-title">Base de données pour les candidats</h3>
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
                    @can('candidat-lecture-','nom')
                        
                    <th>Nom</th>
                    @endcan
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Action: SHOW & EDIT & DELETE | RESTORE |FORCE DELETE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
                <tr>
                    <td>{{$item->evenement->formulaire->titre}}</td>
                    <td>{{$item->nom}}</td>
                    <td>{{$item->prenom}}</td>
                    <td>{{$item->email}}</td>
                    
                    <td class="d-flex">
                        
                        @if ($item->deleted_at)
                        <form action="{{route('candidat.forceDestroy', $item->id)}}" method="POST">@csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mr-3">Force Delete</button>
                        </form>
                            <form action="{{route('candidat.restore', $item->id)}}" method="GET">@csrf
                                <button type="submit" class="btn btn-danger">Restore</button>
                            </form>
                                @else
                                <a href="{{route('candidat.show', $item->id)}}"
                                    class="btn btn-primary mr-3">Show</a>
                                <a href="{{route('candidat.edit', $item->id)}}"
                                    class="btn btn-warning mx-2">Edit</a>
                                <form action="{{route('candidat.destroy', $item->id)}}" method="POST">@csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>

                        @endif
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