<div>

    <?php if(isset($_SESSION['isLoggedIn'])) : ?>
    <a class="btn btn-success btn-share" href="<?php echo ROOT_PATH; ?>shares/add">Share Something</a>
    <?php endif; ?>

    <?php foreach($viewModel as $item) : ?>
        <div class="well">
            <h3><?php echo $item['title']; ?></h3>
            <small><?php echo $item['date_created'] ?></small>
            <p><?php echo $item['body'] ?></p>
            <a class="" href="<?php echo $item['link']; ?>" target="_blank">Check it Out</a>
        </div>
    <?php endforeach; ?>

</div>