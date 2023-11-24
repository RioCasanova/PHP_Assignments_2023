<?php

$title = "Advanced Search: The Comic Chronicler";
include('includes/header.php');

?>

<main class="container">
    <section class="row justify-content-center mb-5">
        <div class="col col-md-10 col-xl-8">
            <h2 class="display-5 mb-5">Advanced Search</h2>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="GET"
            class="mb-5 formstyle col-lg-8 border border-primary p-4 mb-2 border-opacity-25 rounded">
            <?php if (isset($message)): ?>
                <div class="alert alert-success">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>


            <!-- TITLE SEARCH -->
            <div class="mb-3">
                <label for="search_field" class="form-label fw-semibold">Search for:</label>
                <input type="text" id="search_field" name="search_field" class="form-control"
                    value="<?php echo isset($_GET['search_field']) ? $_GET['search_field'] : "" ?>">
            </div>

            <!-- COLUMN / FILTER -->
            <div class="mb-3">
                <label for="column" class="form-label fw-semibold">Search by:</label>
                <select name="column" id="column" class="form-select">
                    <?php
                    // associative array needs to be used here to get all of the columns and populate
                    if (isset($_GET['column']) && !empty($_GET['column'])) {
                        $columns_list =
                            [
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
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="1" name="publisher_filter" id="publisher_filter"
                    <?php echo ($publisher_filter == 1) ? 'checked="checked"' : ""; ?>>
                <label class="form-check-label" for="publisher_filter">
                    Marvel Comics
                </label>
                <input class="form-check-input" type="checkbox" value="2" name="publisher_filter" id="publisher_filter"
                    <?php echo ($publisher_filter == 2) ? 'checked="checked"' : ""; ?>>
                <label class="form-check-label" for="publisher_filter">
                    DC Comics
                </label>
            </div>

            <!-- YEAR TIMESPAN SEARCH -->
            <div class="mb-3">
                <label for="search_field" class="form-label fw-semibold">From Year:</label>
                <input type="text" id="search_field" name="search_field" class="form-control"
                    value="<?php echo isset($_GET['search_field']) ? $_GET['search_field'] : "" ?>">
                <label for="search_field" class="form-label fw-semibold">To Year:</label>
                <input type="text" id="search_field" name="search_field" class="form-control"
                    value="<?php echo isset($_GET['search_field']) ? $_GET['search_field'] : "" ?>">
            </div>


            <!-- SORT ORDER -->
            <div class="form-check m-0 p-0">
                <div class="ps-2 mb-3">
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