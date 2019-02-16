@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading text-center">
            Users
            @if(Auth::user()->admin)
                <a href="{{ route('user.create') }}" style="float: right" class="btn btn-success btn-xs" role="button">
                    <i class="fas fa-plus"></i> Add
                </a>
            @endif
        </div>
        <table class="table table-hover">

            <thead>
            <th>
                Image
            </th>
            <th>
                Name
            </th>
            <th>
                Permissions
            </th>
            <th>
                <!-- trash button -->
            </th>
            </thead>

            <tbody>
            @if($users->count() > 0)
                @foreach ($users as $user)
                    <tr>
                        <td>
                            <img src="{{ asset($user->profile->avatar) }}" alt="avatar" width="60px" height="60px" style="border-radius: 50%;">
                        </td>
                        <td>
                            {{ $user->name }}
                        </td>
                        <td>
                            @if($user->admin)
                                <a href="{{ route('user.not.admin', ['id' => $user->id]) }}" class="btn btn-xs btn-danger">
                                    <i class="fas fa-user"></i> Make normal user
                                </a>
                            @else
                                <a href="{{ route('user.admin', ['id' => $user->id]) }}" class="btn btn-xs btn-success">
                                    <i class="fas fa-user-shield"></i> Make admin
                                </a>
                            @endif
                        </td>
                        <td>
                            @if(Auth::id() !== $user->id)
                                <a href="{{ route('user.delete', ['id' => $user->id]) }}" class="btn btn-xs btn-danger">
                                    <i class="fas fa-trash"></i> Delete
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <th colspan="5" class="text-center">No users</th>
                </tr>
            @endif
            </tbody>

        </table>
    </div>

@stop
