@extends('adminlte::page')

@section('content')
<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">Formulaire d'ajout d'interets</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form class="form-horizontal" action="{{route('interet.store')}}" method="POST">
    @csrf
    <div class="card-body">
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Nom de l'interet</label>
        @error('nom')
            <div class="alert text-danger font-weight-bold">{{ $message }}</div>
        @enderror
        <div class="col-sm-10">
          <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" value="@if($errors->first('nom'))@else{{old('nom')}}@endif" id="inputEmail3" placeholder="Veuillez saisir un interet">
        </div>
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <button type="submit" class="btn btn-info">Ajoutez l'interet</button>
    </div>
    <!-- /.card-footer -->
  </form>
</div>
@stop