
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

    <h1><?php echo $dvd->title ?>

    <?php if ($rtInfo != null ): ?>
        <img src="<?php echo $rtInfo->posters->original ?>"> </h1>
    <?php endif; ?>
</div>
    <div>
        <table class="table table-striped">
            <thead>
            <tr>
                <?php if ($rtInfo != null ): ?>
                    <th>Audience Score</th>
                    <th>Critic Score</th>
                    <th>Runtime</th>
                <?php endif; ?>
                <th>Rating </th>
                <th>Genre</th>
                <th>Label</th>
                <th>Sound</th>
                <th>Format</th>
                <th>Release Date</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <?php if ($rtInfo != null ): ?>
                    <td><?php echo $rtInfo->ratings->critics_score ?></td>
                    <td><?php echo $rtInfo->ratings->audience_score ?></td>
                    <td><?php echo $rtInfo->runtime ?></td>
                <?php endif; ?>
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
    <div>
    <?php if ($rtInfo != null ): ?>
        <h4>Abridged Cast</h4>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Actors</th>
<!--                    <th>Character</th>-->
                </tr>
                </thead>

                <tbody>
                <?php foreach ($rtInfo->abridged_cast as $cast): ?>
                <tr>
                    <td><?php echo $cast->name ?></td>
<!--                    --><?php //if (property_exists($characters, $cast.characters)): ?>
<!--                    <td>--><?php //echo $cast->characters?><!--</td>-->
<!--                    --><?php //else : ?>
<!--                        <td></td>-->
<!--                    --><?php //endif; ?>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
    <?php endif; ?>
    </div>
    <div>
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
    </div>

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

<!--    <div>-->
<!--        <h4>RAW INFO</h4>-->
<!--        --><?php //echo $dvd->title;
//        dd($rawInfo) ?>
<!--    </div>-->

</body>
</html>