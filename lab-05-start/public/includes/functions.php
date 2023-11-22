<?php


#region Pagination Setup
function count_records()
{
    global $connection;
    $sql = "SELECT COUNT(*) FROM lab05_comic_books";
    $results = mysqli_query($connection, $sql);
    $fetch = mysqli_fetch_row($results);
    return $fetch[0];
}

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
#endregion





?>