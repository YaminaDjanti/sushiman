@extends('layouts.appadmin')


@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">
      <div class="card-body">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h4>Utilisateurs Management</h4>
                </div>
                @can('Utilisateurs-créer')
                  <div class="pull-right">
                      <a class="btn btn-primary" href="{{ route('utilisateurs.create') }}">Créer un nouvel utilisateur</a>
                  </div>
                @endcan
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
               <th>Email</th>
               <th>Rôles</th>
               <th width="280px">Actions</th>
            </tr> 
          </thead>
          <tbody>
             @foreach ($data as $key => $user)
              <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                  @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                       <label class="badge badge-success">{{ $v }}</label>
                    @endforeach
                  @endif
                </td>
                <td>
                  @can('Utilisateurs-éditer')
                    <a class="btn btn-outline-primary text-dark" href="{{ route('utilisateurs.edit',$user->id) }}">Modifier</a>
                  @endcan
                   <a class="btn btn-outline-info text-dark" href="{{ route('utilisateurs.show',$user->id) }}">Consulter</a>
                  @can('Utilisateurs-supprimer')
                    {!! Form::open(['method' => 'DELETE','route' => ['utilisateurs.destroy', $user->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Supprimer', ['class' => 'btn  btn-outline-danger ']) !!}
                    {!! Form::close() !!}
                  @endcan
                </td>
              </tr>
             @endforeach
           </tbody>
        </table>


        {!! $data->render() !!}
      </div>
    </div>
  </div>
</div>


@endsection