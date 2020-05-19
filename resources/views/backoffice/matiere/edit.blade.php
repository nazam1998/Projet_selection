@extends('adminlte::page')

@section('content')
<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">Formulaire d'edit d'une matiere</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form class="form-horizontal" action="{{route('matiere.update', $matiere)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card-body">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Nom de la matiere</label>
        @error('nom')
            <div class="alert text-danger font-weight-bold">{{ $message }}</div>
        @enderror
        <div class="col-sm-10">
          <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" value="@if($errors->first('nom')){{$matiere->nom}}@else{{old('nom', $matiere->nom)}}@endif" id="inputEmail3" placeholder="Veuillez editer la matiere">
        </div>

        <label for="inputEmail3" class="col-sm-2 col-form-label">Image de la matiere</label>
        @error('image')
            <div class="alert text-danger font-weight-bold">{{ $message }}</div>
        @enderror
        <div class="col-sm-10">
          <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" value="@if($errors->first('image')){{$matiere->image}}@else{{old('image', $matiere->image)}}@endif" id="inputEmail3" placeholder="Veuillez editer l'image de la matiere">
        </div>
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <button type="submit" class="btn btn-info">Editez la matiere</button>
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