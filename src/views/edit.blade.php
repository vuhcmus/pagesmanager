@extends('pagesmanager::master')
@section('content')
    <br>
    <div class="card">
        <div class="card-header">
            Pages
        </div>
        <div class="card-body">
            <form action="{{route('pages.update',$page->id)}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                @include('pagesmanager::partial')
                <button class="btn btn-primary" type="submit">Create</button>
            </form>
        </div>
    </div>
@endsection