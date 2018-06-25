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

    @include('back.includes.errors')

    <div class="panel panel-default">
        <div class="panel-heading" align="center">
            Update tag : {{ $tag->tag }}
        </div>

        <div class="panel-body">
            <form action="{{ route('tag.update', ['id' => $tag->id]) }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Tag</label>
                    <input type="text" name="tag" value="{{ $tag->tag }}" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
