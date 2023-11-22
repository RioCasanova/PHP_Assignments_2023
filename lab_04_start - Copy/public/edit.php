<?php require_once("/home/rcasanova2/data/connect.php"); ?>
<?php require_once("../private/prepared.php"); ?>
<?php
session_start();
if (isset($_SESSION['spiderman'])) {
    $txtMsg = "You are now logged in";

} else {

    header("Location:login.php");
}
if (isset($_POST["logout"])) {
    session_destroy();
    header("Location:login.php");
} else if (isset($_POST["home"])) {
    session_destroy();
    header("Location:index.php");
}



$attraction_id = isset($_GET['attraction_id']) ? $_GET['attraction_id'] : "";
if (isset($_GET['attraction_id'])) {
    $attraction_id = $_GET['attraction_id'];
} elseif (isset($_POST['attraction_id'])) {
    $attraction_id = $_POST['attraction_id'];
} else {
    $attraction_id = "";
}

// Define variables
$message = "";
$update_message = "";

$user_attraction_name = isset($_POST['attraction_name']) ? trim($_POST['attraction_name']) : "";
$user_category = isset($_POST['category']) ? trim($_POST['category']) : "";
$user_cost = isset($_POST['cost']) ? trim($_POST['cost']) : "";
$user_address = isset($_POST['address']) ? trim($_POST['address']) : "";
$user_url = isset($_POST['url']) ? trim($_POST['url']) : "";
$user_rating = isset($_POST['rating']) ? trim($_POST['rating']) : "";
$user_description = isset($_POST['description']) ? trim($_POST['description']) : "";
$user_area_of_town = isset($_POST['area']) ? trim($_POST['area']) : "";
$user_family_friendly = isset($_POST['friendly']) ? trim($_POST['friendly']) : "";
$user_season = isset($_POST['season']) ? trim($_POST['season']) : "";

$existing_attraction = "";
$existing_name = "";
$existing_category = "";
$existing_cost = "";
$existing_address = "";
$existing_url = "";
$existing_rating = "";
$existing_description = "";
$existing_area = "";
$existing_friendly = "";
$existing_season = "";


if (isset($attraction_id) && $attraction_id > 0) {
    $attraction = select_attraction_by_id($attraction_id);
    if ($attraction) {
        $existing_name = $attraction['name'];
        $existing_category = $attraction["category"];
        $existing_cost = $attraction["cost"];
        $existing_address = $attraction["address"];
        $existing_url = $attraction["url"];
        $existing_rating = $attraction["rating"];
        $existing_description = $attraction["description"];
        $existing_area = $attraction["area_of_town"];
        $existing_friendly = $attraction["family_friendly"];
        $existing_season = $attraction["season"];
    } else {
        echo "<p>No record of that</p>";
    }
}

if (isset($_POST['submit'])) {


    $proceed = true;
    // DESCRIPTION
    $user_description = filter_var($user_description, FILTER_SANITIZE_STRING);
    $user_description = mysqli_real_escape_string($connection, $user_description);
    if (strlen($user_description) < 2 || strlen($user_description) > 250) {
        $proceed = false;
        $update_message .= "\n<p>Please enter a description that is either less than 250 characters or more than 2.</p>";
    }

    // ATTRACTION NAME
    $user_attraction_name = filter_var($user_attraction_name, FILTER_SANITIZE_STRING);
    $user_attraction_name = mysqli_real_escape_string($connection, $user_attraction_name);
    if (strlen($user_attraction_name) < 2 || strlen($user_attraction_name) > 30) {
        $proceed = false;
        $update_message .= "\n<p>Please enter an attraction name that is between 2 and 30 characters in length.</p>";
    }

    // URL
    $user_url = filter_var($user_url, FILTER_SANITIZE_URL);
    $url_arr = get_headers($user_url);
    $response = $url_arr[0];
    if (strpos($response, "200")) {

    } else {
        $proceed = false;
        $update_message .= "\n<p>URL INVALID: Please enter a URL that leads to a current site. If there is not site to be entered, lead the link back to the home page.</p>";
    }

    // ADDRESS
    $user_address = filter_var($user_address, FILTER_SANITIZE_STRING);
    $user_address = mysqli_real_escape_string($connection, $user_address);
    if (strlen($user_address) < 2 || strlen($user_address) > 30) {
        $proceed = false;
        $update_message .= "\n<p>Please enter an address that is between 2 and 30 characters in length.</p>";
    }

    if ($proceed == true) {
        update_attraction(
            $user_attraction_name,
            $user_category,
            $user_cost,
            $user_address,
            $user_url,
            $user_description,
            $user_rating,
            $user_area_of_town,
            $user_family_friendly,
            $user_season,
            $attraction_id
        );

        $message .= "<p>" . $user_attraction_name . " updated successfully.</p>";

        $attraction_id = "";
        $user_attraction_name = "";
        $user_category = "";
        $user_cost = "";
        $user_address = "";
        $user_url = "";
        $user_rating = "";
        $user_description = "";
        $user_area_of_town = "";
        $user_family_friendly = "";
        $user_season = "";
    }
}
if (isset($_POST['delete'])) {
    delete_attraction($attraction_id);
    $message = "<p>" . $existing_name . " successfully removed.</p>";
    $attraction_id = "";
}
?>


