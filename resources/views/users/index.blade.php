@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Usuarios</div>

                    <div class="alert mt-3 mb-3 mr-3 ml-3" style='display: none;'>
                        <div class="alert-heading" id="alertTitle"></div>
                    </div>
                    

                    <div class="card-body">
                        @unless(Auth::check())
                            <p>Sin autorizacion</p>
                        @else
                            <a class="btn btn-primary mb-3" href="{{ url('/home/users/create') }}">Nuevo</a>
                            <table class="table bordered striped responsive" id='tblUsers'>
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->nombre }}</td>
                                            <td>{{ $item->email}}</td>
                                            <td><a href="{{ url('/home/users/' . $item->id . '/edit') }}">editar</a> | <a href="#delete" data-id='{{ $item->id }}' onclick="removeItem(this, '/home/users/#id#/delete')">eliminar</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $users->render() }}
                        @endunless
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection