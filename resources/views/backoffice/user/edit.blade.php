@extends('adminlte::page')

@section('content')
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Formulaire d'edit du user</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" action="{{route('users.update',$user)}}" method="POST" enctype="multipart/form-data">
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
                        @can('user-ecriture', 'nom')
                        <input class="form-control" name="nom" type="text" value="{{old('nom',$user->nom)}}">
                        @endcan
                    </div>
                    @error('prenom')
                    <div class="alert text-danger font-weight-bold">{{ $message }}</div>
                    @enderror
                    <div class='form-group'>
                        <label for="">Prenom</label>
                        @can('user-ecriture', 'prenom')
                        <input class="form-control" name="prenom" type="text" value="{{old('prenom',$user->prenom)}}">
                        @endcan
                    </div>
                    @error('email')
                    <div class="alert text-danger font-weight-bold">{{ $message }}</div>
                    @enderror
                    <div class='form-group'>
                        <label for="">Email</label>
                        @can('user-ecriture', 'email')
                        <input class="form-control" name="email" type="text" value="{{old('email',$user->email)}}">
                        @endcan
                    </div>
                    @error('commune')
                    <div class="alert text-danger font-weight-bold">{{ $message }}</div>
                    @enderror
                    <div class='form-group'>
                        <label for="">Commune</label>
                        @can('user-ecriture', 'commune')
                        <input class="form-control" name="commune" type="text"
                            value="{{old('commune',$user->commune)}}">
                        @endcan
                    </div>
                    @error('adresse')
                    <div class="alert text-danger font-weight-bold">{{ $message }}</div>
                    @enderror
                    <div class='form-group'>
                        <label for="">Adresse</label>
                        @can('user-ecriture', 'adresse')
                        <input class="form-control" name="adresse" type="text"
                            value="{{old('adresse',$user->adresse)}}">
                        @endcan
                    </div>
                </div>
                <div class="col-lg-6">
                    @error('telephone')
                    <div class="alert text-danger font-weight-bold">{{ $message }}</div>
                    @enderror
                    <div class='form-group'>
                        <label for="">Téléphone</label>
                        @can('user-ecriture', 'telephone')
                        <input class="form-control" name="telephone" type="text"
                            value="{{old('telephone',$user->telephone)}}">
                        @endcan
                    </div>
                    @error('objectif')
                    <div class="alert text-danger font-weight-bold">{{ $message }}</div>
                    @enderror
                    <div class='form-group'>
                        <label for="">Objectif</label>
                        @can('user-ecriture', 'objectif')
                        <input class="form-control" name="objectif" type="text"
                            value="{{old('objectif',$user->objectif)}}">
                        @endcan
                    </div>
                    @error('photo')
                    <div class="alert text-danger font-weight-bold">{{ $message }}</div>
                    @enderror
                    <div class='form-group'>
                        <label for="">Photo</label>
                        @can('user-ecriture', 'photo')
                        <input style="width: 100%; background-color: white;" name="photo" type="file">
                        @endcan
                    </div>
                    @error('genre')
                    <div class="alert text-danger font-weight-bold">{{ $message }}</div>
                    @enderror
                    <div class='form-group'>
                        <label style="margin-right: 12px;" for="">Genre: </label>
                        <label style="margin-right: 5px;" class="white" for="">Homme</label>
                        @can('user-ecriture', 'genre')
                        <input @if($user->genre=='Homme')checked @endif style="margin-right: 8px;" name="genre"
                        type="radio" value="Homme">
                        <label style="margin-right: 5px;" class="white" for="">Femme</label>
                        <input @if($user->genre=='Femme')checked @endif name="genre" type="radio" value="Femme">
                        @endcan
                    </div>
                    @error('statut')
                    <div class="alert text-danger font-weight-bold">{{ $message }}</div>
                    @enderror
                    <div class='form-group'>
                        <label style="margin-right: 10px;" for="">Statut</label>
                        @can('user-ecriture', 'statut')
                        <select name="statut" id="">
                            <option @if($user->statut=='Célibataire')selected @endif value="Célibataire">Célibataire
                            </option>
                            <option @if($user->statut=='Divorcé(e)')selected @endif value="Divorcé(e)">Divorcé(e)
                            </option>
                            <option @if($user->statut=='Marié(e)')selected @endif value="Marié(e)">Marié(e)</option>
                        </select>
                        @endcan
                    </div>
                    @error('abo')
                    <div class="alert text-danger font-weight-bold">{{ $message }}</div>
                    @enderror
                    <div class='form-group'>
                        <label style="margin-right: 10px;" for="">S'abonner pour découvrir prochains
                            évènements</label>
                        @can('user-ecriture', 'abo')
                        <input name="abo" type="checkbox" @if($user->abo)checked @endif>
                        @endcan
                    </div>
                    @error('ordinateur')
                    <div class="alert text-danger font-weight-bold">{{ $message }}</div>
                    @enderror
                    <div class='form-group'>
                        <label style="margin-right: 10px;" for="">Possède un ordinateur</label>
                        @can('user-ecriture', 'ordinateur')
                        <input name="ordinateur" type="checkbox" @if($user->ordinateur)checked @endif>
                        @endcan
                    </div>
                </div>
            </div>

            @error('role_id')
            <div class="alert text-danger font-weight-bold">{{ $message }}</div>
            @enderror
            <div class="form-group col-sm-10">
                <label>Roles</label>
                @can('user-ecriture', 'role')
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
                @endcan
            </div>


            @error('group')
            <div class="alert text-danger font-weight-bold">{{ $message }}</div>
            @enderror
            <div class="form-group col-sm-10">
                <label>Groupes</label>
                @can('user-ecriture', 'groupe')
                <select class="form-control" name="group">
                    <option value="">Choisir un groupe...</option>
                    @foreach ($groups as $item)
                    @if ($item->id==$user->group->contains($item->id))

                    <option selected value="{{$item->id}}">{{$item->nom}}</option>
                    @else

                    <option value="{{$item->id}}">{{$item->nom}}</option>
                    @endif
                    @endforeach
                </select>
                @endcan
            </div>



        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Editez le user</button>
        </div>
        <!-- /.card-footer -->
    </form>
</div>
@stop

@section('css')
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection
