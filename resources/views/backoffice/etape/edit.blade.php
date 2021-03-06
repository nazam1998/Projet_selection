@extends('adminlte::page')

@section('content')
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Formulaire d'edit de l'étape</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" action="{{route('etape.update',$etape)}}" method="POST">
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
                        value="@if($errors->first('titre')){{$etape->titre}}@else{{old('titre',$etape->titre)}}@endif"
                        id="inputEmail3" placeholder="Veuillez saisir le titre de l'étape">
                    <i class="fas fa-arrow-down input-icon"></i>
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
                    value="@if($errors->first('date')){{$etape->date->format('Y-m-d')}}@else{{old('date',$etape->date->format('Y-m-d'))}}@endif"
                    id="inputEmail3" placeholder="Veuillez saisir le date de l'évènement">
            </div>
        </div>
        <div class="form-group row">
            @error('description')
            <div class="alert text-danger font-weight-bold">{{ $message }}</div>
            @enderror
            <div class="col-sm-10">
                <label>Description</label>
                <input type="text" name="description" class="form-control @error('description') is-invalid @enderror"
                    id="inputEmail3" placeholder="Veuillez saisir la description de l'évènement"
                    value="@if($errors->first('description')){{$etape->description}}@else{{old('description',$etape->description)}}@endif">
                <i class="fas fa-arrow-down input-icon"></i>
                <datalist id="description">
                    @foreach ($descriptions as $item)
                    <option value="{{$item->description}}">{{$item->description}}</option>
                    @endforeach
                </datalist>
            </div>
        </div>
</div>



</div>
<!-- /.card-body -->
<div class="card-footer">
    <button type="submit" class="btn btn-info">Editez l'étape</button>
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
