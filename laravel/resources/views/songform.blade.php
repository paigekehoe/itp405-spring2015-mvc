@extends('layout')


@section('content')

    @foreach($errors->all() as $errorMessage)
        <p>  {{ $errorMessage}} </p>
    @endforeach

    @if(Session::has('success'))
    <p> {{ Session::get('success')) }}
    @endif

    <form method="post" action="<?php echo url("songs")?>">
        <input type="hidden" name="_token" value="<?php echo csrf_token()?>">
        <div class="form-group">
            <label>Title</label>
            <input name="title" class="form-control">
        </div>
        <div class="form-group">
            <label>Artist</label>
            <select class="form-control" name="artist_id">
                <?php foreach ($artists as $artist): ?>
                    <option value ="<?php echo $artist->id?>">
                        <?php echo $artist->artist_name ?>
                    </option>>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Genre</label>
            <select class="form-control" name="genre_id">
                <?php foreach ($genres as $genre): ?>
                    <option value ="<?php echo $genre->id?>">
                        <?php echo $genre->genre ?>
                    </option>>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Price</label>
            <input name="price" class="form-control">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>

@stop