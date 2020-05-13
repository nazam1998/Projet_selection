@extends('adminlte::page')

@section('content')
<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">Formulaire d'ajout de roles</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form class="form-horizontal" action="{{route('role.store')}}" method="POST">
    @csrf
    <div class="card-body">
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Nom du role</label>
        @error('nom')
            <div class="alert text-danger font-weight-bold">{{ $message }}</div>
        @enderror
        <div class="col-sm-10">
          <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" value="@if($errors->first('nom'))@else{{old('nom')}}@endif" id="inputEmail3" placeholder="Veuillez saisir un role">
        </div>
      </div>

      <div class="form-group">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="full" value="full">
          <label class="form-check-label">Tout les droits</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="annonce" value="annonce">
          <label class="form-check-label">Annonce</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="groupe">
          <label class="form-check-label">Groupe</label>
        </div>
        <label for="">Candidat</label>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="candidat-full">
          <label class="form-check-label">Tous</label>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <button type="submit" class="btn btn-info">Ajoutez le role</button>
    </div>
    <!-- /.card-footer -->
  </form>
</div>
@stop