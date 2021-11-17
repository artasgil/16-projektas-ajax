@extends('layouts.app')


@section('content')
    <div class="container">


                    <h2>{{ $company->id }} {{ $company->title }} </h2>
                    <p>{!! $company->description !!} </p>
                    <p>{{ $company->address}} <p>


                    @foreach ($clients as $client)
                    <p>{{ $client->id}} </p>
                    <p>{{ $client->name}} </p>
                    <p>{{ $client->surname}} </p>
                    @endforeach


        {{-- <table class="table table-striped">

            <tr>
                <th> ID </th>
                <th> Title </th>
                <th> Description </th>
                <th> Address </th>
                <th> Company has total clients </th>

                <th> Action </th>
                <th> Delete </th>




            </tr>

            @foreach ($companies as $company)
                <tr>
                    <td>{{ $company->id }} </td>
                    <td>{{ $company->title }} </td>
                    <td>{!! $company->description !!} </td>
                    <td>{{ $company->address}} </td>
                    <td>{{ $company->companyClients->count()}} </td>

                        <td>
                        <div class="btn-group-vertical">
                            <a href="{{ route('company.show', [$company]) }}" class="btn btn-secondary">Show </a>
                            <a href="{{ route('company.edit', [$company]) }}" class="btn btn-primary">Edit </a>
                        </div>
                        <td>
                        <form method="post" action={{ route('company.destroy', [$company]) }}>
                            @csrf
                            <button type="submit" class="btn btn-danger">DELETE</button>
                        </form>
                        <td>
                    </td>
            @endforeach
        </table> --}}


    </div>
@endsection
