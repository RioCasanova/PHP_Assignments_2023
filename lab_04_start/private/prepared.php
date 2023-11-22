<?php require_once("/home/rcasanova2/data/connect.php"); ?>
<?php
/// this is where we are creating methods to retrieve information from our database -------------
// Prepared Statements

$select_all_results_sql = $connection->prepare("SELECT * FROM rcasanova2_attractions");
$select_results_by_category = $connection->prepare("SELECT * FROM rcasanova2_attractions WHERE category = ?");
$insert_statement = $connection->prepare("INSERT INTO rcasanova2_attractions(name, category, cost, address, url, description, rating, area_of_town, family_friendly, season) VALUES(?,?,?,?,?,?,?,?,?,?)");
$select_by_id_sql = $connection->prepare("SELECT * FROM rcasanova2_attractions WHERE id = ?");
$update_statement =
    $connection->prepare("UPDATE rcasanova2_attractions 
                      SET name = ?, category = ?, cost = ?, address = ?, url = ?, description = ?, rating = ?, area_of_town = ?, family_friendly = ?, season = ? 
                      WHERE id = ?");
$delete_statement = $connection->prepare("DELETE FROM rcasanova2_attractions WHERE id = ?");



// HOME PAGE - 
function get_all_attractions()
{
    global $connection;
    global $select_all_results_sql;
    // LOAD ALL RESULTS FROM THE DATABASE

    if (!$select_all_results_sql->execute()) { // this is saying that if the statement isn't executed do this
        handle_database_error("Fetching all results for home page");
    }

    $result = $select_all_results_sql->get_result(); // this returns the object from our query
    $atts = [];
    while ($row = $result->fetch_assoc()) { // fetch returns a row of data and stores it in an associative array

        $atts[] = $row;
    }
    return $atts;
}

// LOAD RESULTS ACCORDING TO CATEGORY
function filter_by_category()
{
    global $connection;
    global $select_results_by_category;
    $category = $_GET['category'];

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }


    $select_results_by_category->bind_param("s", $category);

    if (!$select_results_by_category->execute()) {
        handle_database_error("Fetching all results for home page");
    }
    $result = $select_results_by_category->get_result();
    $atts = [];
    while ($row = $result->fetch_assoc()) {
        $atts[] = $row;
    }
    return $atts;
}
// ADD PAGE - THIS IS WHERE THE CODE FOR INSERTING DATA WILL BE
// INSERT
function insert_attraction($attraction_name, $category, $cost, $address, $url, $description, $rating, $area, $friendly, $season)
{
    global $connection;
    global $insert_statement;
    $insert_statement->bind_param("ssssssisis", $attraction_name, $category, $cost, $address, $url, $description, $rating, $area, $friendly, $season);
    if (!$insert_statement->execute()) {
        handle_database_error("inserting attraction");
    }
}

// EDIT PAGE - THIS IS WHERE WE WILL UPDATE AND DELTE RECORDS FROM THE DATABASE
function select_attraction_by_id($attraction_id)
{
    global $connection;
    global $select_by_id_sql;
    $select_by_id_sql->bind_param("i", $attraction_id);
    if (!$select_by_id_sql->execute()) {
        handle_database_error("Selecting attraction by id");
    }

    $result = $select_by_id_sql->get_result();
    $attraction = $result->fetch_assoc();
    return $attraction;
}


// UPDATE
function update_attraction($attraction_name, $category, $cost, $address, $url, $description, $rating, $area, $friendly, $season, $attraction_id)
{
    global $connection;
    global $update_statement;

    $update_statement->bind_param("ssssssisisi", $attraction_name, $category, $cost, $address, $url, $description, $rating, $area, $friendly, $season, $attraction_id);
    $update_statement->execute();
    if (!$update_statement->execute()) {
        handle_database_error("updating attraction");
    }
}


// DELETE
// DELETE ATTRACTION BY ID

function delete_attraction($attraction_id)
{
    global $connection;
    global $delete_statement;
    $delete_statement->bind_param("i", $attraction_id);
    $delete_statement->execute();
    if (!$delete_statement->execute()) {
        handle_database_error("deleting attraction");
    }
}

// ERROR HANDLING
function handle_database_error($statement)
{
    global $connection;
    die("Error in: " . $statement . ". Error Details: " . $connection->error);
}

?>