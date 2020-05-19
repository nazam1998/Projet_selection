@extends('adminlte::page')

@section('content')
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Formulaire d'edit de l'annonce</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" action="{{route('annonce.update', $annonce)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body mx-auto">

            <div class="form-group mx-auto">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Texte</label>
                @error('texte')
                <div class="alert text-danger font-weight-bold">{{ $message }}</div>
                @enderror
                <div class="col-sm-10">
                    <textarea name="texte" class="form-control @error('texte') is-invalid @enderror"
                        id="inputEmail3">@if($errors->first('texte')){{$annonce->texte}}@else{{old('texte', $annonce->texte)}}@endif</textarea>
                </div>
            </div>
            <div class="form-group mx-auto">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Date</label>
                @error('date')
                <div class="alert text-danger font-weight-bold">{{ $message }}</div>
                @enderror
                <div class="col-sm-10">
                    <input type="date" name="date" class="form-control @error('date') is-invalid @enderror"
                        id="inputEmail3"
                        value="@if($errors->first('date')){{$annonce->date}}@else{{old('date', $annonce->date->format('Y-m-d'))}}@endif">
                </div>
            </div>

            <div class="form-group row">
                <div class="form-check mx-auto">
                    @if ($annonce->afficher)

                    <input style="margin-top: 37px;" checked class="form-check-input" type="checkbox" name="afficher">

                    @else

                    <input style="margin-top: 37px;" class="form-check-input" type="checkbox" name="afficher">

                    @endif
                    <label style="margin-top: 30px;" class="form-check-label">Afficher</label>
                </div>
                @error('afficher')
                <div class="alert text-danger font-weight-bold">{{ $message }}</div>
                @enderror
            </div>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Editez l'annonce</button>
        </div>
        <!-- /.card-footer -->
    </form>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection