@extends('frontend.master.master')
@section('content')
    <h1>News Details</h1>

    <h1>{{$newsDetails->title}}</h1>
    <img src="{{url('uploads/news/'.$newsDetails->image)}}"
         class="img-responsive" alt="">
    <p>
        {!! $newsDetails->description !!}
    </p>
@endsection
