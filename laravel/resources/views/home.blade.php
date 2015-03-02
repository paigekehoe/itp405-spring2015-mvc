@extends('layout')

<head>
    <title>DVD Search!</title>

</head>

@section('navbar')

@stop

@section('jumbo')

<h1> DVD Search</h1>

@stop

@section('content')

<div class="col-md-12">
    <div class="container-fluid">
        <div class="row">
            <form action="/dvds" method="get">
                <div class="form-group" >
                    <label> DVD Title </label>
                    <input type="text" name="dvd_title">
                </div>
                <div class="form-group">
                    <label>Genre</label>
                    <select class="form-control" name="genre">
                        <option value ="-1">
                            All
                        </option>
                        <?php foreach ($genres as $genre): ?>
                            <option value ="<?php echo $genre->id?>">
                                <?php echo $genre->genre_name ?>
                            </option>
                        <?php endforeach; ?>

                    </select>
                </div>
                <div class="form-group">
                    <label>Rating</label>
                    <select class="form-control" name="rating">
                        <option value ="-1">
                            All
                        </option>
                        <?php foreach ($ratings as $rating): ?>
                            <option value ="<?php echo $rating->id?>">
                                <?php echo $rating->rating_name ?>
                            </option>>
                        <?php endforeach; ?>
                    </select>
                </div>
                <input type="submit" value="Search">

            </form>
        </div>
    </div>
</div>
</div>


<script type="text/javascript">
    ('.dropdown-toggle').dropdown()

</script>



@stop