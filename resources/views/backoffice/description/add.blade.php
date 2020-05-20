@extends('adminlte::page')

@section('content')
<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">Formulaire d'ajout de description</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form class="form-horizontal" action="{{route('description.store')}}" method="POST">
    @csrf
    <div class="card-body">
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Titre</label>
        @error('description')
            <div class="alert text-danger font-weight-bold">{{ $message }}</div>
        @enderror
        <div class="col-sm-10">
          <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="@if($errors->first('description'))@else{{old('description')}}@endif" id="inputEmail3" placeholder="Veuillez saisir un description">
        </div>
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <button type="submit" class="btn btn-info">Ajoutez la description</button>
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