<?php

$title = "Advanced Search: The Comic Chronicler";
include('includes/header.php');



// VARIABLES
$search_field = isset($_GET['search_field']) ? trim($_GET['search_field']) : "";
$search_by = isset($_GET['column']) ? trim($_GET['column']) : "";
$search_publisher = isset($_GET['publisher_filter']) ? trim($_GET['publisher_filter']) : "";
$search_year_start = isset($_GET['search_year_start']) ? trim($_GET['search_year_start']) : "";
$search_year_end = isset($_GET['search_year_end']) ? trim($_GET['search_year_end']) : "";
$sort_type = isset($_GET['sort_type']) ? trim($_GET['sort_type']) : "";



?>

<main class="container">
    <section class="row justify-content-center mb-5">
        <div class="col col-md-10 col-xl-8">
            <h2 class="display-5 m-5 row justify-content-center">Advanced Search</h2>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="GET"
            class="mb-5 formstyle col-lg-6 border border-primary p-4 mb-2 border-opacity-25 rounded">
            <?php if (isset($message)): ?>
                <div class="alert alert-success">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>


            <!-- SEARCH -->
            <div class="mb-3">
                <label for="search_field" class="form-label fw-bold">Search for:</label>
                <input type="text" id="search_field" name="search_field" class="form-control"
                    value="<?php echo isset($_GET['search_field']) ? $_GET['search_field'] : "" ?>">
            </div>

            <!-- COLUMN / FILTER -->
            <div class="mb-3">
                <label for="column" class="form-label fw-bold">Search by:</label>
                <select name="column" id="column" class="form-select">
                    <?php
                    // associative array needs to be used here to get all of the columns and populate
                    if (isset($_GET['column']) && !empty($_GET['column'])) {
                        $columns_list =
                            [
                                'null' => 'Select Property',
                                'title' => 'Title',
                                'artist' => 'Artist',
                                'writer' => 'Writer',
                                'genre' => 'Genre',
                                'characters' => 'Character'
                            ];
                    }
                    foreach ($columns_list as $key => $value) {
                        if ($column == $key) {
                            $selected = 'selected';
                        } else {
                            $selected = '';
                        }
                        echo "\n<option value=\"$key\" $selected>$value</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- FILTER BY PUBLISHER -->
            <p class=""><b>Publisher:</b></p>
            <div class="form-check mb-3">

                <input class="form-check-input" type="checkbox" value="1" name="publisher_filter" id="publisher_filter"
                    <?php echo ($search_publisher == 1) ? 'checked="checked"' : ""; ?>>
                <label class="form-check-label" for="publisher_filter">
                    Marvel Comics
                </label>
                <br />
                <input class="form-check-input" type="checkbox" value="2" name="publisher_filter" id="publisher_filter"
                    <?php echo ($search_publisher == 2) ? 'checked="checked"' : ""; ?>>
                <label class="form-check-label" for="publisher_filter">
                    DC Comics
                </label>
            </div>

            <!-- YEAR TIMESPAN SEARCH -->
            <p><b>Year of publication:</b></p>
            <div class="mb-3 row flex-md-nowrap">

                <div class="col">
                    <label for="search_field" class="form-label">From Year:</label>
                    <input type="text" id="search_field" name="search_field" class="form-control"
                        value="<?php echo isset($_GET['search_year_start']) ? $_GET['search_year_start'] : "" ?>">
                </div>
                <div class="col">
                    <label for="search_field" class="form-label">To Year:</label>
                    <input type="text" id="search_field" name="search_field" class="form-control"
                        value="<?php echo isset($_GET['search_year_end']) ? $_GET['search_year_end'] : "" ?>">
                </div>
            </div>


            <!-- SORT ORDER -->

            <div class="form-check m-0 p-0">
                <div class="ps-2 mb-3">
                    <p><b>Sort Order:</b></p>
                    <div class="form-check m-0 ">
                        <input class="form-check-input " value="Ascending" type="radio" name="sort_type" id="sort_type"
                            <?php echo ($sort_type == 'Ascending') ? 'checked="checked"' : ""; ?>>
                        <label class="form-check-label" for="sort_type">
                            Ascending
                        </label>
                    </div>
                    <div class="form-check m-0">
                        <input class="form-check-input" value="Descending" type="radio" name="sort_type" id="sort_type"
                            <?php echo $sort_type == 'Descending' ? 'checked="checked"' : ''; ?>>
                        <label class="form-check-label" for="sort_type">
                            Descending
                        </label>
                    </div>
                </div>
            </div> <!--  END SORT      -->
            <!-- Submit -->
            <input type="submit" value="Search" name="submit" class="btn btn-outline-danger mt-3">
        </form>
    </section>
</main>


<?php

include('includes/footer.php');

?>