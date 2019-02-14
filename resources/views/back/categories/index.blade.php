@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
      <div class="panel-heading text-center">
          Categories
          <a href="{{ route('category.create') }}" style="float: right" class="btn btn-success btn-xs" role="button">
            <i class="fas fa-plus"></i> Add
          </a>
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
                      <a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit
                      </a>
                    </td>
                    <td>
                      <a href="{{ route('category.delete', ['id' => $category->id]) }}" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i> Delete
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
