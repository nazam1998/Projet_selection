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
<form action="{{route('mailing.storeUser')}}" method="POST">
    @csrf 

    <div class="form-group">
        <label>Users</label>
        @error('user_id')
        <div class="alert text-danger font-weight-bold">{{ $message }}</div>    
        @enderror
        <select class="form-control" name="user_id">
          <option>Choisir un user...</option>
            @foreach ($users as $item)
                <option value="{{$item->id}}">{{$item->nom.' '.$item->prenom}}</option>
            @endforeach
        </select>
      </div>

        <div class="form-group">
            <label class="text-dark" for="">Message</label>
            <textarea class="form-control" name="message"></textarea>
        </div>
        <div style="margin-top: 15px;" class="text-center">
            <button class="btn btnMail text-white" type="submit">Send</button>
        </div>
</form>

@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection

@section('js')
<script src="{{asset('js/admin.js')}}"></script>
@endsection