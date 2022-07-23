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
                <th>Name</th>
                <th>Salary</th>
                <th>Action</th>
            </tr>
                @foreach ($emps as $data)
                   <tr>
                    <td> {{ $data->id }} </td>
                    <td> {{ $data->name }} </td>
                    <td> {{ $data->salary }} </td>
                    <td> <a href="{{ route('employee.destroy', $data->id) }}" class="btn btn-danger">Delete</a> </td>
                    <td> <a href="{{ route('employee.edit', $data->id) }}" class="btn btn-info">Edit</a> </td>
                   </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection
