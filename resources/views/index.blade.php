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
    <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="path">
        <input type="file" name="path1">
        <input type="file" name="path2">
        <button type="submit">Tải lên</button>
    </form>

    @if ($files)
        <table>
            <tr>
                <td>Id</td>
                <td>Path</td>
                <td>Path1</td>
                <td>Path2</td>
            </tr>

            @foreach ($files as $file)
            <tr>
                <td>{{ $file->id }}</td>
                <td><img width="100px" src="{{asset('storage/'.$file->path)}}"></td>
                <td><img width="100px" src="{{asset('storage/'.$file->path1)}}"></td>
                <td><img width="100px" src="{{asset('storage/'.$file->path2)}}"></td>
            </tr>
            @endforeach
        </table>
    @endif
</body>
</html>