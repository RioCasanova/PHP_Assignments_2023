<?php require_once("/home/rcasanova2/data/connect.php") ?>
<?php include("includes/functions.php"); ?>
<?php

$search_value = isset($_GET['search']) ? $_GET['search'] : "";
$title = "Search Results: The Comic Chronicler";
include('includes/header.php');


#region PAGINATION SETUP



$per_page = 20; // number of results per page
$total_count = count_records_search(); // Number of records total
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
    <section class="row justify-content-center mb-5">
        <div class="row justify-content-center col-md-10 col-lg-8 col-xxl-6 m-5">
            <h1>Search Results for<span class="text-danger">
                    <?php echo $search_value; ?>
                </span></h1>
        </div>


        <!-- Table of Records -->
        <div class="col-md-10 col-lg-8">
            <?php
            // this is our query with the appended offset
            
            $result = get_search_results($per_page, $offset, $search_value);



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
                                <td><a href=\"view.php?id=$id\" class=\"text-danger\">View</a></td>
                                </tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p>No Results</p>";
                }
            }
            ?>
        </div>


        <!-- Pagination -->
        <nav>
            <ul class="pagination justify-content-center">
                <?php
                if ($current_page > 1): ?>
                    <li class="page-item">
                        <a href="search-results.php?search=<?php echo $search_value ?>&page=<?php echo $current_page - 1 ?>"
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
                        <li class="page-item active">
                            <a href="#" class="page-link text-danger">
                                <?php echo $i; ?>
                            </a>
                        </li>
                    <?php else: ?>
                        <li class="page-item">
                            <a href="search-results.php?search=<?php echo $search_value ?>&page=<?php echo $i; ?>"
                                class="page-link text-danger">
                                <?php echo $i; ?>
                            </a>
                        </li>
                    <?php endif ?>
                <?php } ?>
                <?php

                if ($current_page < $total_pages): ?>
                    <li class="page-item">
                        <a href="search-results.php?search=<?php echo $search_value ?>&page=<?php echo $current_page + 1 ?>"
                            class="page-link text-danger">Next</a>
                    </li>
                <?php endif ?>
            </ul>
        </nav>
    </section>
</main>


<?php

include('includes/footer.php');

?>