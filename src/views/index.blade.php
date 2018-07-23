@extends('pagesmanager::master')
@section('content')
<br>
<div class="card">
    <div class="card-header">
        Pages
    </div>
    <div class="card-body">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Cover</th>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Created At</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pages as $page)
                <tr>
                    <td><img src="{{ Storage::url($page->cover) }}" alt="{{$page->title}}" width="150px" class="thumbnail"></td>
                    <th scope="row">{{$page->id}}</th>
                    <td>{{$page->title}}</td>
                    <td>{{$page->slug}}</td>
                    <td>{{$page->created_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection