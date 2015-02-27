

<!doctype HTML>
<html>
<head>
    <title>Results!</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body>

<h1> Results</h1>

<p>
    You searched for a movie with the title: <?php echo $dvd_title; ?>
    with the genre : <?php echo $genre ?>
    and with the rating : <?php $rating ?>

</p>

<div class = "results">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th> </th>
                <th>Rating</th>
                <th>Genre</th>
                <th>Label</th>
                <th>Sound</th>
                <th>Format</th>
                <th>Release Date</th>
            </tr>
        </thead>

        <tbody>
        <?php foreach ($dvds as $dvd) : ?>
        <tr>
            <td><?php echo $dvd->title ?> </td>
            <td><a href="/dvds/<?php echo $dvd->dvd_id ?>"> Reviews </a></td>
            <td><?php echo $dvd->rating_name ?></td>
            <td><?php echo $dvd->genre_name?></td>
            <td><?php echo $dvd->label_name?></td>
            <td><?php echo $dvd->sound_name?></td>
            <td><?php echo $dvd->format_name?></td>
            <td><?php echo DATE_FORMAT(new DateTime($dvd->release_date), 'm-d-Y') ?></td>


        </tr>
        <?php endforeach ?>

        </tbody>
    </table>


</div>


</body>
</html>