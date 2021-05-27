@extends('layouts.main')

@section('aside')
aside
@endsection

@section('mainblock')
    @include('wall.create_post')

    @foreach ($posts ?? [] as $post)
        @include('wall.singlepost', ['post'=>$post])
    @endforeach
    <div class="pagination-holder">
        {{ $dbposts->links('vendor.pagination.bootstrap-4') }}
    </div>

@endsection
