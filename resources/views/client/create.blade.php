@extends('layouts.app')

@section('content')


    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Client') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('client.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="clientName"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Client name') }}</label>

                                <div class="col-md-6">
                                    <input id="clientName" type="text" class="form-control @error('clientName') is-invalid @enderror" name="clientName" autofocus>
                                        @error('clientName')
                                        <span role="alert" class="invalid-feedback">
                                            <strong>*{{$message}}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="clientSurname"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Client surname') }}</label>

                                <div class="col-md-6">
                                    <input id="clientSurname" type="text" class="form-control @error('clientSurname') is-invalid @enderror" name="clientSurname" autofocus>
                                        @error('clientSurname')
                                        <span role="alert" class="invalid-feedback">
                                            <strong>*{{$message}}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="clientDescription"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Client description') }}</label>

                                <div class="col-md-6">
                                    <textarea class="summernote @error('clientDescription') is-invalid @enderror" cols="38" rows="5"
                                        name="clientDescription" id="clientDescription"> </textarea>
                                        @error('clientDescription')
                                        <span role="alert" class="invalid-feedback">
                                            <strong>*{{$message}}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </div>


                            <div class="form-group row clientCompany">
                                <label for="clientCompany"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Client company') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control @error('clientCompany') is-invalid @enderror" name="clientCompany" id="clientCompany">
                                        @foreach ($companies as $company)
                                            <option value="{{ $company->id }}">{{ $company->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('clientCompany')
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
                            <input type="checkbox" id="companyNew" name="companyNew" value="1" />
                            <span>Add new company? </span>
                                </div>
                            </div>

                            <div class="company-info d-none">
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
                                        class="col-md-4 col-form-label text-md-right">{{ __('Company address') }}</label>

                                    <div class="col-md-6">
                                        <input id="companyAddress" type="text" class="form-control @error('companyAddress') is-invalid @enderror" name="companyAddress" autofocus>
                                            @error('companyAddress')
                                            <span role="alert" class="invalid-feedback">
                                                <strong>*{{$message}}</strong>
                                            </span>
                                            @enderror
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

    $("#companyNew").click(function() {
    $(".company-info").toggleClass("d-none");
    $(".clientCompany").toggleClass("d-none");


    });
});


</script>



@endsection
