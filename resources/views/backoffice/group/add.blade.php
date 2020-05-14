@extends('adminlte::page')

@section('content')
<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">Formulaire d'ajout de groupe</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form class="form-horizontal" action="{{route('group.store')}}" method="POST">
    @csrf
    <div class="card-body">
      <div class="form-group row">
        @error('nom')
            <div class="alert text-danger font-weight-bold">{{ $message }}</div>
        @enderror
        <div class="col-sm-10">
          <label>Nom du groupe</label>
          <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" value="@if($errors->first('nom'))@else{{old('nom')}}@endif" id="inputEmail3" placeholder="Veuillez saisir le nom du groupe">
        </div>
        @error('responsable_id')
            <div class="alert text-danger font-weight-bold">{{ $message }}</div>
        @enderror
        <div class="form-group col-sm-10">
            <label>Nom du responsable</label>
            <select class="form-control" name="responsable_id">
              <option>Choisir un responsable...</option>
                @foreach ($responsables as $item)
                    <option value="{{$item->id}}">{{$item->nom}}</option>
                @endforeach
            </select>
          </div>
          @error('coach_id')
            <div class="alert text-danger font-weight-bold">{{ $message }}</div>
        @enderror
          @if ($coachs->count() != 0) 
          <div class="form-group col-sm-10">
            <label>Nom du coach</label>
            <select class="form-control" name="coach_id">
              <option>Choisir un choisir...</option>
                @foreach ($coachs as $item)
                    <option value="{{$item->id}}">{{$item->nom}}</option>
                @endforeach
            </select>
          </div>
          @endif
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <button type="submit" class="btn btn-info">Ajoutez le groupe</button>
    </div>
    <!-- /.card-footer -->
  </form>
</div>
@stop