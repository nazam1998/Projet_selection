@extends('adminlte::page')

@section('content')
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Formulaire d'ajout d' évènement</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" action="{{route('evenement.store')}}" method="POST">
        @csrf
        <div class="card-body">


            <div class="form-group row">
                @error('date')
                <div class="alert text-danger font-weight-bold">{{ $message }}</div>
                @enderror
                <div class="col-sm-10">
                    <label>Date</label>
                    <input type="date" name="date" class="form-control @error('date') is-invalid @enderror"
                        value="@if($errors->first('date'))@else{{old('date')}}@endif" id="inputEmail3"
                        placeholder="Veuillez saisir la date de l'évènement">
                </div>
            </div>
            
            @error('formulaire_id')
            <div class="alert text-danger font-weight-bold">{{ $message }}</div>
            @enderror
            <div class="form-group col-sm-10">
                <label>Formulaire</label>
                <select class="form-control" name="formulaire_id">
                    <option>Choisir un formulaire...</option>
                    @foreach ($formulaires as $item)
                    <option value="{{$item->id}}">{{$item->titre}}</option>
                    @endforeach
                </select>
            </div>
            
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Ajoutez l' évènement</button>
        </div>
        <!-- /.card-footer -->
    </form>
</div>
@stop

@section('css')
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection
