@extends('adminlte::page')

@section('content')
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Formulaire modification de roles</h3>
    </div>
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

            <label class="mt-3" for="">Permission</label>
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
                    <input checked class="form-check-input" type="checkbox" name="annonce" value="annonce-écriture">
                    @else
                    <input class="form-check-input" type="checkbox" name="annonce" value="annonce_écriture">
                    @endif
                    <label class="form-check-label">Annonce écriture</label>
                </div>
                <div class="form-check">
                    @if($role->permissions->contains(App\Permission::where('nom','annonce-lecture')->first()->id))
                    <input checked class="form-check-input" type="checkbox" name="annonce" value="annonce-lecture">
                    @else
                    <input class="form-check-input" type="checkbox" name="annonce" value="annonce-lecture">
                    @endif
                    <label class="form-check-label">Annonce lecture</label>
                </div>
                <div class="form-check">
                    @if($role->permissions->contains(App\Permission::where('nom','groupe')->first()->id))

                    <input checked class="form-check-input" type="checkbox" name="groupe">
                    @else
                    <input class="form-check-input" type="checkbox" name="groupe">
                    @endif
                    <label class="form-check-label">Groupe</label>
                </div>
                <label class="mt-5" for="">Candidat</label>

                <div class="row">
                    <div class="form-check mx-2">
                        @if($role->permissions->contains(App\Permission::where('nom','candidat-full')->first()->id))
                        <input checked class="form-check-input" type="checkbox" name="candidat_full">
                        @else
                        <input class="form-check-input" type="checkbox" name="candidat_full">
                        @endif
                        <label class="form-check-label">Tous</label>
                    </div>
                    @foreach ($candidat_lectures as $item)
                    <div class="form-check mx-2">
                        @if($role->permissions->contains($item->id))
                        <input checked class="form-check-input" value="{{substr($item->nom,17)}}" type="checkbox"
                            name="candidat_lecture[]">
                        @else
                        <input class="form-check-input" value="{{substr($item->nom,17)}}" type="checkbox"
                            name="candidat_lecture[]">
                        @endif
                        <label class="form-check-label">{{substr($item->nom,17)}}</label>
                    </div>
                    @endforeach
                </div>

                <label class="mt-5" for="">Users Ecriture</label>
                <div class="row">
                    @foreach ($user_ecritures as $item)
                    <div class="form-check mx-2">
                        @if($role->permissions->contains($item->id))
                        <input checked class="form-check-input" value="{{substr($item->nom,14)}}" type="checkbox"
                            name="user_ecriture[]">
                        @else
                        <input class="form-check-input" value="{{substr($item->nom,14)}}" type="checkbox"
                            name="user_ecriture[]">
                        @endif
                        <label class="form-check-label">{{substr($item->nom,14)}}</label>
                    </div>
                    @endforeach
                </div>

                <label class="mt-5" for="">Users Lecture</label>
                <div class="row">
                    @foreach ($user_lectures as $item)
                    <div class="form-check mx-2">
                        @if($role->permissions->contains($item->id))
                        <input checked class="form-check-input" value="{{substr($item->nom,13)}}" type="checkbox"
                            name="user_lecture[]">
                        @else
                        <input class="form-check-input" value="{{substr($item->nom,13)}}" type="checkbox"
                            name="user_lecture[]">
                        @endif
                        <label class="form-check-label">{{substr($item->nom,13)}}</label>
                    </div>
                    @endforeach
                </div>

                <label class="mt-5" for="">Suivi</label>
                @if (count($role->roles)==0)


                <div class="row suivi my-1">
                    <div class="row col-4">
                        <div class="form-check mx-2">

                            <input class="form-check-input" type="checkbox" name="suivi_ecriture0">
                            <label class="form-check-label">Ecriture</label>
                        </div>
                        <div class="form-check mx-2">
                            <input class="form-check-input" type="checkbox" name="suivi_lecture0">
                            <label class="form-check-label">Lecture</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <label class="mr-2">Role</label>
                        <select name="suivi_role[]">
                            @foreach ($roles as $item)

                            <option value="{{$item->id}}">{{$item->nom}}</option>

                            @endforeach
                        </select>
                    </div>

                    <div class="col-3 text-center">
                        <input class="form-check-input" type="checkbox" name="suivi_responsable0">
                        <label class="form-check-label">Seulement responsable</label>
                    </div>
                </div>

                @else
                @foreach ($role->roles as $suivi)

                <div class="row suivi my-1">
                    <div class="row col-4">
                        <div class="form-check mx-2">
                            @if ($suivi->pivot)
                            <input checked class="form-check-input" type="checkbox" name="suivi_ecriture0">
                            @else
                            <input class="form-check-input" type="checkbox" name="suivi_ecriture0">
                            @endif
                            <label class="form-check-label">Ecriture</label>
                        </div>
                        <div class="form-check mx-2">
                            @if ($suivi->pivot->auth_id==$role->id)
                            <input checked class="form-check-input" type="checkbox" name="suivi_lecture0">

                            @else
                            <input class="form-check-input" type="checkbox" name="suivi_lecture0">

                            @endif
                            <label class="form-check-label">Lecture</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <label class="mr-2">Role</label>
                        <select name="suivi_role[]">
                            @foreach ($roles as $item)
                            @if ($item->id==$suivi->id)
                            <option selected value="{{$item->id}}">{{$item->nom}}</option>
                            @else
                            <option value="{{$item->id}}">{{$item->nom}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="col-3 text-center">
                        @if ($suivi->responsable)
                        <input checked class="form-check-input" type="checkbox" name="suivi_responsable0">
                            
                        @else
                            
                        <input class="form-check-input" type="checkbox" name="suivi_responsable0">
                        @endif
                        <label class="form-check-label">Seulement responsable</label>
                    </div>
                    @if ($loop->index!=0)

                    <button type="button" style="width: 10%;" class="btn btn-danger col remove">×</button>
                    @endif
                </div>
                @endforeach
                @endif




            </div>
            <button type="button" id="dupliquer" class="btn btnShow text-white mt-3">Dupliquer</button>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Editez le role</button>
        </div>
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
    var original = document.querySelector('.suivi');

    function duplicate() {
        var clone = original.cloneNode(true);
        clone.id = "suivi" + ++i;
        original.parentNode.appendChild(clone);
        let temp = document.createElement('button');
        temp.type = 'button';
        temp.innerHTML = '&times;';
        temp.style.width = '10%';
        temp.className = 'btn btn-danger col remove';
        clone.appendChild(temp);
        let suivi = document.querySelectorAll('.suivi');
        suivi.forEach((element, index) => {

            element.childNodes[1].childNodes[1].childNodes[1].name = 'suivi_ecriture' + index;
            element.childNodes[1].childNodes[3].childNodes[1].name = 'suivi_lecture' + index;
            element.childNodes[5].childNodes[1].name='suivi_responsable'+index;
            
        });

    }
    let remove = document.querySelectorAll('.remove');
    remove.forEach(e => {
        e.addEventListener('click', function (event) {
            console.log('hello');

            event.currentTarget.parentElement.remove();
            let suivi = document.querySelectorAll('.suivi');
            suivi.forEach((element, index) => {
                element.childNodes[1].childNodes[1].childNodes[1].name = 'suivi_ecriture' +
                    index;
                element.childNodes[1].childNodes[3].childNodes[1].name = 'suivi_lecture' +
                    index;
                    element.childNodes[5].childNodes[1].name='suivi_responsable'+index;

            });
        });
    });
    button.addEventListener('click', duplicate);

</script>
<script src="{{asset('js/admin.js')}}"></script>
@endsection
