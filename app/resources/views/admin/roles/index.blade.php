@extends('layouts.appadmin')


@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h4>Gestion des rôles</h4>
                        </div>
                        <div class="pull-right">
                        @can('Rôle-créer')
                            <a class="btn btn-primary" href="{{ route('roles.create') }}"> Créer un nouveau rôle</a>
                           
                            @endcan
                        </div>
                    </div>
                </div>

                <br>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <br>
            
                <table class="table">
                    <thead>
                        <tr>
                            <th>Numéro</th>
                            <th>Nom</th>
                            <th width="280px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($roles as $key => $role)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                @can('Rôle-éditer')
                                    <a class="btn btn-outline-primary text-dark" href="{{ route('roles.edit',$role->id) }}">Modifier</a>
                                @endcan
                                <a class="btn btn-outline-info text-dark" href="{{ route('roles.show',$role->id) }}">Consulter</a>
                                @can('Rôle-supprimer')
                                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Supprimer', ['class' => 'btn  btn-outline-danger']) !!}
                                    {!! Form::close() !!}
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{!! $roles->render() !!}


@endsection