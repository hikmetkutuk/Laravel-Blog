@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading text-center">
            Tags
            <a href="{{ route('tag.create') }}" style="float: right" class="btn btn-success btn-xs" role="button">
               <i class="fas fa-plus"></i> Add
            </a>
        </div>
        <table class="table table-hover">

            <thead>
            <th>
                Tag name
            </th>
            <th>

            </th>
            <th>

            </th>
            </thead>

            <tbody>
            @if($tags->count() > 0)
                @foreach ($tags as $tag)
                    <tr>
                        <td>
                            {{ $tag->tag }}
                        </td>
                        <td>
                            <a href="{{ route('tag.edit', ['id' => $tag->id]) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('tag.delete', ['id' => $tag->id]) }}" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <th colspan="5" class="text-center">No tags yet</th>
                </tr>
            @endif
            </tbody>

        </table>
    </div>

@stop
