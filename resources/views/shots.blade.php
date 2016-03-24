@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
        @foreach ($shots as $shot)  
            <div class="col-md-3">
                <div class="thumbnail">
                    <a href="" class="thumbnail" data-toggle="modal" data-target="#shot-{{$shot->id}}">
                        <img src="/images/{{$shot -> image }}" class="img-responsive img-rounded" width="500"/>
                    </a> 
                     <div class="caption">
                        <h3> {{ $shot -> title }} by {{ $shot -> user -> name }}</h3>
                        <time> {{ $shot->created_at->format('d M Y') }}</time>
                     </div>
                </div>
                
                <div class="modal fade" id="shot-{{$shot->id}}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel">{{$shot->title}}</h4>
                            </div>
                            <div class="modal-body">
                                <img src="/images/{{$shot -> image }}" class="img-responsive img-rounded" width="900"/> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
@endsection
