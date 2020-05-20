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
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>Titre Formulaire</th>
                    @can('candidat-lecture','nom')
                        <th>Nom</th>
                    @endcan
                    @can('candidat-lecture','prenom')
                        <th>Prenom</th>
                    @endcan
                    @can('candidat-lecture','email')
                        <th>Email</th>
                    @endcan
                    <th class="text-center">Action: SHOW & EDIT & DELETE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
                <tr>
                    <td>{{$item->evenement->formulaire->titre}}</td>
                    @can('candidat-lecture','nom')
                    <td>{{$item->nom}}</td>
                    @endcan
                    @can('candidat-lecture','prenom')
                    <td>{{$item->prenom}}</td>
                    @endcan
                    @can('candidat-lecture','email')
                    <td>{{$item->email}}</td>
                    @endcan

                    <td class="d-flex justify-content-center">
                        <a href="{{route('candidat.show', $item->id)}}" class="btn btn-primary">Show</a>
                        @can('candidat-edit')

                        <a href="{{route('candidat.edit', $item->id)}}" class="btn btn-warning mx-2">Edit</a>
                        @endcan
                        <form action="{{route('candidat.destroy', $item->id)}}" method="POST">@csrf
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

@section('js')
<script src="{{asset('js/admin.js')}}"></script>
@endsection