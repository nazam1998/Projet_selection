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
                    <td><a href="{{route('group.show', $item->id)}}">
                        @if ($item->group == null && $item->role_id<4)
                        Pas de groupe
                        @elseif($item->role_id == 2)
                            @if ($item->group_responsable->first())
                                
                            {{$item->group_responsable->first()->nom}}
                            @else
                            Pas de groupe
                            @endif
                        @elseif($item->role_id == 5)
                            @if ($item->group_coach->first())
                                
                            {{$item->group_coach->first()->nom}}
                            @else
                            Pas de groupe
                            @endif
                        @else 
                        {{$item->group->first()->nom}}
                        @endif </a>
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