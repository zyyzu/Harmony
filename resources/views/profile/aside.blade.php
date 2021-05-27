@section('aside')
<h2>Znajomi {{ $friendsCount }}</h2>
@foreach ($friends ?? [] as $friend)
    <div>
        {{$friend['first_name']." ".$friend['last_name']}}
    </div>
@endforeach
@endsection
