@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
      <div class="panel-heading text-center">
          Categories
      </div>
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
            @if($categories->count() > 0)
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
            @else
                <tr>
                    <th colspan="5" class="text-center">No category yet</th>
                </tr>
            @endif
        </tbody>

      </table>
  </div>

@stop
