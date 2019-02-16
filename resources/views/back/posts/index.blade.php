@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
      <div class="panel-heading text-center">
          Posts
          <a href="{{ route('post.create') }}" style="float: right" class="btn btn-success btn-xs" role="button">
            <i class="fas fa-plus"></i> Add
          </a>
      </div>
      <table class="table table-hover">

        <thead>
          <th>
            Image
          </th>
          <th>
            Title
          </th>
          <th>
            <!-- edit button -->
          </th>
          <th>
            <!-- trash button -->
          </th>
        </thead>

        <tbody>
            @if($posts->count() > 0)
                @foreach ($posts as $post)
                  <tr>
                    <td>
                        <img src="{{ $post->featured }}" alt="{{ $post->title }}" width="100px" height="50px">
                    </td>
                    <td>
                        {{ $post->title }}
                    </td>
                    <td>
                      <a href="{{ route('post.edit', ['id' => $post->id]) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit
                      </a>
                    </td>
                    <td>
                      <a href="{{ route('post.trash', ['id' => $post->id]) }}" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i> Trash
                      </a>
                    </td>
                  </tr>
                @endforeach
            @else
                <tr>
                    <th colspan="5" class="text-center">No any post</th>
                </tr>
            @endif
        </tbody>

      </table>
  </div>

@stop
