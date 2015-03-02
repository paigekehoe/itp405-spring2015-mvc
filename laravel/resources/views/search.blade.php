<!doctype HTML>
<html>
<head>
    <title>Dvd Search!</title>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

</head>
<body>
@section('navbar')
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header ">
            <ul class="nav navbar-nav">
                <li><a class="active" href="#"><strong>Paige's Website </strong></a></li>
                <li class="dropdown">
                    <a href= "#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Genres Menu <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        @foreach ($genres as $genre)
                        <li>
                            <a href="/genres/{{$genre->genre_name }}/dvds">{{ $genre->genre_name}}</a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="/">Search</a></li>
                <li><a href="/dvds/create">Create DVD</a></li>

            </ul>
        </div>
        </div>
</nav>

@section('jumbo')
<h1>DVD Search </h1>>

@section('sidebar')
<!--<ul class="sidebar-nav span2" id="sidebar" style="position:relative; width:20%">-->
<!--    <ul class="nav nav-stacked"> Genre Menu-->
<!--        @foreach ($genres as $genre)-->
<!--        <li>-->
<!--            <a href="/genres/{{$genre->genre_name }}/dvds">{{ $genre->genre_name}}</a>-->
<!--        </li>-->
<!--        @endforeach-->
<!--    </ul>-->
<!--</ul>-->

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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</body>
</html>