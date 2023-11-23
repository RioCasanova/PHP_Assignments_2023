<?php



#region Pagination Setup
function find_records($limit = 0, $offset = 0)
{
    global $connection;
    $sql = "SELECT title, writer, artist FROM lab05_comic_books";
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
    $sql = "SELECT title, writer, artist, year 
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

#region CHARACTER
function find_by_character($limit = 0, $offset = 0, $character)
{
    global $connection;
    $sql = "SELECT title, writer, artist, year 
            FROM lab05_comic_books 
            WHERE year LIKE '$character%'
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
function count_records_character()
{
    global $connection;
    $character = isset($_GET['character']) ? $_GET['character'] : "";
    if (!$character) {
        $sql = "SELECT COUNT(*) FROM lab05_comic_books";
    } else {
        $sql = "SELECT COUNT(*) FROM lab05_comic_books WHERE year LIKE '$character%'";
    }

    $results = mysqli_query($connection, $sql);
    $fetch = mysqli_fetch_row($results);
    return $fetch[0];
}
#endregion

#region GENRE
function find_by_genre($limit = 0, $offset = 0, $genre)
{
    global $connection;
    $sql = "SELECT title, writer, artist, year 
            FROM lab05_comic_books 
            WHERE year LIKE '$genre%'
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
function count_records_genre()
{
    global $connection;
    $genre = isset($_GET['genre']) ? $_GET['genre'] : "";
    if (!$genre) {
        $sql = "SELECT COUNT(*) FROM lab05_comic_books";
    } else {
        $sql = "SELECT COUNT(*) FROM lab05_comic_books WHERE year LIKE '$genre%'";
    }

    $results = mysqli_query($connection, $sql);
    $fetch = mysqli_fetch_row($results);
    return $fetch[0];
}
#endregion


#region Error Handling
function handle_database_error($statement)
{
    global $connection;
    die("Error in: " . $statement . ". Error Details: " . $connection->error);
}
#endregion


?>