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
            <div class="form-group row" id="date">
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

            @error('etat')
            <div class="alert text-danger font-weight-bold">{{ $message }}</div>
            @enderror
            <div class="form-group col-sm-10">
                <label>Etat</label>
                <select class="form-control" name="etat" id='etat'>
                    <option value="En cours">En cours</option>
                    <option value="Terminé">Terminé</option>
                    <option value="Futur">Futur</option>
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
@section('js')
<script>
    let select = document.getElementById('etat');
    let date= document.getElementById('date');
    if(select.value!='En cours'){
        date.style.display='block'
    }else{
        date.style.display='none'

    }
select.addEventListener('change',function(e){
    if(e.target.value!='En cours'){
        date.style.display='block'
    }else{
        date.style.display='none'

    }
    
})
</script>
<script src="{{asset('js/admin.js')}}"></script>
@endsection