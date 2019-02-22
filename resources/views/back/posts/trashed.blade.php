@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
      <div class="panel-heading text-center">
          Trashed Posts
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
            <!-- restore button -->
          </th>
          <th>
            <!-- delete button -->
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
                    <a href="{{ route('post.restore', ['id' => $post->id]) }}" class="btn btn-primary btn-sm">
                      <i class="fas fa-redo"></i> Restore
                    </a>
                  </td>
                  <td>
                    <a href="{{ route('post.delete', ['id' => $post->id]) }}" class="btn btn-danger btn-sm">
                      <i class="fas fa-trash"></i> Delete
                    </a>
                  </td>
                </tr>
              @endforeach
            @else
                <tr>
                    <th colspan="5" class="text-center">No trashed post</th>
                </tr>
            @endif
        </tbody>

      </table>
  </div>

@stop
