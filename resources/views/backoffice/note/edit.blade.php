@extends('adminlte::page')

@section('content')
<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">Formulaire d'edit du note</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form class="form-horizontal" action="{{route('note.update', $note->id)}}" method="POST">
    @csrf
    <div class="card-body">
        @error('titre')
            <div class="alert text-danger font-weight-bold">{{ $message }}</div>
        @enderror
        <div class="col-sm-10">
          <label>Titre de la note</label>
          <input type="text" name="titre" class="form-control @error('titre') is-invalid @enderror" value="@if($errors->first('titre')){{$note->titre}}@else{{old('titre', $note->titre)}}@endif" id="inputEmail3" placeholder="Veuillez editer le titre de la note">
        </div>
        @error('note')
            <div class="alert text-danger font-weight-bold">{{ $message }}</div>
        @enderror
        <div class="col-sm-10">
          <label>Note</label>
          <input type="text" name="note" class="form-control @error('note') is-invalid @enderror" value="@if($errors->first('note')){{$note->note}}@else{{old('note', $note->note)}}@endif" id="inputEmail3" placeholder="Veuillez editer la note">
        </div>
        @error('date')
            <div class="alert text-danger font-weight-bold">{{ $message }}</div>
        @enderror
        <div class="col-sm-10">
          <label>Date</label>
          <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" value="@if($errors->first('date')){{$note->date}}@else{{old('date', $note->date)}}@endif" id="inputEmail3" placeholder="Veuillez editer la date">
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <button type="submit" class="btn btn-info">Editez la note</button>
    </div>
    <!-- /.card-footer -->
  </form>
</div>
@stop

@section('css')
 <link rel="stylesheet" href="{{asset('css/admin.css')}}">   
@endsection