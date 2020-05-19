@extends('adminlte::page')

@section('content')
<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">Formulaire d'edit du groupe</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form class="form-horizontal" action="{{route('group.update', $group)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="card-body">
        @error('nom')
            <div class="alert text-danger font-weight-bold">{{ $message }}</div>
        @enderror
        <div class="col-sm-10">
          <label>Nom du groupe</label>
          <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" value="@if($errors->first('nom')){{$group->nom}}@else{{old('nom', $group->nom)}}@endif" id="inputEmail3" placeholder="Veuillez editer le nom du groupe">
        </div>
        @error('responsable_id')
            <div class="alert text-danger font-weight-bold">{{ $message }}</div>
        @enderror
        <div class="form-group col-sm-10">
            <label>Nom du responsable</label>
            <select class="form-control" name="responsable_id">
              <option>Choisir un responsable...</option>
                @foreach ($responsables as $item)
                    
                @if ($group->users->contains($item->id))    
                <option selected value="{{$item->id}}">{{$item->nom}}</option>
                @else
                <option value="{{$item->id}}">{{$item->nom}}</option>
                @endif
                
                @endforeach
            </select>
          </div>
          @error('coach_id')
            <div class="alert text-danger font-weight-bold">{{ $message }}</div>
        @enderror
          <div class="form-group col-sm-10">
            <label>Nom du coach</label>
            <select class="form-control" name="coach_id">
              <option value="">Choisir un coach...</option>
                @foreach ($coachs as $item)
                    
                @if ($group->users->contains($item->id))    
                <option selected value="{{$item->id}}">{{$item->nom}}</option>
                @else
                <option value="{{$item->id}}">{{$item->nom}}</option>
                @endif
                @endforeach
            </select>
          </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <button type="submit" class="btn btn-info">Editez le groupe</button>
    </div>
    <!-- /.card-footer -->
  </form>
</div>
@stop

@section('css')
  <link rel="stylesheet" href="{{asset('css/admin.css')}}">    
@endsection