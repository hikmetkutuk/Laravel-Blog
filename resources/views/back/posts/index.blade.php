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
          <!-- edit button -->
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
              <a href="" class="btn btn-warning">
                  Edit
              </a>
            </td>
            <td>
              <a href="" class="btn btn-danger">
                  Delete
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>

    </table>
  </div>

@stop
