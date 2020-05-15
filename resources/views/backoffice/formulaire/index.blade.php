@extends('adminlte::page')

@section('content')

<div class="card">
    
    <div class="card-header bg-info">
        <h3 class="card-title">Base de données pour les formulaires</h3>
    </div>
    @if (session()->has('msg'))
    <div class="card-header alert alert-success alert-dismissible fade show" formulaire="alert">
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
                    <th>Titre</th>
                    <th>Intérêts</th>
                    <th>Action: EDIT & DELETE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($formulaires as $item)
                <tr>
                    <td>{{$item->titre}}</td>
                    <td>
                        <ul class="row">
                            @foreach ($item->interets as $interet)
                        <li class="col-lg-5">{{$interet->nom}}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td class="d-flex"><a href="{{route('formulaire.edit', $item->id)}}"
                            class="btn btn-warning mr-3">Edit</a>
                        <form action="{{route('formulaire.destroy', $item->id)}}" method="POST">@csrf
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