@extends('adminlte::page')

@section('content')
<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">Formulaire d'ajout de matieres</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form class="form-horizontal" action="{{route('matiere.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Nom de la matiere</label>
        @error('nom')
            <div class="alert text-danger font-weight-bold w-25">{{ $message }}</div>
        @enderror
        <div class="col-sm-10">
          <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" value="@if($errors->first('nom'))@else{{old('nom')}}@endif" id="inputEmail3" placeholder="Veuillez saisir une matiere">
        </div>
        
        <label for="inputEmail3" class="col-sm-2 col-form-label">Image de la matiere</label>
        @error('image')
            <div class="alert text-danger font-weight-bold w-25">{{ $message }}</div>
        @enderror
        <div class="col-sm-10">
          <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" value="@if($errors->first('image'))@else{{old('image')}}@endif" id="inputEmail3" placeholder="Veuillez choisir une image">
        </div>
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <button type="submit" class="btn btn-info">Ajoutez la matiere</button>
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