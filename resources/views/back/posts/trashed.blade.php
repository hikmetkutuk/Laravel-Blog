@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
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
        @foreach ($posts as $post)
          <tr>
            <td>
                <img src="{{ $post->featured }}" alt="{{ $post->title }}" width="100px" height="50px">
            </td>
            <td>
                {{ $post->title }}
            </td>
            <td>
              <a href="{{ route('post.restore', ['id' => $post->id]) }}" class="btn btn-success">
                  Restore
              </a>
            </td>
            <td>
              <a href="{{ route('post.delete', ['id' => $post->id]) }}" class="btn btn-danger">
                  Delete
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>

    </table>
  </div>

@stop
