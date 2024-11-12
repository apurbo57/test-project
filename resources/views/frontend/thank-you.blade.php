@extends('frontend.components.layouts')
@section('content')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-4">
                        <div class="border border-3 border-success"></div>
                        <div class="card bg-white shadow p-5" style="margin-bottom:20px;">
                            <div class="mb-4 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-success" width="75" height="75"
                                    fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                </svg>
                            </div>
                            <div class="text-center">
                                <h1>Thank You !</h1>
                                <p><p class="font-weight-bold">{{$regularStudent->nameE}}</p> for Applying Our Course. We've send the Apply form Download link to you. Please Download it and Visit Our Office. </p>
                                <a class="btn btn-outline-success" href="{{route('regular.form.download',[$regularStudent->id])}}">Download Form</a>
                            </div>
                        </div>
                    </div>
            {{-- <div class="col">
                <div class="text-center">
                    <h2>Thank You</h2>
                <p>Anowar Hossain Apurbo For Applying Our Course.</p>
                <p>Please Download Your Apply Form and Visit Our Office.</p>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
