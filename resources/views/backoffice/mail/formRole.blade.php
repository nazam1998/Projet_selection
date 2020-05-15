@extends('adminlte::page')

@section('content')

<form action="{{route('mailing.store')}}" method="POST">
    @csrf 

    <div class="form-group">
        <label>Roles</label>
        @error('role_id')
        <div class="alert text-danger font-weight-bold">{{ $message }}</div>    
        @enderror
        @error('user_id')
        <div class="alert text-danger font-weight-bold">{{ $message }}</div>    
        @enderror
        @error('group_id')
        <div class="alert text-danger font-weight-bold">{{ $message }}</div>    
        @enderror
        <select class="form-control" name="role_id">
          <option>Choisir un role...</option>
            @foreach ($roles as $item)
                <option value="{{$item->id}}">{{$item->nom}}</option>
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