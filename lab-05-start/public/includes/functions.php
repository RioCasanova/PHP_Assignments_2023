<?php require_once("/home/rcasanova2/data/connect.php"); ?>
<?php



#region Pagination Setup
function find_records($limit = 0, $offset = 0)
{
    global $connection;
    $sql = "SELECT id, title, writer, artist FROM lab05_comic_books";
    if ($limit > 0) {
        $sql .= " LIMIT " . $limit;
    }
    if ($offset > 0) {
        $sql .= " OFFSET " . $offset;
    }

    $result = $connection->query($sql);
    return $result;
}
function count_records()
{
    global $connection;
    $sql = "SELECT COUNT(*) FROM lab05_comic_books";
    $results = mysqli_query($connection, $sql);
    $fetch = mysqli_fetch_row($results);
    return $fetch[0];
}


#endregion

#region DECADE
function find_by_decade($limit = 0, $offset = 0, $decade)
{
    global $connection;
    $sql = "SELECT id, title, writer, artist, year 
            FROM lab05_comic_books 
            WHERE year LIKE '$decade%'
            ORDER BY year DESC";

    if ($limit > 0) {
        $sql .= " LIMIT " . $limit;
    }
    if ($offset > 0) {
        $sql .= " OFFSET " . $offset;
    }

    $result = $connection->query($sql);
    return $result;
}
function count_records_decade()
{
    global $connection;
    $decade = isset($_GET['decade']) ? $_GET['decade'] : "";
    if (!$decade) {
        $sql = "SELECT COUNT(*) FROM lab05_comic_books";
    } else {
        $sql = "SELECT COUNT(*) FROM lab05_comic_books WHERE year LIKE '$decade%'";
    }

    $results = mysqli_query($connection, $sql);
    $fetch = mysqli_fetch_row($results);
    return $fetch[0];
}
#endregion

#region PUBLISHER
function find_by_publisher($publisher)
{
    global $connection;
    $sql = "SELECT id, title, writer, artist, publisher 
            FROM lab05_comic_books 
            WHERE publisher LIKE '%$publisher%'
            ORDER BY publisher DESC";

    $result = $connection->query($sql);
    return $result;
}
function count_records_publisher()
{
    global $connection;
    $publisher = isset($_GET['publisher']) ? $_GET['publisher'] : "";
    if (!$publisher) {
        $sql = "SELECT COUNT(*) FROM lab05_comic_books";
    } else {
        $sql = "SELECT COUNT(*) FROM lab05_comic_books WHERE publisher LIKE '%$publisher%'";
    }

    $results = mysqli_query($connection, $sql);
    $fetch = mysqli_fetch_row($results);
    return $fetch[0];
}
#endregion

#region GENRE
function find_by_genre($limit = 0, $offset = 0, $category)
{
    global $connection;
    $sql = "SELECT id, title, writer, artist, genre 
            FROM lab05_comic_books 
            WHERE genre LIKE '%$category%'
            ORDER BY genre DESC";

    if ($limit > 0) {
        $sql .= " LIMIT " . $limit;
    }
    if ($offset > 0) {
        $sql .= " OFFSET " . $offset;
    }

    $result = $connection->query($sql);
    return $result;
}
function count_records_genre()
{
    global $connection;
    $category = isset($_GET['genre']) ? $_GET['genre'] : "";
    if (!$category) {
        $sql = "SELECT COUNT(*) FROM lab05_comic_books";
    } else {
        $sql = "SELECT COUNT(*) FROM lab05_comic_books WHERE genre LIKE '%$category%'";
    }

    $results = mysqli_query($connection, $sql);
    $fetch = mysqli_fetch_row($results);
    return $fetch[0];
}
#endregion

#region VIEW 
function get_comic($id)
{
    global $connection;
    $sql = $connection->prepare("SELECT * FROM lab05_comic_books WHERE id = ?");
    $sql->bind_param('i', $id);
    if (!$sql->execute()) {
        handle_database_error("selecting single record by id");
    }

    $result = $sql->get_result();
    $comic = $result->fetch_assoc();
    return $comic;
}
#endregion

#region FEATURED TITLE
function get_featured_title()
{
    $comic_id = rand(1, count_records());
    $comic = get_comic($comic_id);
    return $comic;
}

#endregion

#region SEARCH RESULTS
function get_search_results($limit = 0, $offset = 0, $search)
{
    global $connection;
    $sql = "SELECT * FROM lab05_comic_books WHERE title LIKE '%$search%'
                                               OR artist LIKE '%$search%'
                                               OR writer LIKE '%$search%'
                                               OR publisher LIKE '%$search%'
                                               OR year LIKE '%$search%'
                                               OR genre LIKE '%$search%'
                                               OR characters LIKE '%$search%'";
    if ($limit > 0) {
        $sql .= " LIMIT " . $limit;
    }
    if ($offset > 0) {
        $sql .= " OFFSET " . $offset;
    }

    $comics = $connection->query($sql);
    return $comics;
}

function count_records_search()
{
    global $connection;
    $search = isset($_GET['search']) ? $_GET['search'] : "";
    $sql = "SELECT COUNT(*) FROM lab05_comic_books  WHERE title LIKE '%$search%'
                                                       OR artist LIKE '%$search%'
                                                       OR writer LIKE '%$search%'
                                                       OR publisher LIKE '%$search%'
                                                       OR year LIKE '%$search%'
                                                       OR genre LIKE '%$search%'
                                                       OR characters LIKE '%$search%'";
    $results = mysqli_query($connection, $sql);
    $fetch = mysqli_fetch_row($results);
    return $fetch[0];
}

#endregion

#region ADVANCED SEARCH

#endregion

#region Error Handling
function handle_database_error($statement)
{
    global $connection;
    die("Error in: " . $statement . ". Error Details: " . $connection->error);
}
#endregion


?>