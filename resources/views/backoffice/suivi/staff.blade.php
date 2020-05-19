@extends('adminlte::page')

@section('content')
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Filtrer Par Groupe</h3>
    </div>

    <form class="form-horizontal" action="{{route('staff.group')}}" method="GET">
        <div class="card-body">
            <div class="form-group row mt-2">
                @foreach ($groups as $item)
                <div class="form-check col-lg-2">
                    <input class="form-check-input" type="checkbox" name="group[]" value="{{$item->id}}">
                    <label class="form-check-label">{{$item->nom}}</label>
                </div>
                @endforeach
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Filtrer</button>
        </div>
        <!-- /.card-footer -->
    </form>
</div>


@if (session()->has('msg'))
<div class="card-header alert alert-success alert-dismissible fade show" role="alert">
    <h3 class="card-title">{{session('msg')}}
        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </h3>
</div>
@endif

<div class="card">
    <div class="card-header bg-info">
        <h3 class="card-title">Base de données pour les suivis des staffs</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>Groupe</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th class="text-center">Actions: SHOW</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
                <tr>
                    <td>
                        @if (!$item->group->first() || $item->group == null)
                        Pas de groupe

                        @else
                        <a href="{{route('group.show', $item->group->first()->id)}}">{{$item->group->first()->nom}} </a>
                        @endif
                    <td>{{$item->nom}}</td>
                    <td>{{$item->prenom}}</td>
                    <td>{{$item->email}}</td>
                    <td class="d-flex justify-content-center"><a href="{{route('staff.show', $item->id)}}"
                            class="btn btn-primary mr-3">Show</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>

@stop

@section('css')
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection

@section('js')
<script src="{{asset('js/admin.js')}}"></script>
@endsection