@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center my-5">Modifica Prodotto</h1>
        @include('user.product.partials.editCreateForm', [
            'route' => 'products.update',
            'method' => 'PATCH',
        ])
    </div>
@endsection
