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
            <?php if ($publisher == 'DC Comics') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=DC%20Comics"
                        class="text-decoration-none text-reset">
                        DC Comics</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=DC%20Comics"
                        class="text-decoration-none text-reset">
                        DC Comics</a>
                </button>
            <?php } ?>
            <?php if ($publisher == 'Image Comics') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Image%20Comics"
                        class="text-decoration-none text-reset">Image Comics</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Image%20Comics"
                        class="text-decoration-none text-reset">Image Comics</a>
                </button>
            <?php } ?>
            <?php if ($publisher == 'Vertigo') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Vertigo"
                        class="text-decoration-none text-reset">Vertigo</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Vertigo"
                        class="text-decoration-none text-reset">Vertigo</a>
                </button>
            <?php } ?>
            <?php if ($publisher == 'Dark Horse Comics') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Dark%20Horse%20Comics"
                        class="text-decoration-none text-reset">Dark Horse Comics</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Dark%20Horse%20Comics"
                        class="text-decoration-none text-reset">Dark Horse Comics</a>
                </button>
            <?php } ?>
            <?php if ($publisher == 'IDW Publishing') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=IDW Publishing"
                        class="text-decoration-none text-reset">IDW Publishing</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=IDW Publishing"
                        class="text-decoration-none text-reset">IDW Publishing</a>
                </button>
            <?php } ?>
            <?php if ($publisher == 'Mirage Studios') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Mirage Studios"
                        class="text-decoration-none  text-reset">Mirage Studios</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Mirage Studios"
                        class="text-decoration-none  text-reset">Mirage Studios</a>
                </button>
            <?php } ?>
            <?php if ($publisher == 'Kodansha') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Kodansha"
                        class="text-decoration-none text-reset">
                        Kodansha</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Kodansha"
                        class="text-decoration-none text-reset">
                        Kodansha</a>
                </button>
            <?php } ?>
            <?php if ($publisher == 'Shueisha') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Shueisha"
                        class="text-decoration-none text-reset">Shueisha</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Shueisha"
                        class="text-decoration-none text-reset">Shueisha</a>
                </button>
            <?php } ?>
            <?php if ($publisher == 'Square Enix') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Square Enix"
                        class="text-decoration-none text-reset">Square Enix</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Square Enix"
                        class="text-decoration-none text-reset">Square Enix</a>
                </button>
            <?php } ?>
            <?php if ($publisher == 'Epic Comics') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Epic Comics"
                        class="text-decoration-none text-reset">Epic Comics</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Epic Comics"
                        class="text-decoration-none text-reset">Epic Comics</a>
                </button>
            <?php } ?>
            <?php if ($publisher == 'Mariner Books') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Mariner Books"
                        class="text-decoration-none text-reset">Mariner Books</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Mariner Books"
                        class="text-decoration-none text-reset">Mariner Books</a>
                </button>
            <?php } ?>
            <?php if ($publisher == 'Cartoon Books') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Cartoon Books"
                        class="text-decoration-none  text-reset"> Cartoon Books</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Cartoon Books"
                        class="text-decoration-none  text-reset"> Cartoon Books</a>
                </button>
            <?php } ?>
            <?php if ($publisher == 'Pantheon Books') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Pantheon Books"
                        class="text-decoration-none text-reset">
                        Pantheon Books</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Pantheon Books"
                        class="text-decoration-none text-reset">
                        Pantheon Books</a>
                </button>
            <?php } ?>
            <?php if ($publisher == 'Boom! Studios') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Boom! Studios"
                        class="text-decoration-none text-reset">Boom! Studios</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Boom! Studios"
                        class="text-decoration-none text-reset">Boom! Studios</a>
                </button>
            <?php } ?>
            <?php if ($publisher == 'Archie Comics') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Archie Comics"
                        class="text-decoration-none text-reset">Archie Comics</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Archie Comics"
                        class="text-decoration-none text-reset">Archie Comics</a>
                </button>
            <?php } ?>
            <?php if ($publisher == 'DC Black Label') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=DC Black Label"
                        class="text-decoration-none text-reset">DC Black Label</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=DC Black Label"
                        class="text-decoration-none text-reset">DC Black Label</a>
                </button>
            <?php } ?>
            <?php if ($publisher == 'Self-published') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Self-published"
                        class="text-decoration-none text-reset">Self-published</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Self-published"
                        class="text-decoration-none text-reset">Self-published</a>
                </button>
            <?php } ?>
            <?php if ($publisher == 'L\'Association') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=L'Association"
                        class="text-decoration-none text-reset">L'Association</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=L'Association"
                        class="text-decoration-none text-reset">L'Association</a>
                </button>
            <?php } ?>
            <?php if ($publisher == 'Top Shelf Productions') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Top Shelf Productions"
                        class="text-decoration-none text-reset">Top Shelf Productions</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Top Shelf Productions"
                        class="text-decoration-none text-reset">Top Shelf Productions</a>
                </button>
            <?php } ?>
            <?php if ($publisher == 'DC Comics (America\'s Best Comics)') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=DC Comics (America's Best Comics)"
                        class="text-decoration-none text-reset">DC Comics (America's Best Comics)</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=DC Comics (America's Best Comics)"
                        class="text-decoration-none text-reset">DC Comics (America's Best Comics)</a>
                </button>
            <?php } ?>
            <?php if ($publisher == 'DC Comics (Vertigo)') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=DC Comics (Vertigo)"
                        class="text-decoration-none text-reset">DC Comics (Vertigo)</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=DC Comics (Vertigo)"
                        class="text-decoration-none text-reset">DC Comics (Vertigo)</a>
                </button>
            <?php } ?>
            <?php if ($publisher == 'Chuokoron-Shinsha') { ?>
                <button class="btn btn-outline-danger active m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Chuokoron-Shinsha"
                        class="text-decoration-none text-reset"> Chuokoron-Shinsha</a>
                </button>
            <?php } else { ?>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?publisher=Chuokoron-Shinsha"
                        class="text-decoration-none text-reset"> Chuokoron-Shinsha</a>
                </button>
            <?php } ?>
        </div>
        <?php


        ?>

        <!-- Table of Records -->
        <div class="col-md-10 col-lg-8">
            <?php
            // this is our query with the appended offset
            if ($publisher) {
                $result = find_by_publisher($publisher);
            } else {
                $result = find_records($per_page, $offset);
            }


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
                                <td><a href=\"view.php?id=$id\" class=\"text-danger\">View</a></td>
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