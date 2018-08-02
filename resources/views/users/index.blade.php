    {{-- \resources\views\users\index.blade.php --}}
    @extends('layouts.app')
    @section('title', '| Users')
    @section('content')
    <div class="col-lg-10 col-lg-offset-1">
        <h1><i class="fa fa-users"></i> User Management 
        <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Roles</a>
        <a href="{{ route('permissions.index') }}" class="btn btn-default pull-right">Permissions</a>
        <a href="{{ route('users.create') }}" class="btn btn-success">Add User</a>
        </h1>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date/Time Added</th>
                        <th>User Roles</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                        <td>{{ $user->roles()->pluck('name')->implode(' ') }}</td>
                        <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id] ]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {!!$users->links(); !!}
    </div>
    @endsection