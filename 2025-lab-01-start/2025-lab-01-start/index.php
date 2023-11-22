<?php
$number_of_assignments = isset($_POST['number_of_assignments']);
$remaining_assessments = isset($_POST['$remaining_assessments']);
$desired_grade = isset($_POST['desired_grade']);
$submitOne = isset($POST['submitOne']);




/*
    Outstanding Requirements

    - setup basic error handling
    - have values stay in their input fields after submission
*/

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Grade Calculator</title>
</head>

<div class="container">
    <main>
        <div class="py-5 text-center">
            <h1>Final Grade Calculator</h1>
            <p class="lead">Welcome to the final grade calculator</p>
        </div>
        <div class="row g-6 ">
            <div class="col-md-12 ">
                <form action="index.php?number_of_assignments=<?php echo $number_of_assignments; ?>" method="post">
                    <div class="row g-3 p-3 bg-primary-subtle rounded">
                        <p>To get started, please enter the number of assignments that you' ve completed so far </p>
                        <div class="col-12">
                            <label for="number_of_assignments" class="form-label">Number of Assignments:</label>
                            <input type="number" class="form-control" id="number_of_assignments"
                                name="number_of_assignments" value="<?php echo $_POST['number_of_assignments']; ?>"
                                placeholder="0">
                        </div>
                        <p class="mb-3">How many assignments have you already completed in this course?
                        </p>
                        <input class="w-25 btn btn-primary btn-md" type="submit" name="submitOne"
                            value="Generate Rows"></input>
                    </div>
                </form>
            </div>
        </div>


        <?php

        if (isset($_POST['number_of_assignments'])) {
            $number_of_assignments = intval($_POST['number_of_assignments']);
            if ($number_of_assignments <= 0) {
                echo "<div class='alert alert-warning'>Invalid number of assignments. Please enter a positive number.</div>";
            } else {
                echo "<div class='row g-6'>";
                echo "<div class='col-md-12'>";
                echo "<form action=\"index.php?number_of_assignments=<?php echo $number_of_assignments; ?>\" method='post'>";
                echo "<div class='row g-3 my-4 p-3 bg-primary-subtle rounded'>";
                echo "<input type='hidden' name='number_of_assignments' value='$number_of_assignments'>";
            }

            echo "<p>Next, for each assignment, add the grade that you received and the assignments overall weight</p>";
            for ($i = 1; $i <= $number_of_assignments; $i++) {

                echo "<div class='col-6'>";
                echo "<label for='assignment$i' class='form-label'>Assignment $i Grade:</label>";
                echo "<input type='number' class='form-control' id='assignment$i' name='assignment$i' value='' required>";
                echo "</div>";
                echo "<div class='col-6'>";
                echo "<label for='weight$i' class='form-label'>Weight:</label>";
                echo "<input type='number' class='form-control' id='weight$i' name='weight$i' value='' placeholder='' required>";
                echo "</div>";
            }


            echo "<p class='mt-5'>Finally, if you would like to calculate what you will need to get on the
            remainder of your coursework to receive a certain grade, enter your desired grade below.
            </p>
            <div class='col-12'>
                <label for='desired_grade' class='form-label'>Desired Final Grade (Optional):</label>
                <input type='number' class='form-control' id='desired_grade' value='' name='desired_grade' placeholder=''>
            </div>
                <input class='w-25 btn btn-primary btn-md ms-2' name='submitTwo' id='submitTwo' type='submit' value='Calculate Grade'></input>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
            if (isset($_POST['submitTwo'])) {
                $mark = 0;
                $weight = 0;
                $total_weight = 0;
                $total_mark = 0;
                for ($i = 1; $i <= $number_of_assignments; $i++) {
                    $mark = intval($_POST['assignment' . $i]);
                    $weight = intval($_POST['weight' . $i]);
                    if ($mark > 100 || $mark < 0) {
                        echo "<div class='alert alert-warning'>Invalid mark - must be under 100 (results omit the invalid field)</div>";
                    } else {
                        if ($weight > 100 || $weight < 0) {
                            echo "<div class='alert alert-warning'>Invalid Weight - must be under 100 (results omit the invalid field)</div>";
                        } else {
                            $total_weight += $weight;
                            $total_mark += ($weight / 100) * $mark;
                        }
                    }
                }
                $weighted_mark = ($total_mark / $total_weight) * 100;

                if (0 < intval($_POST['desired_grade'])) {
                    $desired_grade = intval($_POST['desired_grade']);
                    $required_grade = 0;
                    $remaining_weight = (100 - $total_weight) / 100;
                    $required_grade = ($desired_grade - ((1 - $remaining_weight) * $weighted_mark)) / $remaining_weight;
                    $formatted_weighted_mark = number_format($weighted_mark, 1);
                    $formatted_required_grade = number_format($required_grade, 1);
                    if ($formatted_required_grade > 100) {
                        echo "<div class='alert alert-warning'> Unfortunately you are unable to attain this final mark with the remaining weight - you would need a mark over 100%. Pick a lower value.</div>";
                    } else {
                        echo "<div class='row g-3 my-4 p-3 bg-primary-subtle rounded'>";
                        echo "<div class='col-12'>";
                        echo "<h2 class='text-center'> Average Mark: $formatted_weighted_mark </h2>";
                        echo "</div>";
                        echo "<div class='col-12'>";
                        echo "<h2 class='text-center'> Required Mark: $formatted_required_grade </h2>";
                        echo "</div>";
                        echo "<p class='text-center text-muted lead'> You must get an average of $formatted_required_grade on your remaining assessments </p<";
                        echo "</div>";
                    }

                } else {
                    $formatted_weighted_mark = number_format($weighted_mark, 1);
                    echo "<div class='row g-3 my-4 p-3 bg-primary-subtle rounded'>";
                    echo "<div class='col-12'>";
                    echo "<h2 class='text-center'> Average Mark: $formatted_weighted_mark </h2>";
                    echo "</div>";
                    echo "</div>";
                }
            }
        }
        ?>
    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>