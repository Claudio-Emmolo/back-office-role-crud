@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center my-5">Crea Prodotto</h1>
        @include('user.product.partials.editCreateForm', ['route' => 'products.store', 'method' => 'POST'])
    </div>
@endsection
