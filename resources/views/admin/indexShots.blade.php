@extends('layouts.app')

@section('content')

@foreach ($shots as $shot)
    <img src="/images/{{$shot -> image }}" /> 
    <p> {{ $shot -> title }} </p>
    <form action="/admin/shots/delete/{{ $shot -> id }}" method="POST">
        {!! csrf_field() !!}
        {!! method_field('DELETE') !!}
        
        <button type="submit">Delete</button>
    </form>
@endforeach

@endsection