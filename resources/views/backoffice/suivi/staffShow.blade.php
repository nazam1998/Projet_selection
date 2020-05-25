@extends('adminlte::page')

@section('content')

<div class="card">

    <div class="card-header bg-info">
        <h3 class="card-title">Page d'informations du staff </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$user->nom}}</td>
                    <td>{{$user->prenom}}</td>
                    <td>{{$user->email}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<!-- /.card-body -->
@if (session()->has('msg'))
<div style="margin-top:50px;" class="card-header alert alert-success alert-dismissible fade show" role="alert">
    <h3 class="card-title">{{session('msg')}}
        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </h3>
</div>
@endif

<div class="card">
    <div class="card-header bg-info">
        <h3 class="card-title">Notes laissés par le staff </h3>
    </div>

    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Note</th>
                    <th>Date</th>
                    @can('suivi-ecriture',$user)
                    <th class="text-center">Actions: EDIT & DELETE</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @foreach ($user->notes as $item)
                <tr>
                    <td>{{$item->titre}}</td>
                    <td>{{$item->note}}</td>
                    <td>{{$item->date->translatedFormat('j M y',strtotime("7 Janvier 2015"))}}</td>
                    @can('suivi-ecriture',$user)
                    <td class="d-flex justify-content-center">

                        <a href="{{route('note.edit', [$user,$item->id])}}" class="btn btn-warning mr-3">Edit</a>
                        <form action="{{route('note.destroy', [$user,$item->id])}}" method="POST">@csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                    @endcan
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@can('suivi-ecriture',$user)
<h4>Formulaire pour ajouter une note</h4>
<form class="form-horizontal" action="{{route('note.store', $user->id)}}" method="POST">
    @csrf
    <div class="card-body">
        <div class="form-group row">
            @error('titre')
            <div class="alert text-danger font-weight-bold">{{ $message }}</div>
            @enderror
            <div class="col-sm-10">
                <label>Titre du note</label>
                <input type="text" name="titre" class="form-control @error('titre') is-invalid @enderror"
                    value="@if($errors->first('titre'))@else{{old('titre')}}@endif" id="inputEmail3"
                    placeholder="Veuillez saisir le titre">
            </div>
            @error('note')
            <div class="alert text-danger font-weight-bold">{{ $message }}</div>
            @enderror
            <div class="col-sm-10">
                <label>Note</label>
                <textarea type="text" name="note" class="form-control @error('note') is-invalid @enderror"
                    value="@if($errors->first('note'))@else{{old('note')}}@endif" id="inputEmail3"
                    placeholder="Veuillez saisir la note"></textarea>
            </div>
            @error('date')
            <div class="alert text-danger font-weight-bold">{{ $message }}</div>
            @enderror
            <div class="col-sm-10">
                <label>Date de rencontre</label>
                <input type="date" name="date" class="form-control w-25 @error('date') is-invalid @enderror"
                    value="@if($errors->first('date'))@else{{old('date')}}@endif" id="inputEmail3"
                    placeholder="Veuillez saisir la date">
            </div>
        </div>
    </div>
    <div class="showStaff"><button type="submit" class="btn text-white">Ajoutez la note</button></div>
</form>

@endcan

@stop

@section('css')
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection

@section('js')
<script src="{{asset('js/admin.js')}}"></script>
@endsection
