@extends('layouts.app')

@section('content')

    @include('back.includes.errors')

    <div class="panel panel-default">
        <div class="panel-heading" align="center">
            Edit your profile
        </div>

        <div class="panel-body">
            <form action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Username</label>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="email" name="email" value="{{ $user->email }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">New Password</label>
                    <input type="password" name="password" value="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Upload New Avatar</label>
                    <input type="file" name="avatar" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Instagram Address</label>
                    <input type="text" name="instagram" value="{{ $user->profile->instagram }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Youtube Address</label>
                    <input type="text" name="youtube" value="{{ $user->profile->youtube }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="about">About You</label>
                    <textarea name="about" id="about" cols="10" rows="10" class="form-control">{{ $user->profile->about }}</textarea>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

