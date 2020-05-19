@extends('adminlte::page')

@section('content')
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Formulaire d'ajout de l'étape</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" action="{{route('etape.store',$evenement->id)}}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group row">
                @error('titre')
                <div class="alert text-danger font-weight-bold">{{ $message }}</div>
                @enderror
                <div class="col-sm-10">
                    <label>Titre</label>
                    <input type="text" name="titre" class="form-control @error('titre') is-invalid @enderror"
                        value="@if($errors->first('titre'))@else{{old('titre')}}@endif" id="inputEmail3"
                        placeholder="Veuillez saisir le titre de l'étape" list="titre"><i class="fas fa-arrow-down input-icon"></i>
                        <datalist id="titre">
                            @foreach ($titres as $item)
                        <option value="{{$item->titre}}">{{$item->titre}}</option>
                            @endforeach
                          </datalist>
                </div>
            </div>
            <div class="form-group row">
                @error('date')
                <div class="alert text-danger font-weight-bold">{{ $message }}</div>
                @enderror
                <div class="col-sm-10">
                    <label>Date</label>
                    <input type="date" name="date" class="form-control @error('date') is-invalid @enderror"
                        value="@if($errors->first('date'))@else{{old('date')}}@endif" id="inputEmail3"
                        placeholder="Veuillez saisir le date de l'évènement">
                </div>
            </div>

            <div class="form-group row">
                @error('description')
                <div class="alert text-danger font-weight-bold">{{ $message }}</div>
                @enderror
                <div class="col-sm-10">
                    <label>Description</label>
                    <input list=description type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="inputEmail3"
                        placeholder="Veuillez saisir la description de l'évènement" value="@if($errors->first('description'))@else{{old('description')}}@endif"><i class="fas fa-arrow-down input-icon"></i><i class="fas fa-arrow-down input-icon"></i>
                        <datalist id="description">
                            @foreach ($descriptions as $item)
                        <option value="{{$item->description}}">{{$item->description}}</option>
                            @endforeach
                          </datalist>
                </div>
            </div>
            


        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Ajoutez l'étape</button>
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
    <script>
        $('textarea').autocomplete({
      source: Object.values(<your list here>),
    });
    </script>


@endsection