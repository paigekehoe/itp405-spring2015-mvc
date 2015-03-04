
@extends('layout')

@section('navbar')

@stop

@section('jumbo')

<h1>Genre: {{ $genre_name }} </h1>

@stop

@section('content')

<table class="table table-striped">
    <thead>
    <tr>
        <th>Title</th>
        <th>Rating</th>
        <th>Genre</th>
        <th>Label</th>
    </tr>
    </thead>

    <tbody>
    @foreach ($dvds as $dvd)
    <tr>
        <td> {{ $dvd->title }} </td>
        <td> {{ $dvd->rating_name }} </td>
        <td> {{ $genre_name }} </td>
        <td> {{ $dvd->label_name }} </td>

    </tr>
    @endforeach
    </tbody>
</table>

@stop