<?php require_once("/home/rcasanova2/data/connect.php") ?>
<?php include("includes/functions.php"); ?>
<?php

$title = "The Comic Chronicler";
$genre = isset($_GET['genre']) ? $_GET['genre'] : "";

// There was an issue with pagination and getting Superhero records -- this fixes the issue (patch*)
if ($genre) {
    $genre = str_contains($genre, 'Superhero') == true ? 'Superhero' : $_GET['genre'];
}


include('includes/header.php');

#region PAGINATION SETUP



$per_page = 20;
$total_count = count_records_genre($genre); // Number of records total
$total_pages = ceil($total_count / $per_page); // rounds up to an integer
$current_page = (int) ($_GET['page'] ?? 1); // making sure it isnt null

if ($current_page < 1 || $current_page > $total_pages || !is_int($current_page)) {
    $current_page = 1;
}

// Offset: If we are grabbing 20 per page and the age is 2, we'll get records 21 - 40
$offset = $per_page * ($current_page - 1);
#endregion



?>
<style>
    .pagination .active a {
        background-color: white !important;
        border-color: red !important;
    }
</style>
<main class="container">
    <section class="row justify-content-center my-5">

        <!-- Introduction -->
        <div class="row justify-content-center col-md-10 col-lg-8 col-xxl-6 mb-4">
            <h2 class="display-4">Browse by <span class="text-danger">Genre</span></h2>
            <p>Click any of the buttons below to browse the titles in our database by Genre</p>
        </div>

        <!-- Selection of Genres -->
        <div class="text-center mb-4">
            <?php if ($genre == 'Superhero') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?genre=Superhero"
                        class="text-decoration-none  text-reset">Superhero</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?genre=Superhero"
                        class="text-decoration-none  text-reset">Superhero</a>
                </button>
            <?php } ?>
            <?php if ($genre == 'Horror') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?genre=Horror"
                        class="text-decoration-none text-reset">
                        Horror</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?genre=Horror"
                        class="text-decoration-none text-reset">
                        Horror</a>
                </button>
            <?php } ?>
            <?php if ($genre == 'Drama') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?genre=Drama"
                        class="text-decoration-none text-reset">Drama</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?genre=Drama"
                        class="text-decoration-none text-reset">Drama</a>
                </button>
            <?php } ?>
            <?php if ($genre == 'Science Fiction') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?genre=Science%20Fiction"
                        class="text-decoration-none text-reset">Science Fiction</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?genre=Science%20Fiction"
                        class="text-decoration-none text-reset">Science Fiction</a>
                </button>
            <?php } ?>
            <?php if ($genre == 'Fantasy') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?genre=Fantasy"
                        class="text-decoration-none text-reset">Fantasy</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?genre=Fantasy"
                        class="text-decoration-none text-reset">Fantasy</a>
                </button>
            <?php } ?>
            <?php if ($genre == 'Supernatural') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?genre=Supernatural"
                        class="text-decoration-none text-reset">Supernatural</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?genre=Supernatural"
                        class="text-decoration-none text-reset">Supernatural</a>
                </button>
            <?php } ?>
            <?php if ($genre == 'Satire') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?genre=Satire"
                        class="text-decoration-none text-reset">Satire</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?genre=Satire"
                        class="text-decoration-none text-reset">Satire</a>
                </button>
            <?php } ?>
            <?php if ($genre == 'Mystery') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?genre=Mystery"
                        class="text-decoration-none text-reset">Mystery</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?genre=Mystery"
                        class="text-decoration-none text-reset">Mystery</a>
                </button>
            <?php } ?>
            <?php if ($genre == 'Psychological') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?genre=Psychological"
                        class="text-decoration-none text-reset">Psychological</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?genre=Psychological"
                        class="text-decoration-none text-reset">Psychological</a>
                </button>
            <?php } ?>
            <?php if ($genre == 'Historical') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?genre=Historical"
                        class="text-decoration-none text-reset">Historical</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?genre=Historical"
                        class="text-decoration-none text-reset">Historical</a>
                </button>
            <?php } ?>
            <?php if ($genre == 'Biography') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?genre=Biography"
                        class="text-decoration-none text-reset">Biography</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?genre=Biography"
                        class="text-decoration-none text-reset">Biography</a>
                </button>
            <?php } ?>
            <?php if ($genre == 'Comedy') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?genre=Comedy"
                        class="text-decoration-none text-reset">Comedy</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?genre=Comedy"
                        class="text-decoration-none text-reset">Comedy</a>
                </button>
            <?php } ?>
            <?php if ($genre == 'Noir') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?genre=Noir"
                        class="text-decoration-none text-reset">Noir</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?genre=Noir"
                        class="text-decoration-none text-reset">Noir</a>
                </button>
            <?php } ?>
            <?php if ($genre == 'Crime') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?genre=Crime"
                        class="text-decoration-none text-reset">Crime</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?genre=Crime"
                        class="text-decoration-none text-reset">Crime</a>
                </button>
            <?php } ?>
            <?php if ($genre == 'Adventure') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?genre=Adventure"
                        class="text-decoration-none text-reset">Adventure</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?genre=Adventure"
                        class="text-decoration-none text-reset">Adventure</a>
                </button>
            <?php } ?>
            <?php if ($genre == 'Autobiography') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?genre=Autobiography"
                        class="text-decoration-none text-reset">Autobiography</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?genre=Autobiography"
                        class="text-decoration-none text-reset">Autobiography</a>
                </button>
            <?php } ?>
            <?php if ($genre == 'Romance') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?genre=Romance"
                        class="text-decoration-none text-reset">Romance</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?genre=Romance"
                        class="text-decoration-none text-reset">Romance</a>
                </button>
            <?php } ?>
            <?php if ($genre == 'Mature') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?genre=Mature"
                        class="text-decoration-none text-reset">Mature</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?genre=Mature"
                        class="text-decoration-none text-reset">Mature</a>
                </button>
            <?php } ?>
            <?php if ($genre == 'Steampunk') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?genre=Steampunk"
                        class="text-decoration-none text-reset">Steampunk</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?genre=Steampunk"
                        class="text-decoration-none text-reset">Steampunk</a>
                </button>
            <?php } ?>
            <?php if ($genre == 'Action') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?genre=Action"
                        class="text-decoration-none text-reset">Action</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?genre=Action"
                        class="text-decoration-none text-reset">Action</a>
                </button>
            <?php } ?>
        </div>


        <!-- Table of Records -->
        <div class="col-md-10 col-lg-8">
            <?php
            // this is our query with the appended offset
            
            $result = find_by_genre($per_page, $offset, $genre);

            if ($connection->error) {
                echo $connection->$error;
            } else {
                if ($result->num_rows > 0) {
                    echo "\n<table class=\"table\">";
                    echo "\n<tr class=\"text-danger\">";
                    echo "<th scope=\"col\"><a href=\"#\"class=\"text-reset\">Title</a></th>";
                    echo "<th scope=\"col\"><a href=\"#\"class=\"text-reset\">Writer</a></th>";
                    echo "<th scope=\"col\"><a href=\"#\" class=\"text-reset\">Artist</a></th>";
                    echo "<th scope=\"col\"><a href=\"#\" class=\"text-reset\">Genre</a></th>";
                    echo "<th scope=\"col\" class=\"text-dark\">Actions</th>";
                    echo "</tr>";
                    while ($row = $result->fetch_assoc()) {
                        extract($row);
                        echo "<tr class=\"mb-4\">
                                <td>$title</td>
                                <td>$writer</td>
                                <td>$artist</td>
                                <td>$genre</td>
                                <td><a href=\"#\" class=\"text-danger\">View</a></td>
                                </tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<h1>No Results</h1>";
                }
            }
            ?>
        </div>
    </section>



    <nav>
        <ul class="pagination justify-content-center">
            <?php
            if ($current_page > 1): ?>
                <li class="page-item">
                    <a href="genre.php?genre=<?php echo $genre; ?>&page=<?php echo $current_page - 1 ?>"
                        class="page-link text-danger">Previous</a>
                </li>
            <?php endif ?>
            <?php
            // if we have a massive number of page links, we'll obscure
            // many of these with a gap. In our case, the gap will be an elipsis (...)
            $gap = false;
            // The "window" is how many page links on either side of the current page we 
            // want to receive or see
            $window = 1;
            for ($i = 1; $i <= $total_pages; $i++) {
                if ($i > 1 + $window && $i < $total_pages - $window && abs($i - $current_page) > $window) {
                    if (!$gap): ?>
                        <li class="page-item text-danger"><span class="page-link text-danger">...</span></li>
                    <?php endif ?>
                    <?php $gap = true;
                    continue;
                }
                $gap = false;

                if ($current_page == $i): ?>
                    <li class="page-item active ">
                        <a href="#" class="page-link text-danger">
                            <?php echo $i; ?>
                        </a>
                    </li>
                <?php else: ?>
                    <li class="page-item">
                        <a href="genre.php?genre=<?php echo $genre; ?>&page=<?php echo $i; ?>" class="page-link text-danger">
                            <?php echo $i; ?>
                        </a>
                    </li>
                <?php endif ?>
            <?php } ?>
            <?php

            if ($current_page < $total_pages): ?>
                <li class="page-item">
                    <a href="genre.php?genre=<?php echo $genre ?>&page=<?php echo $current_page + 1 ?>"
                        class="page-link text-danger">Next</a>
                </li>
            <?php endif ?>
        </ul>
    </nav>
    <section>

    </section>
</main>

<?php

include('includes/footer.php');

?>