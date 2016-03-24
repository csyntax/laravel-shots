@extends('layouts.app')

@section('content')
<H1>Create Shot</H1>

<form action="/admin/shots/create" method="POST" enctype="multipart/form-data">
    {!! csrf_field() !!}
    
    <input type="text" name="title" />
    <input type="file" name="image" />
    <input type="hidden" name="user_id" value="{{ Auth::user() -> id }}">
    <button type="submit">Add</button>    
</form>

@endsection