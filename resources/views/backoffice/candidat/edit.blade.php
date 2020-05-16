@extends('adminlte::page')

@section('content')
<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">Formulaire d'edit du groupe</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form class="form-horizontal" action="{{route('candidat.update',$user)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="card-body">


<div class="row">


        <div class="col-lg-6">
            @error('nom')
    <div class="alert text-danger font-weight-bold">{{ $message }}</div>
    @enderror
            <div class='form-group'>
                <label for="">Nom</label>
                <input class="form-control" name="nom" type="text" value="{{old('nom',$user->nom)}}">
            </div>
            @error('prenom')
    <div class="alert text-danger font-weight-bold">{{ $message }}</div>
    @enderror
            <div class='form-group'>
                <label for="">Prenom</label>
                <input class="form-control" name="prenom" type="text" value="{{old('prenom',$user->prenom)}}">
            </div>
            @error('email')
    <div class="alert text-danger font-weight-bold">{{ $message }}</div>
    @enderror
            <div class='form-group'>
                <label for="">Email</label>
                <input class="form-control" name="email" type="text" value="{{old('email',$user->email)}}">
            </div>
            @error('commune')
    <div class="alert text-danger font-weight-bold">{{ $message }}</div>
    @enderror
            <div class='form-group'>
                <label for="">Commune</label>
                <input class="form-control" name="commune" type="text" value="{{old('commune',$user->commune)}}">
            </div>
            <div class='form-group'>
                <label for="">Adresse</label>
                <input class="form-control" name="adresse" type="text" value="{{old('adresse',$user->adresse)}}">
            </div>
        </div>
        <div class="col-lg-6">
            <div class='form-group'>
                <label for="">Téléphone</label>
                <input class="form-control" name="telephone" type="text" value="{{old('telephone',$user->telephone)}}">
            </div>
            <div class='form-group'>
                <label for="">Objectif</label>
                <input class="form-control" name="objectif" type="text" value="{{old('objectif',$user->objectif)}}">
            </div>
            <div class='form-group'>
                <label for="">Photo</label>
                <input style="width: 100%; background-color: white;" name="photo" type="file">
            </div>
            <div class='form-group'>
                <label style="margin-right: 12px;" for="">Genre: </label>
                <label style="margin-right: 5px;" class="white" for="">Homme</label>
                <input @if($user->genre=='Homme')checked @endif style="margin-right: 8px;" name="genre" type="radio">
                <label style="margin-right: 5px;" class="white" for="">Femme</label>
                <input @if($user->genre=='Femme')checked @endif name="genre" type="radio">
            </div>
            <div class='form-group'>
                <label style="margin-right: 10px;" for="">Statut</label>
                <select name="statut" id="">
                    <option @if($user->statut=='Célibataire')selected @endif value="Célibataire">Célibataire</option>
                    <option @if($user->statut=='Divorcé(e)')selected @endif value="Divorcé(e)">Divorcé(e)</option>
                    <option @if($user->statut=='Marié(e)')selected @endif value="Marié(e)">Marié(e)</option>
                </select>
            </div>

            <div class='form-group'>
                <label style="margin-right: 10px;" for="">S'abonner pour découvrir prochains
                    évènements</label>
                <input name="abo" type="checkbox" @if($user->abo)checked @endif>
            </div>
            <div class='form-group'>
                <label style="margin-right: 10px;" for="">Possède un ordinateur</label>
                <input name="ordinateur" type="checkbox"@if($user->ordinateur)checked @endif>
            </div>
        </div>
    </div>

    @error('role_id')
    <div class="alert text-danger font-weight-bold">{{ $message }}</div>
    @enderror
    <div class="form-group col-sm-10">
        <label>Roles</label>
        <select class="form-control" name="role_id">
            <option>Choisir un role...</option>
            @foreach ($roles as $item)
            @if ($item->id==$user->role_id)

            <option selected value="{{$item->id}}">{{$item->nom}}</option>
            @else

            <option value="{{$item->id}}">{{$item->nom}}</option>
            @endif
            @endforeach
        </select>
    </div>


    @error('group_id')
    <div class="alert text-danger font-weight-bold">{{ $message }}</div>
    @enderror
    <div class="form-group col-sm-10">
        <label>Groupes</label>
        <select class="form-control" name="group_id">
            <option>Choisir un groupe...</option>
            @foreach ($groups as $item)
            @if ($item->id==$user->group->contains($item->id))

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
        <button type="submit" class="btn btn-info">Editez le candidat</button>
    </div>
    <!-- /.card-footer -->
</form>
</div>
@stop

@section('css')
  <link rel="stylesheet" href="{{asset('css/admin.css')}}">    
@endsection