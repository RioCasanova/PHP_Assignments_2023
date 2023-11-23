<?php require_once("/home/rcasanova2/data/connect.php") ?>
<?php include("includes/functions.php"); ?>
<?php

$title = "The Comic Chronicler";
include('includes/header.php');
$decade = isset($_GET['decade']) ? $_GET['decade'] : "";

#region PAGINATION SETUP


if (!$decade) {
    $per_page = 20; // number of results per page
} else {
    $per_page = 10; // number of results per page
}

$total_count = count_records_decade(); // Number of records total
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
            <h2 class="display-4">Browse by <span class="text-danger">Decade</span></h2>
            <p>Click any of the buttons below to browse the titles in our database by Decade</p>
        </div>
        <!-- Selection of decades -->
        <div class="text-center mb-4">
            <?php if ($decade == 196) { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?decade=196"
                        class="text-decoration-none  text-reset">1960</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?decade=196"
                        class="text-decoration-none  text-reset">1960</a>
                </button>
            <?php } ?>
            <?php if ($decade == 197) { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?decade=197"
                        class="text-decoration-none text-reset">
                        1970</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?decade=197"
                        class="text-decoration-none text-reset">
                        1970</a>
                </button>
            <?php } ?>
            <?php if ($decade == 198) { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?decade=198"
                        class="text-decoration-none text-reset">1980</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?decade=198"
                        class="text-decoration-none text-reset">1980</a>
                </button>
            <?php } ?>
            <?php if ($decade == 199) { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?decade=199"
                        class="text-decoration-none text-reset">1990</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?decade=199"
                        class="text-decoration-none text-reset">1990</a>
                </button>
            <?php } ?>
            <?php if ($decade == 200) { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?decade=200"
                        class="text-decoration-none text-reset">2000</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?decade=200"
                        class="text-decoration-none text-reset">2000</a>
                </button>
            <?php } ?>
            <?php if ($decade == 201) { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?decade=201"
                        class="text-decoration-none text-reset">2010</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?decade=201"
                        class="text-decoration-none text-reset">2010</a>
                </button>
            <?php } ?>
        </div>
        <?php


        ?>

        <!-- Table of Records -->
        <div class="col-md-10 col-lg-8">
            <?php
            // this is our query with the appended offset
            
            $result = find_by_decade($per_page, $offset, $decade);

            if ($connection->error) {
                echo $connection->$error;
            } else {
                if ($result->num_rows > 0) {
                    echo "\n<table class=\"table\">";
                    echo "\n<tr class=\"text-danger\">";
                    echo "<th scope=\"col\"><a href=\"#\"class=\"text-reset\">Title</a></th>";
                    echo "<th scope=\"col\"><a href=\"#\"class=\"text-reset\">Writer</a></th>";
                    echo "<th scope=\"col\"><a href=\"#\" class=\"text-reset\">Artist</a></th>";
                    echo "<th scope=\"col\"><a href=\"#\" class=\"text-reset\">Year</a></th>";
                    echo "<th scope=\"col\" class=\"text-dark\">Actions</th>";
                    echo "</tr>";
                    while ($row = $result->fetch_assoc()) {
                        extract($row);
                        echo "<tr class=\"mb-4\">
                                <td>$title</td>
                                <td>$writer</td>
                                <td>$artist</td>
                                <td>$year</td>
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
                    <a href="decade.php?decade=<?php echo $decade; ?>&page=<?php echo $current_page - 1 ?>"
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
                        <a href="decade.php?decade=<?php echo $decade; ?>&page=<?php echo $i; ?>" class="page-link text-danger">
                            <?php echo $i; ?>
                        </a>
                    </li>
                <?php endif ?>
            <?php } ?>
            <?php

            if ($current_page < $total_pages): ?>
                <li class="page-item">
                    <a href="decade.php?decade=<?php echo $decade; ?>&page=<?php echo $current_page + 1 ?>"
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