@extends('adminlte::page')

@section('content')

@if (session()->has('msg'))
<div class="card-header alert alert-success alert-dismissible fade show" role="alert">
    <h3 class="card-title">{{session('msg')}}
      <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
    </h3>
</div>
@endif
<div class="card">
    <div class="card-header bg-info">
        <h3 class="card-title">Base de données pour les candidats</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table style="border-collapse: collapse;" class="table table-hover text-nowrap">
            <thead>
                <tr>
                    @can('candidat-lecture', 'nom')
                    <th>Nom</th>
                    @endcan
                    @can('candidat-lecture', 'prenom')
                    <th>Prenom</th>
                    @endcan
                    @can('candidat-lecture', 'email')
                    <th>Email</th>
                    @endcan
                    @can('candidat-lecture', 'commune')
                    <th>Commune</th>
                    @endcan
                    @can('candidat-lecture', 'adresse')
                    <th>Adresse</th>
                    @endcan
                    @can('candidat-lecture', 'telephone')
                    <th>Téléphone</th>
                    @endcan
                    @can('candidat-lecture', 'genre')
                    <th>Genre</th>
                    @endcan
                    @can('candidat-lecture', 'statut')
                    <th>Statut</th>
                    @endcan
                    @can('candidat-lecture', 'objectif')
                    <th>Objectif</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                <tr>
                    @can('candidat-lecture', 'nom')
                    <td>{{$user->nom}}</td>
                    @endcan
                    @can('candidat-lecture', 'prenom')
                    <td>{{$user->prenom}}</td>
                    @endcan
                    @can('candidat-lecture', 'email')
                    <td>{{$user->email}}</td>
                    @endcan
                    @can('candidat-lecture', 'commune')
                    <td>{{$user->commune}}</td>
                    @endcan
                    @can('candidat-lecture', 'adresse')
                    <td>{{$user->adresse}}</td>
                    @endcan
                    @can('candidat-lecture', 'telephone')
                    <td>{{$user->telephone}}</td>
                    @endcan
                    @can('candidat-lecture', 'genre')
                    <td>{{$user->genre}}</td>
                    @endcan
                    @can('candidat-lecture', 'statut')
                    <td>{{$user->statut}}</td>
                    @endcan
                    @can('candidat-lecture', 'objectif')
                    <td>{{$user->objectif}}</td>
                    @endcan
                </tr>
            </tbody>
            <tbody style="border-top: 40px solid transparent;">
                <tr>
                    @can('candidat-lecture', 'ordinateur')
                    <th>Ordinateur</th>
                    @endcan
                    @can('candidat-lecture', 'abo')
                    <th>Abonné</th> 
                    @endcan
                    @can('candidat-lecture', 'photo')
                    <th class="text-center">Photo</th>
                    @endcan
                    {{-- @can('candidat-lecture', 'interet') --}}
                    <th class="text-center">Intérêt</th>
                    {{-- @endcan --}}
                    <th>Action: SHOW & EDIT & DELETE</th>
                </tr>
                <tr>
                    @can('candidat-lecture', 'ordinateur')
                    <td>
                        @if($user->ordinateur)
                        oui
                        @else
                        non
                        @endif
                    </td>
                    @endcan
                    @can('candidat-lecture', 'abo')
                    <td>
                        @if($user->abo)
                        oui
                        @else
                        non
                        @endif
                    </td>
                    @endcan
                    @can('candidat-lecture', 'photo')
                    <td>
                        <img class="img-fluid" src="{{asset('storage/'.$user->photo)}}" alt="">
                    </td>
                    @endcan
                    {{-- @can('candidat-lecture', 'interet') --}}
                    <td>
                        <ul>
                            @foreach ($user->interets as $item)
                        <li>{{$item->nom}}</li>
                            @endforeach
                        </ul>
                    </td>
                    {{-- @endcan --}}
                    <td class="d-flex justify-content-center">
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