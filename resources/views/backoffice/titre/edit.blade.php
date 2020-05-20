@extends('adminlte::page')

@section('content')
<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">Formulaire d'edit du titre</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form class="form-horizontal" action="{{route('titre.update', $titre)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="card-body">
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Titre</label>
        @error('titre')
            <div class="alert text-danger font-weight-bold">{{ $message }}</div>
        @enderror
        <div class="col-sm-10">
          <input type="text" name="titre" class="form-control @error('titre') is-invalid @enderror" value="@if($errors->first('titre')){{$titre->titre}}@else{{old('titre', $titre->titre)}}@endif" id="inputEmail3" placeholder="Veuillez editer un titre">
        </div>
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <button type="submit" class="btn btn-info">Editez le titre</button>
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