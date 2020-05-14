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
                @error('titre')
                <div class="alert text-danger font-weight-bold">{{ $message }}</div>
                @enderror
                <div class="col-sm-10">
                    <label>Titre</label>
                    <input type="text" name="titre" class="form-control @error('titre') is-invalid @enderror"
                        value="@if($errors->first('titre'))@else{{old('titre')}}@endif" id="inputEmail3"
                        placeholder="Veuillez saisir le titre de l'évènement">
                </div>
            </div>

            <div class="form-group row">
                @error('description')
                <div class="alert text-danger font-weight-bold">{{ $message }}</div>
                @enderror
                <div class="col-sm-10">
                    <label>Description</label>
                    <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="inputEmail3"
                        placeholder="Veuillez saisir la description de l'évènement">@if($errors->first('description'))@else{{old('description')}}@endif</textarea>
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


            @error('etat')
            <div class="alert text-danger font-weight-bold">{{ $message }}</div>
            @enderror
            <div class="form-group col-sm-10">
                <label>Etat</label>
                <select class="form-control" name="etat">
                    <option>Choisir un état...</option>

                    <option value="Futur">Futur</option>
                    <option value="En Cours">En Cours</option>
                    <option value="Fini">Fini</option>

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
