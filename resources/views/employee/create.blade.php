@extends("layout.app")
@section("content")

<div class="container col-6">
    @if ($errors->any())
    <div class="alert alert-danger mx-auto">
        @foreach ($errors->all() as $error)
        <h4>{{ $error }}</h4>

        @endforeach
    </div>

    @endif
    <div class="card">
        <div class="card-body">
           <form action="{{ route('employee.store') }}" method="POST" >
            @csrf
            <div class="form-group">
                <label> Employee Name </label>
                <input type="text" class="form-control" name="empName">
            </div>
                <div class="form-group">
                <label> Employee Salary </label>
                <input type="text" class="form-control" name="empSalary">
            </div>
            <button class="btn btn-info" name="send" type="submit">Send Data</button>
           </form>
        </div>
    </div>
</div>

@endsection
