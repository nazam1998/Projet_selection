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
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Commune</th>
                    <th>Adresse</th>
                    <th>Téléphone</th>
                    <th>Genre</th>
                    <th>Statut</th>
                    <th>Objectif</th>
                    <th>Ordinateur</th>
                    <th>Abonné</th>
                    
                </tr>
            </thead>
            <tbody>
                <tr>

                    <td>{{$user->nom}}</td>
                    <td>{{$user->prenom}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->commune}}</td>
                    <td>{{$user->adresse}}</td>
                    <td>{{$user->telephone}}</td>
                    <td>{{$user->genre}}</td>
                    <td>{{$user->statut}}</td>
                    <td>{{$user->objectif}}</td>
                    <td>
                        @if($user->ordinateur)
                        oui
                        @else
                        non
                        @endif
                    </td>

                    <td>
                        @if($user->abo)
                        oui
                        @else
                        non
                        @endif
                    </td>
                    
                    
                </tr>
                <tr>
                    <th>Photo</th>
                    <th>Intérêt</th>
                    <th>Action: SHOW & EDIT & DELETE</th>
                </tr>
                <tr>
                    <td>
                        <img class="img-fluid" src="{{asset('storage/'.$user->photo)}}" alt="">
                    </td>
                    <td>
                        <ul>
                            @foreach ($user->interets as $item)
                        <li>{{$item->nom}}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td class="d-flex">
                        @if ($user->deleted_at)
                        <form action="{{route('candidat.forceDestroy', $user->id)}}" method="POST">@csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Force Delete</button>
                            <form action="{{route('candidat.restore', $user->id)}}" method="POST">@csrf
                                <button type="submit" class="btn btn-danger">Restore</button>
                                @else
                                
                                <a href="{{route('candidat.edit', $user->id)}}"
                                    class="btn btn-warning mx-2">Edit</a>
                                <form action="{{route('candidat.destroy', $user->id)}}" method="POST">@csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>

                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>

@stop
@section('css')
  <link rel="stylesheet" href="{{asset('css/admin.css')}}">    
@endsection
@section('js')
<script src="{{asset('js/admin.js')}}"></script>
@endsection