@extends('layouts.app_layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col text-center">
            <h5> a confirmation email was sent to  <strong>{{$email_address}}</strong></h5>
            <p>check your mailbox or spam box</p>
            <div class="my-5">
               <a href="{{route('main_index')}}" class="btn btn-primary">come back</a>
            </div>
        </div>
    </div>
</div>

@endsection
