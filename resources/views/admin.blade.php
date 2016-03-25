@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/admin/create" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                {!! csrf_field() !!}
        
                <input type="text" name="title" class="form-control" id="shot-title" placeholder="Title" />
                <input type="file" name="image" class="form-control" id="shot-image" />
            
                <button type="submit" class="btn btn-default">Add</button> 
            </div>   
        </form>
        
        <hr>
        
        <div class="row">
        
        @foreach ($shots as $shot)
        	<div class="col-md-4">
	        	<a href="#" class="thumbnail" data-toggle="modal" data-target="#shot-{{ $shot->id }}">
	            	<img src="/images/{{$shot -> image }}" />
	            </a>
            
            	<p> {{ $shot -> title }} </p>
            
	            <form action="/admin/delete/{{ $shot -> id }}" method="POST">
	                {!! csrf_field() !!}
	                {!! method_field('DELETE') !!}
	        
	                <button type="submit" class="btn btn-primary">Delete</button>
	            </form>
	            
	            <div class="modal fade" id="shot-{{ $shot->id }}" tabindex="-1" role="dialog" aria-labelledby="{{$shot->title}}">
	                <div class="modal-dialog" role="document">
	                    <div class="modal-content">
	                        <div class="modal-header">
	                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                                <span aria-hidden="true">&times;</span>
	                            </button>
	                            <h4 class="modal-title" id="{{$shot->title}}">{{$shot->title}}</h4>
	                        </div>
	                        <div class="modal-body">
	                            <img src="/images/{{ $shot -> image }}">
	                        </div>
	                    </div>
	                </div>
	            </div>
            </div>
        @endforeach
        </div>
    </div>
@endsection