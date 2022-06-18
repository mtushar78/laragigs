

<h1>{{$heading}}</h1>
@if(count($listings)==0)
    <h3>No listing to show</h3>
@endif


@foreach($listings as $listing)
    <a href="/listing/{{$listing["id"]}}"><h2>{{$listing['title']}}</h2></a>
    <p>{{$listing['description']}}</p>
@endforeach
