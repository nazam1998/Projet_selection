@extends('adminlte::page')

@section('content')

<form action="{{route('mailing.store')}}" method="POST">
    @csrf 

    <div class="form-group">
        <label>Users</label>
        <select class="form-control" name="user_id">
          <option>Choisir un user...</option>
            @foreach ($users as $item)
                <option value="{{$item->id}}">{{$item->nom}}</option>
            @endforeach
        </select>
      </div>


        <div style="margin-bottom: 10px;">
            <label class="light" for="">Message</label>
            <textarea name="message" id="" cols="30" rows="10"></textarea>
        </div>
        <div style="margin-top: 15px;" class="text-center">
            <button class="btn btn-blue" type="submit">Send</button>
        </div>
</form>

@stop