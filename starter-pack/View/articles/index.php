<?php require 'View/includes/header.php'?>

<?php // Use any data loaded in the controller here ?>

<section>
    <h1>Articles</h1>
    <ul>
    <?php foreach ($articles as $article) : ?>
                <li><?= $article->title ?><a href="index.php?page=articles-show&articleid=<?= $article-> id ?>" >View more</a></li>
                <?php endforeach; ?>
    </ul>
</section>

<?php require 'View/includes/footer.php'?>
