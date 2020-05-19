@extends('adminlte::page')

@section('content')
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Formulaire d'ajout de formulaire</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" action="{{route('formulaire.store')}}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Titre</label>
                @error('titre')
                <div class="alert text-danger font-weight-bold">{{ $message }}</div>
                @enderror
                <div class="col-sm-10">
                    <input type="text" name="titre" class="form-control @error('titre') is-invalid @enderror"
                        value="@if($errors->first('titre'))@else{{old('titre')}}@endif" id="inputEmail3"
                        placeholder="Veuillez saisir un titre">
                </div>
            </div>
            <label class="mt-2" for="">Intérêts</label>
            <div class="form-group row mt-2">
                @foreach ($interets as $item)
                <div class="form-check col-lg-2">
                    <input class="form-check-input" type="checkbox" name="interet[]" value="{{$item->id}}">
                    <label class="form-check-label">{{$item->nom}}</label>
                </div>
                @endforeach



            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Ajoutez le formulaire</button>
        </div>
        <!-- /.card-footer -->
    </form>
</div>
@stop

@section('css')
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection

@section('js')
<script src="{{asset('js/admin.js')}}"></script>
@endsection