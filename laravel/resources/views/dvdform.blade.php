@extends('layout')

@section('navbar')

@stop

@section('jumbo')

<h1>Insert DVD into database</h1>

@stop

@section('content')

    @foreach($errors->all() as $errorMessage)
        <p><h5>  {{ $errorMessage }}  </h5> </p>
    @endforeach

    @if(Session::has('success'))
    <p> <h4> {{ Session::get('success') }} </h4></p>
    @endif

    <form method="post" action="/dvds">
        <input type="hidden" name="_token" value= "{{ (csrf_token()) }}" >
        <div class="form-group">
            <label>Title</label>
            <input name="title" class="form-control">
        </div>
        <div class="form-group">
            <label>Label</label>
            <select class="form-control" name="label_id">
                @foreach ($labels as $label)
                    <option value = "{{ $label->id }}" >
                        {{$label->label_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Genre</label>
            <select class="form-control" name="genre_id">
                @foreach ($genres as $genre)
                    <option value = "{{ $genre->id }}">
                        {{ $genre->genre_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Sound</label>
            <select class="form-control" name="sound_id">
                @foreach ($sounds as $sound)
                <option value ="{{ $sound->id }}" >
                    {{ $sound->sound_name }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Rating</label>
            <select class="form-control" name="rating_id">
                @foreach ($ratings as $rating)
                <option value ="{{ $rating->id }}" >
                    {{ $rating->rating_name }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Format</label>
            <select class="form-control" name="format_id">
                @foreach ($formats as $format)
                <option value ="{{ $format->id }}" >
                    {{ $format->format_name }}
                </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>

@stop