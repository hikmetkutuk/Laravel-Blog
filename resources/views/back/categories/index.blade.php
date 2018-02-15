@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <table class="table table-hover">

      <thead>
        <th>
          Category name
        </th>
        <th>
          Edit
        </th>
        <th>
          Delete
        </th>
      </thead>

      <tbody>
        @foreach ($categories as $key)
          <tr>
            <td>
              {{ $key->name }}
            </td>
          </tr>
        @endforeach
      </tbody>

    </table>
  </div>

@stop
