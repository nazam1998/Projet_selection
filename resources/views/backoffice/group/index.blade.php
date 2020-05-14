@extends('adminlte::page')

@section('content')

<div class="card">
    
    <div class="card-header bg-info">
        <h3 class="card-title">Base de données pour les groupes</h3>
    </div>
    @if (session()->has('msg'))
    <div class="card-header alert alert-success alert-dismissible fade show" role="alert">
        <h3 class="card-title">{{session('msg')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
        </h3>
    </div>
    @endif
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>Nom du groupe</th>
                    <th>Responsable appartenant à ce groupe</th>
                    <th>Coach appartenant à ce groupe</th>
                    <th>Action: SHOW & EDIT & DELETE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($groups as $item)
                <tr>
                    <td>{{$item->nom}}</td>
                    <td>{{$item->responsable->nom}}</td>
                    <td>@if($item->coach != null){{$item->coach->nom}}@endif</td>
                    <td class="d-flex"><a href="{{route('group.show', $item->id)}}"
                        class="btn btn-primary mr-3">Show</a>
                        <a href="{{route('group.edit', $item->id)}}"
                            class="btn btn-warning mr-3">Edit</a>
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
