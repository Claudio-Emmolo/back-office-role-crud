@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('products.index') }}" class="btn btn-dark my-4">
            Go Back
        </a>
        <h1 class="text-uppercase text-center mt-5 mb-5">Prodotto:</h1>
        <h2>Titolo:
            <span class="fw-bold">
                {{ $product->title }}
            </span>
        </h2>
        <p>
            Descrizione:
            <span class="fw-bold">
                {{ $product->description }}
            </span>
        </p>
        <h3 class="mt-5 fs-2">Dettagli:</h3>
        <p class="fs-4">
            Prezzo:
            <span class="fw-bold">
                {{ $product->price }}&euro;
            </span>

            <br>
            Utente:
            <span class="fw-bold">
                {{ $product->user->name }}
            </span>

            <br>

            Email:
            <span class="fw-bold">
                {{ $product->user->email }}
            </span>
        </p>

    </div>
@endsection
