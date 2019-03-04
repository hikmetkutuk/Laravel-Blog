
@extends('layouts.app')

@section('content')
    @if(count($errors) > 0)
        <ul class="list-group">
            @foreach($errors->all() as $error)
                <li class="list-group-item text-danger">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading" align="center">
            Edit Blog Settings
        </div>

        <div class="panel-body">
            <form action="{{ route('settings.update') }}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="form-group">
                     <label for="title">Site Name</label>
                     <input type="text" name="site_name" class="form-control" value="{{ $settings->site_name }}">
                  </div>
                  <div class="form-group">
                     <label for="title">Email</label>
                     <input type="email" name="contact_mail" class="form-control" value="{{ $settings->contact_mail }}">
                  </div>
                  <div class="form-group">
                     <label for="title">Phone</label>
                     <input type="text" name="contact_number" class="form-control" value="{{ $settings->contact_number }}">
                  </div>
                  <div class="form-group">
                        <label for="title">Address</label>
                        <input type="text" name="address" class="form-control" value="{{ $settings->address }}">
                  </div>
                
                  <div class="form-group">
                     <div class="text-center">
                        <button class="btn btn-success" type="submit">
                           <i class="fas fa-arrow-circle-up"></i> Update
                        </button>
                     </div>
                  </div>
            </form>
        </div>
    </div>
    @stop
