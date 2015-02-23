

<!doctype HTML>
<html>
<head>
    <title>Results!</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body>

<h1> Results</h1>

<p>
    You searched for a movie with the title: <?php echo $dvd_title;
    if($genre)
        echo 'with the genre"'.$genre.'"';
    if($rating)
        echo 'with the rating"'.$rating.'"';
    ?>


</p>

    <table claee="table table">
        <thead>
            <tr>
                <th>Title</th>
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
            <td><?php echo $dvd->title ?></td>
            <td><?php echo $dvd->rating ?></td>
            <td><?php echo $dvd->genre?></td>
            <td><?php echo $dvd->label?></td>
            <td><?php echo $dvd->sound?></td>
            <td><?php echo $dvd->format?></td>
            <td><?php echo $dvd->release_date?></td>


        </tr>
        <?php endforeach ?>

        </tbody>
    </table>


</p>


</body>
</html>