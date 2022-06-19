@extends('layout')
@section('content')
{{--    <h1 class="text-2xl">{{$heading}}</h1>--}}
@include('partials._hero')
@include('partials._search')
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

        @if(count($listings)==0)
            <h3>No listing to show</h3>
        @endif


        @foreach($listings as $listing)
            {{--            <a href="/listing/{{$listing["id"]}}"><h2>{{$listing['title']}}</h2></a>--}}
            {{--            <p>{{$listing['description']}}</p>--}}
          <x-listing-card :listing="$listing"/>
        @endforeach
    </div>
@endsection
