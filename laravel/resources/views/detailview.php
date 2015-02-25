<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body>

<div class="jumbotron">


    <?php foreach($errors->all() as $errorMessage):?>
    <p> <?php echo $errorMessage ?> </p>
    <?php endforeach; ?>

    <?php if(Session::has('success')) : ?>
        <p> <?php echo Session::get('success') ?> </p>
    <?php endif; ?>



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


</div>
<h3>Reviews</h3>
</br>
    <?php $int = 1 ?>
<div class="container"><
    <form method="post" action="<?php echo url("dvds")?>">
    <input type="hidden" name="_token" value="<?php echo csrf_token()?>">
    <input type="hidden" name="dvd_id" value="<?php echo $dvd_id ?> ">
        <div class="form-group">
            <label>Review</label>
            <input name="review" class="form-control">
        </div>
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
            <input name="description" class="form-control" type ="text">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>

</body>
</html>