@extends('adminlte::page')

@section('content')
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Formulaire d'edit de formulaire</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" action="{{route('formulaire.update',$formulaire)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Titre</label>
                @error('titre')
                <div class="alert text-danger font-weight-bold">{{ $message }}</div>
                @enderror
                <div class="col-sm-10">
                    <input type="text" name="titre" class="form-control @error('titre') is-invalid @enderror"
                        value="@if($errors->first('titre')){{$formulaire->titre}}@else{{old('titre',$formulaire->titre)}}@endif"
                        id="inputEmail3" placeholder="Veuillez saisir un titre">
                </div>
            </div>
            <label for="">Intérêts</label>
            <div class="form-group row">
                @foreach ($interets as $item)
                <div class="form-check col-lg-4">
                    @if ($formulaire->interets->contains($item->id))

                    <input checked class="form-check-input" type="checkbox" name="interet[]" value="{{$item->id}}">
                    @else
                    <input class="form-check-input" type="checkbox" name="interet[]" value="{{$item->id}}">

                    @endif
                    <label class="form-check-label">{{$item->nom}}</label>
                </div>
                @endforeach



            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Editez le formulaire</button>
        </div>
        <!-- /.card-footer -->
    </form>
</div>
@stop

@section('css')
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection
