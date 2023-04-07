@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-uppercase text-center mt-5">Lista degli utenti</h1>

        {{-- @dump(Auth::user()->roles) --}}

        <table class="table w-50 m-auto mt-5 table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col" class="text-end">
                        <form action="{{ route('roles.store') }}" method="POST">
                            @csrf
                            <input type="text" name="name" id="role" placeholder="Inserisci ruolo">
                            <button type="submit" class="btn btn-success">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </form>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roleList as $role)
                    <tr>
                        <th scope="row">{{ $role->id }}</th>
                        <td>{{ $role->name }}</td>
                        <td class="text-end">
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
