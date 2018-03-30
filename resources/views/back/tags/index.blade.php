<?php
/**
 * Created by PhpStorm.
 * User: hikmetis
 * Date: 3/30/18
 * Time: 6:30 PM
 */
?>

@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading text-center">
            Tags
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
                            <a href="{{ route('tag.edit', ['id' => $tag->id]) }}" class="btn btn-warning">
                                Edit
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('tag.delete', ['id' => $tag->id]) }}" class="btn btn-danger">
                                Delete
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
