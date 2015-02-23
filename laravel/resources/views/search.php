<!doctype HTML>
<html>
<head>
    <title>Dvd Search!</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

</head>
<body>

    <h1> DVD Search</h1>

    <form action="/dvds" method="get">
        <div class="form-group">
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
                    <option value ="<?php echo $genre->genre_id?>">
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
                    <option value ="<?php echo $rating->rating_id?>">
                        <?php echo $rating->rating_name ?>
                    </option>>
                <?php endforeach; ?>
            </select>
        </div>
        <input type="submit" value="Search">

    </form>

</body>
</html>