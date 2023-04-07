@extends('layouts.app')
@section('content')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3">
        <div class="container py-5">
            <h1 class="display-5 fw-bold">
                Welcome!
            </h1>
            <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequuntur architecto, optio tempora culpa sequi
                a dolore minus nostrum incidunt tempore quos repudiandae suscipit voluptatum commodi nam similique ex autem
                eaque.
            </p>

            <div class="mt-5 pt-5 text-center">
                <a href="{{ route('register') }}" class="btn btn-primary fs-4">Entra ora!</a>
                <br>
                <a href="{{ route('login') }}">Sei già registato?</a>
            </div>
        </div>
    </div>
@endsection
