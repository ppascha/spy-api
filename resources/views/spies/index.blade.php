@extends('welcome')

@section('content')
<h1>Spies List</h1>

@if($spies->isEmpty())
    <p>No spies found.</p>
@else
    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Agency</th>
                <th>Country of Operation</th>
                <th>Date of Birth</th>
            </tr>
        </thead>
        <tbody>
            @foreach($spies as $spy)
                <tr>
                    <td>{{ $spy->name }}</td>
                    <td>{{ $spy->surname }}</td>
                    <td>{{ $spy->agency->name ?? 'N/A' }}</td>  <!-- Handle missing agency -->
                    <td>{{ $spy->country_of_operation }}</td>
                    <td>{{ $spy->date_of_birth }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
</body>
</html>
