@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-uppercase text-center mt-5">Lista degli utenti</h1>

        @if (count($userList) > 0)
            <div class="container">
                <table class="table m-auto mt-5 table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Data Creazione</th>
                            <th scope="col">Ruolo</th>
                            @if (Auth::user()['role_id'] === 1)
                                <th scope="col" class="text-end">
                                    Elimina utente
                                </th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userList as $i => $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->format('d M Y || H:i') }}</td>
                                <td
                                    class="text-uppercase text-center fw-bold {{ $user->role_id == '2' ? 'bg-warning' : 'bg-info' }}">
                                    {{-- {{ $user->role->name }} --}}
                                    <form action="{{ route('users.update', $user->id) }}" method="POST" class="px-1">
                                        @csrf
                                        @method('PATCH')
                                        <div class="d-flex">
                                            <select name="role_id" id="role-{{ $i }}" class="form-select me-4"
                                                aria-label="Default select example">>
                                                <option value="2" {{ $user->role_id == 2 ? 'selected' : '' }}>
                                                    Editor
                                                </option>
                                                <option value="3" {{ $user->role_id == 3 ? 'selected' : '' }}>
                                                    User
                                                </option>
                                            </select>

                                            <button type="submit" class="btn btn-success">
                                                <i class="fa-solid fa-floppy-disk"></i>
                                            </button>
                                        </div>
                                    </form>
                                </td>

                                @if (Auth::user()['role_id'] === 1)
                                    <td class="text-end">
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa-solid fa-user-xmark"></i>
                                            </button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="alert alert-danger text-center fs-2 mt-5">Nessun utente trovato</p>
        @endif
    </div>
@endsection
