@extends('adminlte::page')

@section('content')

@if (session()->has('msg'))
<div class="card-header alert alert-success alert-dismissible fade show" role="alert">
    <h3 class="card-title">{{session('msg')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </h3>
</div>
@endif

<div class="card">
    <div class="card-header bg-info">
        <h3 class="card-title">Base de données pour les utilisateurs</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th class="text-center">Action: EDIT & DELETE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
                <tr>
                    <td>{{$item->nom}}</td>
                    <td>{{$item->prenom}}</td>
                    <td>{{$item->email}}</td>
                    <td class="d-flex justify-content-center">
                        @if ($item->deleted_at)
                        <a href="{{route('users.restore', $item->id)}}"
                            class="btn btn-info mr-3">Restore</a>
                            <form action="{{route('users.forceDestroy', $item->id)}}" method="POST">@csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-warning">Force Delete</button>
                            </form>
                        @else  
                            <a href="{{route('users.edit', $item->id)}}"
                                class="btn btn-danger mr-3">Edit</a>
                                <form action="{{route('users.destroy', $item->id)}}" method="POST">@csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-warning">Delete</button>
                                </form>
                        @endif
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
