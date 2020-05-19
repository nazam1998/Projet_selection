@extends('adminlte::page')

@section('content')
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Formulaire de modification du roles</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" action="{{route('role.update',$role)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nom du role</label>
                @error('nom')
                <div class="alert text-danger font-weight-bold">{{ $message }}</div>
                @enderror
                <div class="col-sm-10">
                    <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror"
                        value="@if($errors->first('nom')){{$role->nom}}@else{{old('nom',$role->nom)}}@endif"
                        id="inputEmail3" placeholder="Veuillez saisir un role">
                </div>
            </div>
            <label for="">Permission</label>
            <div class="form-group">
                <div class="form-check">
                    @if($role->permissions->contains(1))

                    <input checked class="form-check-input" type="checkbox" name="full" value="full">
                    @else
                    <input class="form-check-input" type="checkbox" name="full" value="full">

                    @endif
                    <label class="form-check-label">Tout les droits</label>
                </div>
                <div class="form-check">
                    @if(!$role->permissions->contains(App\Permission::where('nom','LIKE','%ecriture%')->first()->id))

                    <input checked class="form-check-input" type="checkbox" name="lecture" value="lecture">
                    @else
                    <input class="form-check-input" type="checkbox" name="lecture" value="lecture">

                    @endif
                    <label class="form-check-label">Lecture Seulement</label>
                </div>
                <div class="form-check">
                    @if($role->permissions->contains(App\Permission::where('nom','annonce-ecriture')->first()->id))
                    <input checked class="form-check-input" type="checkbox" name="annonce">

                    @else
                    <input class="form-check-input" type="checkbox" name="annonce">
                    @endif
                    <label class="form-check-label">Annonce Ecriture</label>
                </div>
                <div class="form-check">
                    @if($role->permissions->contains(App\Permission::where('nom','annonce-lecture')->first()->id))
                    <input checked class="form-check-input" type="checkbox" name="annonce-lecture">

                    @else
                    <input class="form-check-input" type="checkbox" name="annonce-lecture">
                    @endif
                    <label class="form-check-label">Annonce Lecture</label>
                </div>
                <div class="form-check">
                    @if($role->permissions->contains(App\Permission::where('nom','groupe')->first()->id))

                    <input checked class="form-check-input" type="checkbox" name="groupe">
                    @else
                    <input class="form-check-input" type="checkbox" name="groupe">
                    @endif
                    <label class="form-check-label">Groupe</label>
                </div>
                <label for="">Candidat</label>

                <div class="row">

                    <div class="form-check">
                        @if($role->permissions->contains(App\Permission::where('nom','candidat-full')->first()->id))

                        <input checked class="form-check-input" type="checkbox" name="candidat-full">
                        @else
                        <input class="form-check-input" type="checkbox" name="candidat-full">

                        @endif
                        <label class="form-check-label">Tous</label>
                    </div>
                    @foreach ($candidat_lectures as $item)
                    <div class="form-check mx-5">
                        @if($role->permissions->contains($item->id))
                        <input checked class="form-check-input" type="checkbox" name="candidat-lecture[]">

                        @else
                        <input class="form-check-input" type="checkbox" name="candidat-lecture[]">

                        @endif
                        <label class="form-check-label">{{substr($item->nom,17)}}</label>
                    </div>
                    @endforeach

                </div>

                <label for="">Users Ecriture</label>

                <div class="row">
                    @foreach ($user_ecritures as $item)
                    <div class="form-check mx-5">
                        @if($role->permissions->contains($item->id))

                        <input checked class="form-check-input" type="checkbox" name="user-ecriture[]">
                        @else
                        <input class="form-check-input" type="checkbox" name="user-ecriture[]">
                        @endif

                        <label class="form-check-label">{{substr($item->nom,14)}}</label>
                    </div>
                    @endforeach

                </div>

                <label for="">Users Lecture</label>

                <div class="row">
                    @foreach ($user_lectures as $item)
                    <div class="form-check mx-5">
                        @if($role->permissions->contains($item->id))

                        <input checked class="form-check-input" type="checkbox" name="user-lecture[]">
                        @else
                        <input class="form-check-input" type="checkbox" name="user-lecture[]">

                        @endif
                        <label class="form-check-label">{{substr($item->nom,13)}}</label>
                    </div>
                    @endforeach

                </div>


            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Editez le role</button>
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
@endsection