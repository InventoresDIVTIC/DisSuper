@extends('layouts.nav')

@section('content')
    <div class="container">
        <h1>Administrar Roles de Usuarios</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Rol Actual</th>
                    <th>Cambiar Rol</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->role->name }}</td>
                        <td>
                            <form action="{{ route('admin.updateRole', $user->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <select name="role_id" class="form-control">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection