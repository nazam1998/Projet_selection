@extends('adminlte::page')

@section('content')
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Formulaire d'ajout de roles</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" action="{{route('role.store')}}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nom du role</label>
                @error('nom')
                <div class="alert text-danger font-weight-bold">{{ $message }}</div>
                @enderror
                <div class="col-sm-10">
                    <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror"
                        value="@if($errors->first('nom'))@else{{old('nom')}}@endif" id="inputEmail3"
                        placeholder="Veuillez saisir un role">
                </div>
            </div>
            <label for="">Permission</label>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="full" value="full">
                    <label class="form-check-label">Tout les droits</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="lecture" value="lecture">
                    <label class="form-check-label">Lecture Seulement</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="annonce" value="annonce_écriture">
                    <label class="form-check-label">Annonce écriture</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="annonce" value="annonce_lecture">
                    <label class="form-check-label">Annonce lecture</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="groupe">
                    <label class="form-check-label">Groupe</label>
                </div>
                <label for="">Candidat</label>

                <div class="row">

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="candidat_full">
                        <label class="form-check-label">Tous</label>
                    </div>
                    @foreach ($candidat_lectures as $item)
                    <div class="form-check mx-5">
                    <input class="form-check-input" type="checkbox" name="candidat_lecture[]" value="{{substr($item->nom,17)}}">
                        <label class="form-check-label">{{substr($item->nom,17)}}</label>
                    </div>
                    @endforeach

                </div>

                <label for="">Users Ecriture</label>

                <div class="row">
                    @foreach ($user_ecritures as $item)
                    <div class="form-check mx-5">
                        <input class="form-check-input" value="{{substr($item->nom,14)}}" type="checkbox" name="user_ecriture[]">
                        <label class="form-check-label">{{substr($item->nom,14)}}</label>
                    </div>
                    @endforeach

                </div>

                <label for="">Users Lecture</label>

                <div class="row">
                    @foreach ($user_lectures as $item)
                    <div class="form-check mx-5">
                        <input class="form-check-input" value="{{substr($item->nom,13)}}" type="checkbox" name="user_lecture[]">
                        <label class="form-check-label">{{substr($item->nom,13)}}</label>
                    </div>
                    @endforeach
                </div>

                <label for="">Suivi</label>

                <div id="suivi" class="my-3">
                    <div class="row mx-auto">
                        <div class="col-5 offset-2">

                            <input class="form-check-input" type="checkbox" name="suivi_ecriture[]">
                            <label class="form-check-label">Ecriture</label>
                        </div>

                        <div class="col-5">


                            <input class="form-check-input" type="checkbox" name="suivi_lecture[]">
                            <label class="form-check-label">Lecture</label>
                        </div>
                    </div>

                    <label>Role</label>
                    <select class="form-control" name="suivi_role[]">
                        @foreach ($roles as $item)
                        <option value="{{$item->id}}">{{$item->nom}}</option>
                        @endforeach
                    </select>
                    <div class="row offset-2">
                      <input class="form-check-input" type="checkbox" name="suivi_responsable[]">
                      <label class="form-check-label">Seulement responsable</label>
                    </div>
                </div>


            </div>
            <button type="button" id="dupliquer" class="btn btn-info mx-auto">Dupliquer</button>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Ajoutez le role</button>
        </div>
        <!-- /.card-footer -->
    </form>
</div>
@stop

@section('css')
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection

@section('js')
<script>
    let button = document.getElementById('dupliquer');



var i = 0;
var original = document.getElementById('suivi');

function duplicate() {
    var clone = original.cloneNode(true);
    clone.id = "suivi" + ++i;
    original.parentNode.appendChild(clone);

    let temp = document.createElement('button');
    temp.type = 'button';
    temp.innerHTML = '&times;';
    temp.className = 'btn btn-danger remove';
    temp.style.width='100%';
    clone.appendChild(temp);

    let remove = document.querySelectorAll('.remove');
    remove.forEach(e => {
        e.addEventListener('click', function (event) {
            event.currentTarget.parentElement.remove();
        });
    });
}

button.addEventListener('click', duplicate);

</script>
<script src="{{asset('js/admin.js')}}"></script>
@endsection
