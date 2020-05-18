@extends('adminlte::page')

@section('content')
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Associer une matière à un utilisateur</h3>
    </div>
    
    <form class="form-horizontal" action="{{route('saveMatiere', $user->id)}}" method="POST">
        @csrf
        <div class="card-body">
            <label class="mt-2" for="">Matières</label>
            <div class="form-group row mt-2">
                @foreach ($matieres as $item)
                <div class="form-check col-lg-2">
                    <input class="form-check-input" type="checkbox" name="matiere[]" value="{{$item->id}}">
                    <label class="form-check-label">{{$item->nom}}</label>
                </div>
                @endforeach
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Associer les matières</button>
        </div>
        <!-- /.card-footer -->
    </form>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection
