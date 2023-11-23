<?php require_once("/home/rcasanova2/data/connect.php") ?>
<?php include("includes/functions.php"); ?>
<?php

$title = "The Comic Chronicler";
include('includes/header.php');
$publisher = isset($_GET['publisher']) ? $_GET['publisher'] : "";

#region PAGINATION SETUP

// only using this if publisher has not been chosen
if (!$publisher) {
    $per_page = 20; // number of results per page
    $total_count = count_records(); // Number of records total
    $total_pages = ceil($total_count / $per_page); // rounds up to an integer
    $current_page = (int) ($_GET['page'] ?? 1); // making sure it isnt null

    if ($current_page < 1 || $current_page > $total_pages || !is_int($current_page)) {
        $current_page = 1;
    }

    // Offset: If we are grabbing 20 per page and the age is 2, we'll get records 21 - 40
    $offset = $per_page * ($current_page - 1);
}

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
            <h2 class="display-4">Browse by <span class="text-danger">Publisher</span></h2>
            <p>Click any of the buttons below to browse the titles in our database by Publisher</p>
        </div>
        <!-- Selection of decades -->
        <div class="text-center mb-4">
            <?php if ($publisher == 'Marvel Comics') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Marvel%20Comics"
                        class="text-decoration-none  text-reset">Marvel Comics</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Marvel%20Comics"
                        class="text-decoration-none  text-reset">Marvel Comics</a>
                </button>
            <?php } ?>
            <?php if ($publisher == 'Batman') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Batman"
                        class="text-decoration-none text-reset">
                        Batman</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Batman"
                        class="text-decoration-none text-reset">
                        Batman</a>
                </button>
            <?php } ?>
            <?php if ($publisher == 'Death') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Death"
                        class="text-decoration-none text-reset">Death</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Death"
                        class="text-decoration-none text-reset">Death</a>
                </button>
            <?php } ?>
            <?php if ($publisher == 'Jean Grey') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Jean%20Grey"
                        class="text-decoration-none text-reset">Jean Grey</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Jean%20Grey"
                        class="text-decoration-none text-reset">Jean Grey</a>
                </button>
            <?php } ?>
            <?php if ($publisher == 'Rick Grimes') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Rick%20Grimes"
                        class="text-decoration-none text-reset">Rick Grimes</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Rick%20Grimes"
                        class="text-decoration-none text-reset">Rick Grimes</a>
                </button>
            <?php } ?>
            <?php if ($publisher == 'Iron Man') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Iron%20Man"
                        class="text-decoration-none text-reset">Iron Man</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Iron%20Man"
                        class="text-decoration-none text-reset">Iron Man</a>
                </button>
            <?php } ?>
            <?php if ($publisher == 'Wonder Woman') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Wonder%20Woman"
                        class="text-decoration-none  text-reset">Wonder Woman</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Wonder%20Woman"
                        class="text-decoration-none  text-reset">Wonder Woman</a>
                </button>
            <?php } ?>
            <?php if ($publisher == 'Spider-Man') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=197"
                        class="text-decoration-none text-reset">
                        1970</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=197"
                        class="text-decoration-none text-reset">
                        1970</a>
                </button>
            <?php } ?>
            <?php if ($publisher == 'Spider-Man') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=198"
                        class="text-decoration-none text-reset">1980</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=198"
                        class="text-decoration-none text-reset">1980</a>
                </button>
            <?php } ?>
            <?php if ($publisher == 'Spider-Man') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=199"
                        class="text-decoration-none text-reset">1990</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=199"
                        class="text-decoration-none text-reset">1990</a>
                </button>
            <?php } ?>
            <?php if ($publisher == 'Spider-Man') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=200"
                        class="text-decoration-none text-reset">2000</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=200"
                        class="text-decoration-none text-reset">2000</a>
                </button>
            <?php } ?>
            <?php if ($publisher == 'Spider-Man') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=201"
                        class="text-decoration-none text-reset">2010</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=201"
                        class="text-decoration-none text-reset">2010</a>
                </button>
            <?php } ?>
            <?php if ($publisher == 'Spider-Man') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=196"
                        class="text-decoration-none  text-reset">1960</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=196"
                        class="text-decoration-none  text-reset">1960</a>
                </button>
            <?php } ?>
            <?php if ($publisher == 'Spider-Man') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=197"
                        class="text-decoration-none text-reset">
                        1970</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=197"
                        class="text-decoration-none text-reset">
                        1970</a>
                </button>
            <?php } ?>
            <?php if ($publisher == 'Spider-Man') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=198"
                        class="text-decoration-none text-reset">1980</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=198"
                        class="text-decoration-none text-reset">1980</a>
                </button>
            <?php } ?>
            <?php if ($publisher == 'Spider-Man') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=199"
                        class="text-decoration-none text-reset">1990</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=199"
                        class="text-decoration-none text-reset">1990</a>
                </button>
            <?php } ?>
            <?php if ($publisher == 'Spider-Man') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=200"
                        class="text-decoration-none text-reset">2000</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=200"
                        class="text-decoration-none text-reset">2000</a>
                </button>
            <?php } ?>
            <?php if ($publisher == 'Spider-Man') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=201"
                        class="text-decoration-none text-reset">2010</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=201"
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
            
            $result = find_by_publisher($per_page, $offset, $publisher);

            if ($connection->error) {
                echo $connection->$error;
            } else {
                if ($result->num_rows > 0) {
                    echo "\n<table class=\"table\">";
                    echo "\n<tr class=\"text-danger\">";
                    echo "<th scope=\"col\"><a href=\"#\"class=\"text-reset\">Title</a></th>";
                    echo "<th scope=\"col\"><a href=\"#\"class=\"text-reset\">Writer</a></th>";
                    echo "<th scope=\"col\"><a href=\"#\" class=\"text-reset\">Artist</a></th>";
                    echo "<th scope=\"col\"><a href=\"#\" class=\"text-reset\">Publisher</a></th>";
                    echo "<th scope=\"col\" class=\"text-dark\">Actions</th>";
                    echo "</tr>";
                    while ($row = $result->fetch_assoc()) {
                        extract($row);
                        echo "<tr class=\"mb-4\">
                                <td>$title</td>
                                <td>$writer</td>
                                <td>$artist</td>
                                <td>$publisher</td>
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



    <?php if (!$publisher) {
        include('includes/pagination.php');
    }
    ?>
    <section>

    </section>
</main>

<?php

include('includes/footer.php');

?>