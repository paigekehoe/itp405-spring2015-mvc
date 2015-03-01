@extends('layout')


@section('content')

    @foreach($errors->all() as $errorMessage)
        <p>  {{ $errorMessage}} </p>
    @endforeach

    @if(Session::has('success'))
    <p> {{ Session::get('success')) }}
    @endif
    <h1>Insert DVD into database</h1>
    <form method="post" action="/dvds">
        <input type="hidden" name="_token" value="{{ echo csrf_token()}} ">
        <div class="form-group">
            <label>Title</label>
            <input name="title" class="form-control">
        </div>
        <div class="form-group">
            <label>Artist</label>
            <select class="form-control" name="artist_id">
                {{ foreach ($artists as $artist): }}
                    <option value ="{{echo $artist->id}} "">
                        {{ echo $artist->artist_name }}
                    </option>>
                {{ endforeach; }}
            </select>
        </div>
        <div class="form-group">
            <label>Genre</label>
            <select class="form-control" name="genre_id">
                {{ foreach ($genres as $genre): }}
                    <option value ="{{php echo $genre->id }} ">
                        {{ echo $genre->genre }}
                    </option>>
                {{ endforeach; }}
            </select>
        </div>
        <div class="form-group">
            <label>Price</label>
            <input name="price" class="form-control">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>

@stop