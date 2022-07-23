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
           <form action="{{ route('file.update',$file->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label> File Name </label>
                <input type="text" value="{{ $file->title }}" class="form-control @error('title') is-invalid @enderror" name="title">
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
            <div class="form-group">
                <label> File Description </label>
                <input type="text" value="{{ $file->description }}" class="form-control @error('description') is-invalid @enderror" name="description">
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
               <div class="form-group">
                <label> Upload your File </label>
                <input type="text" value="{{ $file->fileInput }}" class="btn btn-info form-control @error('fileInput') is-invalid @enderror" name="fileInput">
                @error('fileInput')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
            <button class="btn btn-info" name="send" type="submit">Send Data</button>
           </form>
        </div>
    </div>
</div>

@endsection
