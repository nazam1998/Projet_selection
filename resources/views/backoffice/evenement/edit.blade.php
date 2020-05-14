@extends('adminlte::page')

@section('content')
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Formulaire d'edit d'évènement</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" action="{{route('evenement.update',$evenement)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group row">
                @error('titre')
                <div class="alert text-danger font-weight-bold">{{ $message }}</div>
                @enderror
                <div class="col-sm-10">
                    <label>Titre</label>
                    <input type="text" name="titre" class="form-control @error('titre') is-invalid @enderror"
                value="@if($errors->first('titre')){{$evenement->titre}}@else{{old('titre',$evenement->titre)}}@endif" id="inputEmail3"
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
                placeholder="Veuillez saisir la description de l'évènement">@if($errors->first('description')){{$evenement->description}}@else{{old('description',$evenement->description)}}@endif</textarea>
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
                    @if ($item->id==$evenement->formulaire_id)
                    
                    <option selected value="{{$item->id}}">{{$item->titre}}</option>
                    @else
                        
                    <option value="{{$item->id}}">{{$item->titre}}</option>
                    @endif
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
                  
                    <option @if($evenement->etat=='Futur')selected @endif value="Futur">Futur</option>
                    <option @if($evenement->etat=='En Cours')selected @endif value="En Cours">En Cours</option>
                    <option @if($evenement->etat=='Fini')selected @endif value="Fini">Fini</option>

                </select>
            </div>


        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Editez l'évènement</button>
        </div>
        <!-- /.card-footer -->
    </form>
</div>
@stop

@section('css')
  <link rel="stylesheet" href="{{asset('css/admin.css')}}">    
@endsection