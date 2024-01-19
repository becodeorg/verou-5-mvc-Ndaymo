<?php require 'View/includes/header.php' ?>
<?php require '../Controller/ArticleController.php' ?>
<?php // Use any data loaded in the controller here ?>

<section>
    <p><a href="index.php?page=articles">To articles page</a></p>

    <p>Put your content here.</p>

<?php echo $articles;
echo "<pre>";
print_r($articles);

echo "</pre>";

?>


</section>

<?php require 'View/includes/footer.php' ?>