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

            <div class="form-group row" id="date">
                @error('date')
                <div class="alert text-danger font-weight-bold">{{ $message }}</div>
                @enderror
                <div class="col-sm-10">
                    <label>Date</label>
                    <input type="date" name="date" class="form-control @error('date') is-invalid @enderror"
                        value="@if($errors->first('date')){{$evenement->date->format('Y-m-d')}}@else{{old('date',$evenement->date->format('Y-m-d'))}}@endif"
                        id="inputEmail3" placeholder="Veuillez saisir la date de l'évènement">
                </div>
            </div>
            @error('formulaire_id')
            <div class="alert text-danger font-weight-bold">{{ $message }}</div>
            @enderror
            <div class="form-group col-sm-10">
                <label>Formulaire</label>
                <select class="form-control" name="formulaire_id" >
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
                <select class="form-control" name="etat" id="etat">

                    @if ('En cours'==$evenement->etat)
                    <option selected value="En cours">En cours</option>
                    @else
                    <option value="En cours">En cours</option>
                    @endif

                    @if ('Terminé'==$evenement->etat)
                    <option selected value="Terminé">Terminé</option>
                    @else
                    <option value="Terminé">Terminé</option>
                    @endif
                    @if ('Futur'==$evenement->etat)
                    <option selected value="Futur">Futur</option>
                    @else
                    <option value="Futur">Futur</option>
                    @endif

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

@section('js')
<script>


    let button = document.getElementById('dupliquer');



    var i = 0;
    var original = document.getElementById('suivi');

    function duplicate() {
        var clone = original.cloneNode(true);
        clone.id = "my-2 suivi" + ++i;
        original.parentNode.appendChild(clone);
        console.log(clone.childNodes[1].childNodes[1].childNodes[1].name);
        
        clone.childNodes[1].childNodes[1].childNodes[3].name='suivi_lecture'+i;
        clone.childNodes[1].childNodes[1].childNodes[1].name='suivi_ecriture'+i;
        console.log(clone.childNodes[1].childNodes[1].childNodes[1].name);
        let temp = document.createElement('button');
        temp.type = 'button';
        temp.innerHTML = '&times;';
        temp.className = 'btn btn-danger remove';
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