@extends('layouts.app_layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col text-center">
            <h5> this message sent by   <strong>{{$emitted}}</strong></h5>
            <p class="class alert alert-danger p-3 text-center mb-5">
                this message send
            </p>
            <h4 class="alert alert-info p-5 text-center">
                {{$message}}
            </h4>
            <div class="my-5">
               <a href="{{route('main_index')}}" class="btn btn-primary">come back</a>
            </div>
        </div>
    </div>
</div>

@endsection
