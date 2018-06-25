<?php
/**
 * Created by PhpStorm.
 * User: hikmetis
 * Date: 23.04.2018
 * Time: 19:00
 */
?>

@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading text-center">
            Users
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
                                <a href="{{ route('user.not.admin', ['id' => $user->id]) }}" class="btn btn-xs btn-danger">Make normal user</a>
                            @else
                                <a href="{{ route('user.admin', ['id' => $user->id]) }}" class="btn btn-xs btn-success">Make admin</a>
                            @endif
                        </td>
                        <td>
                            @if(Auth::id() !== $user->id)
                                <a href="{{ route('user.delete', ['id' => $user->id]) }}" class="btn btn-xs btn-danger">Delete</a>
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
