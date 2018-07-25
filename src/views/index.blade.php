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
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pages as $page)
                    <tr>
                        <td><img src="{{ Storage::url($page->cover) }}" alt="{{$page->title}}" width="150px"
                                 class="thumbnail"></td>
                        <td scope="row">{{$page->id}}</td>
                        <td>{{$page->title}}</td>
                        <td>{{$page->slug}}</td>
                        <td>{{$page->created_at}}</td>
                        <td>
                            <a href="{{url('pages/'.$page->id.'/edit')}}">
                                <button class="btn btn-sm btn-primary">Edit</button>
                            </a>
                            <a href="{{route('pages.destroy', $page->id)}}">
                                <button class="btn btn-sm btn-danger delete" data-id="{{$page->id}}">Delete</button>
                            </a>
                            <form id="delete-{{$page->id}}"
                                  action="{{ route('pages.destroy', $page->id) }}" method="POST"
                                  style="display: none;">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
<script type="text/javascript">
    jQuery(document).ready(function () {
        $('.delete').click(function () {
            var _id = $(this).attr('data-id');
            $('form#delete'+_id).submit();
        });
    });
</script>