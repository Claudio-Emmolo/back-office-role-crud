@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-uppercase text-center mt-5">Lista prodotti</h1>

        @if (count($productList) > 0)
            <div class="container-fluid">
                <table class="table m-auto mt-5 table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            @if (Auth::user()['role_id'] == 1 || Auth::user()['role_id'] == 2)
                                <th scope="col">Creato da</th>
                            @endif
                            <th scope="col">Data Creazione</th>
                            <th class="text-end">
                                <a href="{{ route('products.create') }}" class="btn btn-primary">
                                    <i class="fa-solid fa-plus"></i>
                                    <span>Crea prodotto</span>
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productList as $product)
                            <tr>
                                <th scope="row">{{ $product->id }}</th>
                                <td>{{ $product->title }}</td>
                                <td>{{ substr($product->description, 0, 100) . '...' }}</td>
                                <td>{{ $product->price }}</td>
                                @if (Auth::user()['role_id'] == 1 || Auth::user()['role_id'] == 2)
                                    <td class="{{ $product->user->id == Auth::user()->id ? 'bg-info' : '' }}">
                                        {{ $product->user->name }}
                                    </td>
                                @endif
                                <td>{{ $product->created_at->format('d M Y - H:i') }}</td>
                                <td class="text-end">
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    @if (Auth::user()['role_id'] === 1)
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i> </button>
                                        </form>
                                    @elseif($product->user->id == Auth::user()->id)
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i> </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="container mt-5 text-center">
                    {{ $productList->links() }}
                </div>
            </div>
        @else
            <div class="container text-end">
                <a href="{{ route('products.create') }}" class="btn btn-primary mt-5 mb-2">
                    <i class="fa-solid fa-plus"></i>
                    <span>Crea prodotto</span>
                </a>
                <p class="alert alert-danger text-center fs-2">Nessun prodotto inserito</p>
            </div>
        @endif
    </div>
@endsection
