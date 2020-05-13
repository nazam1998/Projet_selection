@extends('adminlte::page')

@section('content')
<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">Formulaire d'edit de l'interet</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form class="form-horizontal" action="{{route('interet.update', $interet)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="card-body">
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Interet</label>
        @error('nom')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="col-sm-10">
          <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" value="@if($errors->first('nom')){{$interet->nom}}@else{{old('nom', $interet->nom)}}@endif" id="inputEmail3" placeholder="Veuillez editer un interet">
        </div>
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <button type="submit" class="btn btn-info">Editez l'interet</button>
    </div>
    <!-- /.card-footer -->
  </form>
</div>
@stop