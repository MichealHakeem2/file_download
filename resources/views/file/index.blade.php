@extends("layout.app")
@section("content")
<div class="container col-6">
    @if (Session::has("done"))
<div class="alert alert-success">
    {{ Session::get('done') }}
</div>
@endif
    @if (Session::has("delete"))
<div class="alert alert-danger">
    {{ Session::get('delete') }}
</div>
@endif
    <div class="card">
        <div class="card-body">
            <table class="table">
                <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>File uploded</th>
                <th>Action</th>
            </tr>
                @foreach ($files as $data)
                   <tr>
                    <td> {{ $data->id }} </td>
                    <td> {{ $data->title }} </td>
                    <td> {{ $data->description }} </td>
                    <td> <a href="{{ route('file.show', $data->id) }}" class="btn btn-primary">Show</a></td>
                    <td> <a href="{{ route('file.destroy', $data->id) }}" class="btn btn-danger">Delete</a> </td>
                    <td> <a href="{{ route('file.edit', $data->id) }}" class="btn btn-info">Edit</a> </td>
                   </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection
