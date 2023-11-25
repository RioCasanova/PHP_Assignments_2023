<?php require_once("/home/rcasanova2/data/connect.php") ?>
<?php include("includes/functions.php"); ?>
<?php

$title = "Advanced Search: The Comic Chronicler";
include('includes/header.php');


#region Fields
// VARIABLES
$search_field = isset($_GET['search_field']) ? trim($_GET['search_field']) : "";
$search_by = isset($_GET['search_by']) ? trim($_GET['search_by']) : "";
$search_publisher = isset($_GET['publisher_filter']) ? $_GET['publisher_filter'] : array("");
$search_year_start = isset($_GET['search_year_start']) ? trim($_GET['search_year_start']) : "";
$search_year_end = isset($_GET['search_year_end']) ? trim($_GET['search_year_end']) : "";
$sort_type = isset($_GET['sort_type']) ? trim($_GET['sort_type']) : "";

// VALIDATION - only mandatory fields
if (isset($_GET['submit-btn'])) {
    global $connection;
    $message = ""; // cumulitave validation message
    $proceed = true; // Bool for whether validation has passed

    // search for
    $search_field = filter_var($search_field, FILTER_SANITIZE_STRING);
    $search_field = mysqli_real_escape_string($connection, $search_field);
    if (strlen($search_field) < 2 || strlen($search_field) > 30) {
        $proceed = false;
        $message .= "\n<p>Please enter a value that is greater than two characters and less than 30.</p>";
    }
    // search by
    if ($search_by == 'null') {
        $proceed = false;
        $message .= "\n<p>Please choose a category to search by.</p>";
    }
    // sort order
    if ($sort_type == 'null') {
        $proceed = false;
        $message .= "\n<p>Please choose how you would like the information to be sorted.</p>";
    }
}
#endregion




?>

<main class="container">
    <section class="row justify-content-center mb-5">
        <div class="col col-md-10 col-xl-8">
            <h2 class="display-5 m-5 row justify-content-center">Advanced Search</h2>
        </div>

        <!-- Form start -->
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="get"
            class="mb-5 formstyle col-lg-6 border border-danger p-4 mb-2 border-opacity-25 rounded">
            <!-- Error messages -->
            <?php if (isset($message)): ?>
                <div class="alert alert-warning">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>


            <!-- Search for -->
            <fieldset class="mt-4">
                <legend class="fs-5 fw-semibold">Search</legend>
                <div>
                    <label for="search_field">Search for:</label>
                    <input type="text" class="form-control" name="search_field"
                        value="<?php echo isset($_GET['search_field']) ? htmlspecialchars($_GET['search_field']) : ''; ?>">

                </div>
            </fieldset>

            <!-- Search by -->
            <fieldset class="my-3">
                <div class="mb-3">
                    <label for="">Search by:</label>
                    <select name="search_by" id="search_by" name="search_by" class="form-select">
                        <?php $categories =
                            [
                                'null' => 'Select Category',
                                'title' => 'Title',
                                'writer' => 'Writer',
                                'artist' => 'Artist',
                                'genre' => 'Genre',
                                'characters' => 'Characters'
                            ];

                        foreach ($categories as $key => $value) {
                            if ($search_by == $key) {
                                $selected = 'selected';
                            } else {
                                $selected = '';
                            }
                            echo "\n<option value=\"$key\" $selected>$value</option>";
                        }
                        ?>
                    </select>
                </div>
            </fieldset>

            <!-- Publisher -->
            <fieldset>
                <legend class="fs-5 fw-semibold">Publisher</legend>

                <!-- checkboxes -->
                <div>
                    <input type="checkbox" class="form-check-input" name="publisher_filter[]" id="marvel"
                        value="'Marvel Comics'" <?php if (isset($_GET['publisher_filter']) && in_array("Marvel Comics", $_GET['publisher_filter']))
                            echo 'checked'; ?>>
                    <label for="marvel" class="form-check-label">Marvel Comics</label>
                </div>

                <div>
                    <input type="checkbox" class="form-check-input" name="publisher_filter[]" id="DC"
                        value="'DC Comics'" <?php if (isset($_GET['publisher_filter']) && in_array("DC Comics", $_GET['publisher_filter']))
                            echo 'checked'; ?>>
                    <label for="DC" class="form-check-label">DC Comics</label>
                </div>
            </fieldset>




            <!-- Year Publication -->
            <fieldset class="my-4 container ">
                <div class="row">
                    <legend class="fs-5 mb-2 ps-0 fw-semibold">Year of Publication </legend>
                    <div class="col ps-0">
                        <label for="search_year_start" class="form-label">from year:</label>
                        <input type="number" class="form-control" id="search_year_start" name="search_year_start"
                            min="1962" max="2018"
                            value="<?php echo ($search_year_start != "") ? $search_year_start : 1962; ?>">
                    </div>
                    <div class="col">
                        <label for="search_year_end" class="form-label">to year:</label>
                        <input type="number" class="form-control" id="search_year_end" name="search_year_end" min="1962"
                            max="2018" value="<?php echo ($search_year_end != "") ? $search_year_end : 2018; ?>">
                    </div>
                </div>
            </fieldset>



            <!-- Sort Order -->
            <fieldset class="my-3">
                <legend class="fs-5 fw-semibold pb-0 mb-0">Sort Order: </legend>
                <p class="text-muted">sorts by what you are searching by (ex. Title)</p>
                <div class="mb-3">
                    <div class="form-check m-0 ">
                        <input class="form-check-input " value="ASC" type="radio" name="sort_type" id="ascending"
                            <?php echo ($sort_type == 'ASC') ? 'checked="checked"' : ""; ?>>
                        <label class="form-check-label" for="sort_type">
                            Ascending
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="DESC" type="radio" name="sort_type" id="descending"
                            <?php echo $sort_type == 'DESC' ? 'checked="checked"' : ''; ?>>
                        <label class="form-check-label" for="sort_type">
                            Descending
                        </label>
                    </div>
                </div>
            </fieldset>



            <div class="mb-3">
                <input type="submit" id="submit" name="submit" class="btn btn-outline-danger" value="Search">
            </div>
        </form>


        <?php

        // Results table -- UN-COMMENT THE RAADIO BUTTON
        
        $query = "SELECT id, title, writer, artist, genre, publisher, year FROM lab05_comic_books";

        if (isset($_GET['submit'])) {

            // search by
        
            if (isset($_GET['search_by']) && !empty($_GET['search_by'])) {
                // appending to the value of $query
                $query .= " WHERE $search_by";
            }


            // text search
        
            if (isset($_GET['search_field']) && !empty($_GET['search_field'])) {
                $text_search = $connection->real_escape_string($_GET['search_field']);
                // appending to the value of $query
                $query .= " LIKE '%$text_search%'";
            }

            // publisher filter
        
            if (!in_array("", $search_publisher)) {
                $query .= " AND publisher IN (" . implode(", ", $search_publisher) . ")";
            }

            // year of publication
        
            if ($search_year_start != "" && $search_year_end != "") {
                $query .= " AND year BETWEEN $search_year_start AND $search_year_end";
            }


            // sort order
        
            if ($sort_type != "" && $sort_type != "") {
                $query .= " ORDER BY $search_by $sort_type";
            }
            // just for learning and testing, let's see our entire query
        
            echo "\n<div class=\"alert alert-info\"><b>Query:</b><br> " . $query . "</div>";


            $result = $connection->query($query);
            if ($connection->error) {
                echo $connection->error;
            } else {
                if ($result->num_rows > 0) {
                    echo "<table  class=\"table table-bordered\">";
                    echo "<tr class=\"bg-dark text-light\">";
                    echo "<th scope=\"col\">Title</th>";
                    echo "<th scope=\"col\">Writer</th>";
                    echo "<th scope=\"col\">Artist</th>";
                    echo "<th scope=\"col\">Genre</th>";
                    echo "<th scope=\"col\">Publisher</th>";
                    echo "<th scope=\"col\">Year</th>";
                    echo "<th scope=\"col\">View</th>";
                    echo "</tr>";
                    while ($row = $result->fetch_assoc()) {
                        extract($row);
                        echo "<tr>
                    <td>$title</td>
                    <td>$writer</td>
                    <td>$artist</td>
                    <td>$genre</td>
                    <td>$publisher</td>
                    <td>$year</td>
                    <td><a href=\"view.php?id=$id\" class=\"text-danger\">View</a></td>
                    </tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p>Sorry there are no records available that match your query</p>";
                }


            }


        } // \ if submit
        


        ?>
    </section>
</main>


<?php

include('includes/footer.php');

?>