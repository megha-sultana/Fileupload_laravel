<!-- resources/views/display_files.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Uploaded Files</title>
    <!-- Add any additional styling or scripts here -->
</head>
<body>
    <h1>Uploaded Files</h1>
    @if($files->count() > 0)
        <ul>
            @foreach($files as $file)
                <li>
                    <a target="_blank" href="{{ asset('storage/uploads/'.$file->filename) }}">{{ $file->filename }}</a>
                </li>
            @endforeach
        </ul>
    @else
        <p>No files uploaded yet.</p>
    @endif
</body>
</html>
