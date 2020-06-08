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
        <h3 class="card-title">Base de données pour les matieres</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th class="text-center">Image</th>
                    <th class="text-center">Action: EDIT & DELETE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($matieres as $item)
                <tr>
                    <td>{{$item->nom}}</td>
                    <td width="40%" class="text-center"><img src="{{asset('storage/'.$item->image)}}" width="8%" alt=""></td>
                    <td class="d-flex justify-content-center"><a href="{{route('matiere.edit', $item->id)}}"
                            class="btn btn-warning mr-2">Edit</a>
                        <form action="{{route('matiere.destroy', $item->id)}}" method="POST">@csrf
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

@section('js')
<script src="{{asset('js/admin.js')}}"></script>
@endsection