<?php include("includes/header.php") ?>

<body class="container">
    <header class="mt-5">
        <nav class="mb-5 pb-5">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" class="">
                <input type="submit" class="btn btn-dark" name="home" value="Home">
                <a href="add.php" class="btn btn-success">Add a Record</a>
                <input type="submit" class="btn btn-secondary" name="logout" value="Logout">
            </form>
        </nav>
        <div class="">
            <h1 class="fw-light text-center mt-5">Edit a Record</h1>
            <p class="text-muted text-center  mb-5">To edit a record in our database, click 'Edit' beside the row you
                would
                like to change. Next add your updated values into the form and save. If you wish to delete a record
                press edit and you will find the delete button there.</p>
        </div>
        <?php if (isset($update_message)): ?>
            <div class="message text-danger">
                <?php echo $update_message; ?>
            </div>

        <?php endif; ?>
    </header>
    <main>
        <section>
            <?php if ($message != ""): ?>
                <div class="alert alert-info">
                    <?php echo $message ?>
                </div>
            <?php endif; ?>
            <?php
            $attractions = get_all_attractions();
            if (count($attractions) > 0) {
                echo "\n<table class=\"table table-bordered table-hover\"> ";
                echo "\n\t<tr>";
                echo "\n\t\t<th scope=\"col\">Name</th>";
                echo "\n\t\t<th scope=\"col\">Category</th>";
                echo "\n\t\t<th scope=\"col\">Website</th>";
                echo "\n\t\t<th scope=\"col\">Actions</th>";
                foreach ($attractions as $attraction) {
                    extract($attraction);
                    echo "\n\t\t<tr><td>$name</td>";
                    echo "<td>$category</td>";
                    echo "<td><a href=\"$url\" class=\"text-decoration-none text-center\">Link</a></td>";
                    echo "<td class=\"text-center\"><a href=\"edit.php?attraction_id=$id\" class=\"btn-warning btn\">Edit</a></td>";
                    echo "\n\t</tr>";
                }
                echo "\n</table>";
            }
            ?>
        </section>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title fs-5" id="exampleModalLabel">
                            Edit
                            <?php echo $existing_name ?>
                        </h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <!-- EDIT FORM -->
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                            <div class="mb-3">
                                <label for="attraction_name" class="form-label">Attraction Name</label>
                                <input type="text" id="attraction_name" name="attraction_name" class="form-control"
                                    value="<?php if ($user_attraction_name != "") {
                                        echo $user_attraction_name;
                                    } else {
                                        echo $existing_name;
                                    } ?>">
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select name="category" id="category" class="form-select">
                                    <?php $categories =
                                        [
                                            'Shopping' => 'Shopping',
                                            'Historical Buildings & Monuments' => 'Historical Buildings & Monuments',
                                            'Parks & Natural Attractions' => 'Parks & Natural Attractions',
                                            'Fine Arts' => 'Fine Arts',
                                            'Science & Technology' => 'Science & Technology',
                                            'Live Music & Theatre' => 'Live Music & Theatre',
                                            'Recreational Facilities' => 'Recreational Facilities',
                                            'Year-Round Attractions' => 'Year-Round Attractions',
                                            'Restaurants & Food Vendors' => 'Restaurants & Food Vendors',
                                            'Festivals' => 'Festivals'
                                        ];

                                    foreach ($categories as $key => $value) {
                                        if ($user_category == $key || $existing_category == $key) {
                                            $selected = 'selected';
                                        } else {
                                            $selected = '';
                                        }
                                        echo "\n<option value=\"$key\" $selected>$value</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="cost" class="form-label">Cost</label>
                                <select name="cost" id="cost" class="form-select">
                                    <?php $costs =
                                        [
                                            '$$$' => '$$$',
                                            '$$' => '$$',
                                            '$' => '$',
                                            'free' => 'free'
                                        ];

                                    foreach ($costs as $key => $value) {
                                        if ($user_cost == $key || $existing_cost == $key) {
                                            $selected = 'selected';
                                        } else {
                                            $selected = '';
                                        }
                                        echo "\n<option value=\"$key\" $selected>$value</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" id="address" name="address" class="form-control" value="<?php if ($user_address != "") {
                                    echo $user_address;
                                } else {
                                    echo $existing_address;
                                } ?>">
                            </div>
                            <div class="mb-3">
                                <label for="url" class="form-label">URL</label>
                                <input type="text" id="url" name="url" class="form-control" value="<?php if ($user_url != "") {
                                    echo $user_url;
                                } else {
                                    echo $existing_url;
                                } ?>">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input type="text-area" id="description" name="description" class="form-control" value="<?php if ($user_description != "") {
                                    echo $user_description;
                                } else {
                                    echo $existing_description;
                                } ?>">
                            </div>
                            <div class="mb-3">
                                <label for="rating" class="form-label">Rating</label>
                                <select name="rating" id="rating" class="form-select">
                                    <?php $ratings =
                                        [
                                            '1' => '1',
                                            '2' => '2',
                                            '3' => '3',
                                            '4' => '4',
                                            '5' => '5'
                                        ];

                                    foreach ($ratings as $key => $value) {
                                        if ($user_rating == $key || $existing_rating == $key) {
                                            $selected = 'selected';
                                        } else {
                                            $selected = '';
                                        }
                                        echo "\n<option value=\"$key\" $selected>$value</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="area" class="form-label">Area of Town</label>
                                <select name="area" id="area" class="form-select">
                                    <?php $areas =
                                        [
                                            'West Edmonton' => 'West Edmonton',
                                            'Southwest Edmonton' => 'Southwest Edmonton',
                                            'Northwest Edmonton' => 'Northwest Edmonton',
                                            'Downtown' => 'Downtown',
                                            'East Edmonton' => 'East Edmonton',
                                            'Southeast Edmonton' => 'Southeast Edmonton',
                                            'Northeast Edmonton' => 'Northeast Edmonton',
                                            'Central Edmonton' => 'Central Edmonton',
                                            'South Central Edmonton' => 'South Central Edmonton',
                                            'North Central Edmonton' => 'North Central Edmonton',
                                            'South Edmonton' => 'South Edmonton',
                                            'North Edmonton' => 'North Edmonton',
                                            'University Area' => 'University Area',
                                            'Westmount' => 'Westmount',
                                            'Various' => 'Multiple Locations'
                                        ];

                                    foreach ($areas as $key => $value) {
                                        if ($user_area_of_town == $key || $existing_area == $key) {
                                            $selected = 'selected';
                                        } else {
                                            $selected = '';
                                        }
                                        echo "\n<option value=\"$key\" $selected>$value</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="friendly" class="form-label">Family Friendly</label>
                                <select name="friendly" id="friendly" class="form-select">
                                    <?php $friendlys =
                                        [
                                            '1' => 'Yes',
                                            '0' => 'No'
                                        ];

                                    foreach ($friendlys as $key => $value) {
                                        if ($user_family_friendly == $key || $existing_friendly == $key) {
                                            $selected = 'selected';
                                        } else {
                                            $selected = '';
                                        }
                                        echo "\n<option value=\"$key\" $selected>$value</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="season" class="form-label">Season</label>
                                <select name="season" id="season" class="form-select">
                                    <?php $seasons =
                                        [
                                            'Year-round' => 'Year-round',
                                            'Summer' => 'Summer',
                                            'Winter' => 'Winter'
                                        ];

                                    foreach ($seasons as $key => $value) {
                                        if ($user_season == $key || $existing_season == $key) {
                                            $selected = 'selected';
                                        } else {
                                            $selected = '';
                                        }
                                        echo "\n<option value=\"$key\" $selected>$value</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <!-- Hidden Values -->
                            <input type="hidden" name="attraction_id" value="<?php echo $attraction_id; ?>">
                            <!-- Because we're storing our city id number in $_GET, we need to include it here again; otherwise, we may lose it when we submit the form and nothing will happen. -->

                            <!-- Submit -->
                            <input type="submit" value="Save" name="submit" class="btn btn-success">
                            <input type="submit" value="Delete" name="delete" class="btn btn-danger">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Modal -->
    </main>
    <?php include("includes/footer.php") ?>