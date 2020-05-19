@extends('adminlte::page')

@section('content')

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
        <h3 class="card-title">Base de données pour l'annonce</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>Texte</th>
                    <th>Date</th>
                    <th class="text-center">Afficher</th>
                    <th class="text-center">Action: EDIT</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($annonce as $item)
                <tr>
                    <td>{{$item->texte}}</td>
                    <td>{{$item->date->format('d/m/Y')}}</td>
                    <td class="text-center"><i class="fas @if($item->afficher)fa-check text-success @else fa-times text-danger @endif"></i></td>
                    <td class="text-center"><a href="{{route('annonce.edit', $item->id)}}"
                            class="btn btn-warning mr-3">Edit</a>
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