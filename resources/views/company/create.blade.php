@extends('layouts.app')

@section('content')


    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Company') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('company.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="companyTitle"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Company title') }}</label>

                                <div class="col-md-6">
                                    <input id="companyTitle" type="text" class="form-control @error('companyTitle') is-invalid @enderror" name="companyTitle" autofocus>
                                        @error('companyTitle')
                                        <span role="alert" class="invalid-feedback">
                                            <strong>*{{$message}}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="companyDescription"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Company description') }}</label>

                                <div class="col-md-6">
                                    <textarea class="summernote @error('companyDescription') is-invalid @enderror" cols="38" rows="5"
                                        name="companyDescription" id="companyDescription"> </textarea>
                                        @error('companyDescription')
                                        <span role="alert" class="invalid-feedback">
                                            <strong>*{{$message}}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="companyAddress"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Company  address') }}</label>

                                <div class="col-md-6">
                                    <input id="companyAddress" type="text" class="form-control @error('companyAddress') is-invalid @enderror" name="companyAddress" autofocus>
                                        @error('companyAddress')
                                        <span role="alert" class="invalid-feedback">
                                            <strong>*{{$message}}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </div>

                            {{-- jei checkbox pazymetas - i backenda yra perduodama jo value, 1
                                jei yra nepazymetas - i backenda yra grazinama false --}}
                            <div class="form-group row">
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-4">
                            <input type="checkbox" id="clientsNew" name="clientsNew" value="1" />
                            <span>Add new client? </span>
                                </div>
                            </div>
                            {{-- Kai pazymimas checkbox, turi atsirasti kliento pridejimo forma ir mygtukas Add more Clients,
                                kai paspaudziame Add more clients, atsiranda sekanti forma, bet trui tureti galimybe issitrinti --}}
                            <div class="clients-info d-none">
                                <div class="form-group row">
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-6">
                                <button type="button" class="btn btn-success" id="add-more-clients">Add more Clients</button>
                                </div>
                                </div>
                                <div class="client">
                                <div class="form-group row">
                                    <label for="clientName"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Client name') }}</label>

                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="clientName[]" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="clientSurname"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Client surname') }}</label>

                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="clientSurname[]" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="clientDescription"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Client description') }}</label>

                                    <div class="col-md-6">
                                        <textarea class="summernote from-control" cols="38" rows="5"
                                            name="clientDescription[]"> </textarea>
                                    </div>
                                </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="client-template d-none">
                            <div class="client">
                                <div class="form-group row">
                                    <label for="clientName"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Client name') }}</label>

                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="clientName[]" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="clientSurname"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Client surname') }}</label>

                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="clientSurname[]" autofocus>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger removeClient">Remove</button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="clientDescription"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Client description') }}</label>

                                    <div class="col-md-6">
                                        <textarea class="summernote from-control" cols="38" rows="5"
                                            name="clientDescription[]"> </textarea>
                                    </div>
                                </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote();
        });
    </script>

<script>
    $.ajaxSetup({
headers: {
    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
}
});

$(document).ready(function()  {

    $("#clientsNew").click(function() {
    $(".clients-info").toggleClass("d-none");
    });

    $("#add-more-clients").click(function() {
        //prie clients-info turi prikabinti nauja diva "client"
        // $(".clients-info").append("<div class='client'>Div added</div>");
        $(".clients-info").append($(".client-template").html());
    });

    $(document).on("click", ".removeClient", function() {
        $(this).parents('.client').remove();
    });
});


</script>



@endsection
