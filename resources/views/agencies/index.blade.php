@extends('welcome')

@section('content')
<title>Agencies List</title>
</head>
<body>
    <h1>Agencies List</h1>

    @if($agencies->isEmpty())
        <p>No agencies found.</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>Agency Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($agencies as $agency)
                    <tr>
                        <td>{{ $agency->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
