@extends('pagesmanager::master')
@section('content')
    <br>
    <div class="card">
        <div class="card-header">
            Pages
        </div>
        <div class="card-body">
            <form action="{{route('pages.store')}}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label class="col-form-label">Name</label>
                    <input class="form-control" type="text" name="title" placeholder="Page title" required>
                </div>

                <div class="form-group">
                    <label class="col-form-label">Slug</label>
                    <input class="form-control" type="text" name="slug" placeholder="Page slug">
                </div>

                <div class="form-group">
                    <label class="col-form-label">Cover</label>
                    <input class="form-control" type="file" name="cover" required>
                </div>

                <div class="form-group">
                    <label class="col-form-label">Body</label>
                    <textarea class="form-control" name="body" cols="30" rows="10"></textarea>
                </div>

                <button class="btn btn-primary" type="submit">Create</button>
            </form>
        </div>
    </div>
@endsection