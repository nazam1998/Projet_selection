@extends('adminlte::page')

@section('content')

<div class="card">

    <div class="card-header bg-info">
        <h3 class="card-title">Base de données pour les messages envoyés </h3>
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
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Role</th>
                    <th class="text-center">Groupe</th>
                    <th class="text-center">Message</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mailings as $item)
                <tr>

                    <td>
                        @if ($item->user_id!=null)
                        {{$item->user->nom}}
                        @else
                            /
                        @endif
                    </td>
                    <td>
                        @if ($item->user_id!=null)
                        {{$item->user->prenom}}
                        @else
                        /
                        @endif
                    </td>
                    <td class="text-center">
                        @if ($item->user_id!=null)
                        {{$item->user->email}}
                        @else
                        /
                        @endif
                    </td>
                    <td class="text-center">
                        @if ($item->role_id!=null)
                        {{$item->role->nom}}
                        @else
                        /
                        @endif
                    </td>
                    <td class="text-center">
                        @if ($item->group_id!=null)
                        {{$item->group->nom}}
                        @else
                        /
                        @endif
                    </td>
                    <td class="text-center">{{$item->message}}</td>
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