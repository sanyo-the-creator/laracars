<h2>Listings</h2>

@foreach($listings as $listing)
<h2>
    <a href="/listing/{{ $listing['id'] }}">
        {{$listing['title']}}
    </a>
</h2>
<p>
    {{$listing['desc']}}
</p>
@endforeach