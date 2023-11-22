<?php require_once("/home/rcasanova2/data/connect.php") ?>
<?php include("includes/functions.php"); ?>
<?php

$title = "The Comic Chronicler";
include('includes/header.php');


#region PAGINATION SETUP



$per_page = 20; // number of results per page
$total_count = count_records(); // Number of records total
$total_pages = ceil($total_count / $per_page); // rounds up to an integer
$current_page = (int) ($_GET['page'] ?? 1); // making sure it isnt null

if ($current_page < 1 || $current_page > $total_pages || !is_int($current_page)) {
    $current_page = 1;
}

// Offset: If we are grabbing 20 per page and the age is 2, we'll get records 21 - 40
$offset = $per_page * ($current_page - 1);
$records = find_records($per_page, $offset);
#endregion



?>
<style>
    .active a {
        background-color: white !important;
        border-color: red !important;
    }
</style>
<main class="container">
    <section class="row justify-content-between my-5">

        <!-- Introduction -->
        <div class="col-md-10 col-lg-8 col-xxl-6 mb-4">
            <h2 class="display-4">Welcome to <span class="d-block text-danger">The Comic Chronicler</span></h2>
            <p>Discover and explore a vast collection of comic books with The Comic Chronicler. Search, sort, and filter
                through our extensive database of titles, writers, and artists. Find your favorite characters, delve
                into exciting storylines, and uncover hidden gems. Whether you're a seasoned comic book enthusiast or a
                curious newcomer, The Comic Chronicler is your gateway to the thrilling world of comics.</p>
        </div>

        <!-- Random Title Feature: If you choose to do the randomised title challenge, include it here. -->
        <div
            class="col col-lg-4 col-xxl-3 m-4 m-md-0 mb-md-4 border border-danger rounded p-3 d-flex flex-column justify-content-center align-items-center">
            <h2 class="fw-light mb-3">Featured Title</h2>
        </div>
    </section>
    <a href=""></a>
    <!-- Table of Records -->
    <div class="col-md-10 col-lg-8">
        <?php
        // this is our query with the appended offset
        $result = find_records($per_page, $offset);

        if ($connection->error) {
            // echo $connection->$error;
        } else {
            if ($result->num_rows > 0) {
                echo "\n<table class=\"table\">";
                echo "\n<tr class=\"text-danger\">";
                echo "<th scope=\"col\"><a href=\"#\"class=\"text-reset\">Title</a></th>";
                echo "<th scope=\"col\"><a href=\"#\"class=\"text-reset\">Writer</a></th>";
                echo "<th scope=\"col\"><a href=\"#\" class=\"text-reset\">Artist</a></th>";
                echo "<th scope=\"col\" class=\"text-dark\">Actions</th>";
                echo "</tr>";
                while ($row = $result->fetch_assoc()) {
                    extract($row);
                    echo "<tr class=\"mb-4\">
                                <td>$title</td>
                                <td>$writer</td>
                                <td>$artist</td>
                                <td><a href=\"#\" class=\"text-danger\">View</a></td>
                                </tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No Results</p>";
            }
        }
        ?>
    </div>

    <nav>
        <ul class="pagination justify-content-center">
            <?php
            if ($current_page > 1): ?>
                <li class="page-item">
                    <a href="index.php?page=<?php echo $current_page - 1 ?>" class="page-link text-danger">Previous</a>
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
                    <li class="page-item active">
                        <a href="#" class="page-link text-danger">
                            <?php echo $i; ?>
                        </a>
                    </li>
                <?php else: ?>
                    <li class="page-item">
                        <a href="index.php?page=<?php echo $i; ?>" class="page-link text-danger">
                            <?php echo $i; ?>
                        </a>
                    </li>
                <?php endif ?>
            <?php } ?>
            <?php

            if ($current_page < $total_pages): ?>
                <li class="page-item">
                    <a href="index.php?page=<?php echo $current_page + 1 ?>" class="page-link text-danger">Next</a>
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