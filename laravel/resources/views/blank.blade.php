
@extends('layout')

@section('navbar')

@stop

@section('jumbo')
<h1> {{ $dvd-> title }} </h1>

@stop

@section('content')

@foreach($errors->all() as $errorMessage)
<p> {{ $errorMessage }} </p>
@endforeach

@if(Session::has('success'))
<p> {{ Session::get('success') }} </p>
@endif

<table class="table table-striped">
    <thead>
    <tr>
        <th>Rating</th>
        <th>Genre</th>
        <th>Label</th>
        <th>Sound</th>
        <th>Format</th>
        <th>Release Date</th>
    </tr>
    </thead>

    <tbody>
    <tr>
        <td><?php echo $dvd->rating_name ?></td>
        <td><?php echo $dvd->genre_name?></td>
        <td><?php echo $dvd->label_name?></td>
        <td><?php echo $dvd->sound_name?></td>
        <td><?php echo $dvd->format_name?></td>
        <td><?php echo DATE_FORMAT(new DateTime($dvd->release_date), 'm-d-Y') ?></td>
    </tr>
    </tbody>
</table>
<p>
    RAW INFO
    <?php echo dd($rawInfo) ?>
</p>
<h3>Reviews </h3>

<table class="table table-striped">
    <thead>
    <tr>
        <th>Title</th>
        <th>Rating</th>
        <th>Description</th>
    </tr>
    </thead>

    <tbody>
    <tr>
        <?php foreach ($reviews as $review) : ?>
        <td><?php echo $review->title ?></td>
        <td><?php echo $review->rating?></td>
        <td><?php echo $review->description?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>


<h3>Add Review</h3>
</br>
<?php $int = 1 ?>
<div class="container">
    <form method="post" action="/dvds/new">
        <input type="hidden" name="_token" value="<?php echo csrf_token()?>">
        <input type="hidden" name="dvd_id" value="<?php echo $dvd->dvd_id ?> ">
        <div class="form-group">
            <label>Review Title - min 5 char</label>
            <input type="text" name="review_title">
        </div>
        <div class="form-group">
            <label>Rating</label>
            <select class="form-control" name="rating">
                <?php while ($int < 11) : ?>
                    <option value ="<?php echo $int ?>">
                        <?php echo $int?>
                    </option>>
                    <?php $int+=1;
                endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Description - min 20 char</label>
            <textarea name="description" class="form-control" type ="text"> </textarea>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>

@stop