<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.">
    <style>

        table{
            width: 80%;
            margin: 50px auto 0;
            border-collapse: collapse;

        }
        table th{
            background: #1515af;
            color: #f0f0f0;
            text-align: left;

        }
        thead{
            background-color: #f0f0f0;

        }
       table th,table td{
            padding: 8px;

        }
        .even{
            background-color: #eee;
        }
    </style>
</head>

<body>
    <table border="1">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Content</th>
                </tr>
        </thead>
        <tbody>
            {{-- @if (count($posts) > 0)
            @foreach ($posts as $post )
            <tr>
                <td>{{ $post['id'] }}</td>
                <td>{{ $post['title'] }}</td>
                <td>{{ $post['content'] }}</td>
                </tr>
            @endforeach
            @else
            <tr>
                <td colspan="3">No posts found</td>
            </tr>
            @endif --}}
            @forelse ($posts as $post )
            {{-- found data --}}
            <tr {{ $loop->even? 'class=even':'' }}>
                <td>{{ $post['id'] }}</td>
                <td>{{ $post['title'] }}</td>
                <td>{{ $post['content'] }}</td>
            </tr>
            @empty
            {{-- no data --}}
            <tr>
                <td colspan="3">No posts found</td>
            </tr>
            @endforelse
    </table>
</body>
</html>
