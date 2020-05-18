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
        <h3 class="card-title">Base de données pour les groupes</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>Nom du groupe</th>
                    <th class="text-center">Responsable appartenant à ce groupe</th>
                    <th class="text-center">Coach appartenant à ce groupe</th>
                    <th class="text-center">Action: SHOW & EDIT & DELETE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($groups as $item)
                <tr>
                    <td>{{$item->nom}}</td>
                    <td class="text-center">{{$item->responsable->nom}}</td>
                    <td class="text-center">@if($item->coach != null){{$item->coach->nom}}@else/@endif</td>
                    <td class="d-flex justify-content-center"><a href="{{route('group.show', $item->id)}}"
                        class="btn btn-primary">Show</a>
                        <a href="{{route('group.edit', $item->id)}}"
                            class="btn btn-warning mx-2">Edit</a>
                        <form action="{{route('group.destroy', $item->id)}}" method="POST">@csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
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