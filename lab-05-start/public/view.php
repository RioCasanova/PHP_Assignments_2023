<?php
require_once("/home/rcasanova2/data/connect.php");
include('includes/functions.php');
$comic_id = isset($_GET['id']) ? $_GET['id'] : "";

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $comic = get_comic($comic_id);
}

$title = "Comic Details: The Comic Chronicler";
include('includes/header.php');
?>

<main class="container flex-column d-flex align-items-center">
    <!-- Introduction -->
    <div class="row justify-content-center col-md-10 col-lg-8 col-xxl-6 mb-4">
        <h2 class="display-4">Your selected <span class="text-danger">Comic</span></h2>
        <p>Here is all the information we have on this comic - click 'Back to Browse' to continue your inquiries</p>
    </div>
    <div class="card col-md-10 col-lg-8 col-xxl-6">
        <div class="col">
            <div class="card card-body h-100">
                <?php
                echo "<h4 class=\"card-title\"><b>" . $comic['title'] . "</b></h4>";
                echo "<h5 class=\"text-muted card-text\">" . $comic['publisher'] . "</h5>";
                echo "<p class=\"card-text\"><b>Writer: </b>" . $comic['writer'] . "</p>";
                echo "<p class=\"card-text\"><b>Artist: </b>" . $comic['artist'] . "</p>";
                echo "<p class=\"card-text\"><b>Year: </b>" . $comic['year'] . "</p>";
                echo "<p class=\"card-text\"><b>Genre: </b>" . $comic['genre'] . "</p>";
                echo "<p class=\"card-text\"><b>Characters: </b>" . $comic['characters'] . "</p>";
                echo "<p class=\"card-text\"><b>Synopsis: </b>" . $comic['synopsis'] . "</p>";
                ?>
            </div>
        </div>
    </div>
    <div class="mt-4 text-start">
        <button class="btn btn-outline-danger m-2">
            <a href="index.php" class="text-decoration-none  text-reset">Back to Browse</a>
        </button>
    </div>
</main>

<?php

include('includes/footer.php');

?>