<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UploadedFile</title>
</head>
<body>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('update', $file) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <img width="100px" src="{{asset('storage/'.$file->path)}}">
        <input type="file" name="path">
        <br>
    
        <img width="100px" src="{{asset('storage/'.$file->path1)}}">
        <input type="file" name="path1">
        <br>
    
        <img width="100px" src="{{asset('storage/'.$file->path2)}}">
        <input type="file" name="path2">
        <br>

        <button type="submit">Update</button>
    </form>
</body>
</html>