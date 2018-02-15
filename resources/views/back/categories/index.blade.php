@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <table class="table table-hover">

      <thead>
        <th>
          Category name
        </th>
        <th>

        </th>
        <th>

        </th>
      </thead>

      <tbody>
        @foreach ($categories as $category)
          <tr>
            <td>
              {{ $category->name }}
            </td>
            <td>
              <a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn btn-warning">
                Edit
              </a>
            </td>
            <td>
              <a href="{{ route('category.delete', ['id' => $category->id]) }}" class="btn btn-danger">
                Delete
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>

    </table>
  </div>

@stop
