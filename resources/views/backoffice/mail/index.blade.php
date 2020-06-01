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

<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Filtrer par role</h3>
    </div>
    <form class="form-horizontal" action="{{route('mailRole')}}" method="GET">
        <div class="card-body">
            <div class="form-group row mt-2">
                @foreach ($roles as $item)
                <div class="form-check col-lg-2">
                    <input class="form-check-input" type="checkbox" name="role[]" value="{{$item->id}}">
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
<div class="card card-info mt-3">
    <div class="card-header">
        <h3 class="card-title">Filtrer Par Groupe</h3>
    </div>
    <form class="form-horizontal" action="{{route('mailGroup')}}" method="GET">
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


<div class="card mt-5">
    <div class="card-header bg-info">
        <h3 class="card-title">Base de données pour les messages envoyés </h3>
    </div>
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

@section('js')
<script src="{{asset('js/admin.js')}}"></script>
@endsection