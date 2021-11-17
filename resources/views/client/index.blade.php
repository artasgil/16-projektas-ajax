@extends('layouts.app')


@section('content')
    <div class="container">



        <table class="table table-striped">

            <tr>
                <th> ID </th>
                <th> Name </th>
                <th> Surname </th>
                <th> Description </th>
                <th> Company </th>
                <th> Action </th>
                <th> Delete </th>




            </tr>

            @foreach ($clients as $client)
                <tr>
                    <td>{{ $client->id }} </td>
                    <td>{{ $client->name }} </td>
                    <td>{{ $client->surname}} </td>
                    <td>{!! $client->description !!} </td>
                    <td>{{ $client->clientCompany->title }}</td>
                    <td>
                        <div class="btn-group-vertical">
                            <a href="{{ route('client.show', [$client]) }}" class="btn btn-secondary">Show </a>
                            <a href="{{ route('client.edit', [$client]) }}" class="btn btn-primary">Edit </a>
                        </div>
                        <td>
                        <form method="post" action={{ route('client.destroy', [$client]) }}>
                            @csrf
                            <button type="submit" class="btn btn-danger">DELETE</button>
                        </form>
                        <td>
                    </td>
            @endforeach
        </table>


    </div>
@endsection
