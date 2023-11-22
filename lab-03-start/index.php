<?php include("includes/header.php") ?>



<main>
    <div class="my-5">
        <h1 class="text-center">Pokedex</h1>
        <p class="text-muted text-center">Welcome to the wonderful world of Pokemon!</p>
        <p class="text-muted text-center mt-2">Here you will find various questions and answers using our current
            Pokedex database</p>
    </div>
    <div class="my-5 pt-5">
        <h2 class="text-center">Questions & Answers</h2>
    </div>
    <div class="container">
        <div class="my-4 pt-3">
            <?php
            // QUESTION 1
            $sql = "SELECT * FROM pokedex" or die(mysqli_error($connection));
            $response = mysqli_query($connection, $sql);
            $num_rows = mysqli_num_rows($response);
            ?>
            <h3 class="text-center">What is the total number of Pokemon currently in the Pokedex?</h3>
            <p class="text-center">
                <?php echo "The total number of Pokemon in our database is " . $num_rows ?>
            </p>
        </div>
        <div class="my-4 pt-5">
            <?php
            // QUESTION 2
            $sql_non_legendary = "SELECT * FROM pokedex WHERE attack = (SELECT MAX(attack) FROM pokedex WHERE legendary = 0);" or die(mysqli_error($connection));
            $sql_legendary = "SELECT * FROM pokedex WHERE legendary = 1  AND attack = (SELECT MAX(attack) FROM pokedex);" or die(mysqli_error($connection));

            // response handling
            $response_non_legendary = mysqli_query($connection, $sql_non_legendary);
            $response_legendary = mysqli_query($connection, $sql_legendary);
            $non_leg_obj = $response_non_legendary->fetch_assoc();
            $leg_obj = $response_legendary->fetch_assoc();


            ?>
            <h3 class="text-center">Which Pokemon has the highest attack stat amongst Legendary Pokemon? Which one has
                the highest attack stat amongst non-legendary Pokemon?</h3>
            <p class="text-center">
                <?php echo "Highest Attack (Legendary): " . $leg_obj['name'] . "has an attack value of " . $leg_obj['attack'] ?>
            </p>
            <p class="text-center">
                <?php echo "Highest Attack (Non-Legendary): " . $non_leg_obj['name'] . " has an attack value of " . $non_leg_obj['attack'] ?>
            </p>
        </div>

        <div class="my-4 pt-5">
            <?php
            // QUESTION 3
            $sql_fire_types = "SELECT * FROM `pokedex` WHERE type_2 IS NULL AND type_1 = 'Fire'" or die(mysqli_error($connection));

            // response handling
            $response = mysqli_query($connection, $sql_fire_types);
            $num_rows = mysqli_num_rows($response);
            ?>
            <h3 class="text-center">How many Pokemon are exclusively "Fire" types?</h3>
            <p class="text-center">
                <?php echo "There are currently " . $num_rows . " Pokemon with fire for their primary type." ?>
            </p>
        </div>
        <div class="my-4 pt-5">
            <?php
            // QUESTION 4
            $sql_gen7 = "SELECT * FROM `pokedex` WHERE generation = 7 AND legendary = 1" or die(mysqli_error($connection));

            // response handling
            $response = mysqli_query($connection, $sql_gen7);

            ?>
            <h3 class="text-center">What are the names and attack stats of all the legendary Pokemon in Generation 7?
            </h3>
            <div class="container text-center">
                <div class="row">
                    <div class="row my-4">
                        <div class="col">
                            <b>Name</b>
                        </div>
                        <div class="col"><b>Attack Stats</b></div>
                    </div>
                    <?php while ($object = mysqli_fetch_array($response)) { ?>
                        <div class="row">
                            <div class="col">
                                <?php echo $object['name'] ?>
                            </div>
                            <div class="col">
                                <?php echo $object['attack'] ?>
                            </div>
                            <hr>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="my-4 pt-5">
        <?php
        // QUESTION 5
        $sql_avg_defense = "SELECT AVG(defense) FROM `pokedex`" or die(mysqli_error($connection));

        // response handling
        $response = mysqli_query($connection, $sql_avg_defense);
        $object = mysqli_fetch_array($response);
        ?>
        <h3 class="text-center">What is the average defense stat of all the Pokemon?
        </h3>
        <p class="text-center">
            <?php echo "The average defense stat of all the Pokemon in our records is: " . number_format($object['AVG(defense)'], 0) ?>
        </p>
    </div>
    <div class="my-4 pt-5">
        <?php
        // QUESTION 6
        $sql =
            "SELECT * 
        FROM `pokedex` 
        WHERE legendary = 0 
        AND speed >= 120" or die(mysqli_error($connection));

        // response handling
        $response = mysqli_query($connection, $sql);
        $object = mysqli_fetch_array($response);
        ?>
        <h3 class="text-center">What are the names and types of all the Non-Legendary Pokemon with a speed greater
            than 120?
        </h3>
        <div class="container text-center">
            <div class="row">
                <div class="row my-4">
                    <div class="col">
                        <b>Name</b>
                    </div>
                    <div class="col"><b>Type 1</b></div>
                    <div class="col"><b>Type 2</b></div>
                </div>
                <?php while ($object = mysqli_fetch_array($response)) { ?>
                    <div class="row">
                        <div class="col">
                            <?php echo $object['name'] ?>
                        </div>
                        <div class="col">
                            <?php echo $object['type_1'] ?>
                        </div>
                        <div class="col">
                            <?php echo $object['type_2'] == NULL ? "" : $object['type_2'] ?>
                        </div>
                        <hr>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="my-4 pt-5">
        <?php
        // QUESTION 7
        $sql_highest =
            "SELECT * FROM `pokedex` WHERE type_1 = 'Water'AND 
            hp = (SELECT MAX(hp) from pokedex WHERE type_1 = 'Water')" or die(mysqli_error($connection));

        $sql_lowest =
            "SELECT * FROM `pokedex` WHERE type_1 = 'Water'AND 
            hp = (SELECT MIN(hp) from pokedex WHERE type_1 = 'Water')" or die(mysqli_error($connection));

        // response handling
        $response_highest = mysqli_query($connection, $sql_highest);
        $response_lowest = mysqli_query($connection, $sql_lowest);
        $object_highest = mysqli_fetch_array($response_highest);
        $object_lowest = mysqli_fetch_array($response_lowest);

        ?>
        <h3 class="text-center">Which "Water" type Pokemon has the highest HP (HitPoints)? Which "Water" type has
            the lowest?
        </h3>
        <p class="text-center">
            <?php echo "Water-type Pokemon with the highest HP: " . $object_highest['name'] ?>
        </p>
        <p class="text-center">
            <?php echo "Water-type Pokemon with the lowest HP: " . $object_lowest['name'] ?>
        </p>
    </div>
    <div class="my-4 pt-5">
        <?php
        // QUESTION 8
        $sql_gen_1 =
            "SELECT * FROM `pokedex` WHERE generation = 1" or die(mysqli_error($connection));
        $sql_gen_2 =
            "SELECT * FROM `pokedex` WHERE generation = 2" or die(mysqli_error($connection));
        $sql_gen_3 =
            "SELECT * FROM `pokedex` WHERE generation = 3" or die(mysqli_error($connection));
        $sql_gen_4 =
            "SELECT * FROM `pokedex` WHERE generation = 4" or die(mysqli_error($connection));
        $sql_gen_5 =
            "SELECT * FROM `pokedex` WHERE generation = 5" or die(mysqli_error($connection));
        $sql_gen_6 =
            "SELECT * FROM `pokedex` WHERE generation = 6" or die(mysqli_error($connection));
        $sql_gen_7 =
            "SELECT * FROM `pokedex` WHERE generation = 7" or die(mysqli_error($connection));
        $sql_gen_8 =
            "SELECT * FROM `pokedex` WHERE generation = 8" or die(mysqli_error($connection));
        // response handling
        $response_gen_1 = mysqli_query($connection, $sql_gen_1);
        $response_gen_2 = mysqli_query($connection, $sql_gen_2);
        $response_gen_3 = mysqli_query($connection, $sql_gen_3);
        $response_gen_4 = mysqli_query($connection, $sql_gen_4);
        $response_gen_5 = mysqli_query($connection, $sql_gen_5);
        $response_gen_6 = mysqli_query($connection, $sql_gen_6);
        $response_gen_7 = mysqli_query($connection, $sql_gen_7);
        $response_gen_8 = mysqli_query($connection, $sql_gen_8);
        // ROWS
        $gen_1_rows = mysqli_num_rows($response_gen_1);
        $gen_2_rows = mysqli_num_rows($response_gen_2);
        $gen_3_rows = mysqli_num_rows($response_gen_3);
        $gen_4_rows = mysqli_num_rows($response_gen_4);
        $gen_5_rows = mysqli_num_rows($response_gen_5);
        $gen_6_rows = mysqli_num_rows($response_gen_6);
        $gen_7_rows = mysqli_num_rows($response_gen_7);
        $gen_8_rows = mysqli_num_rows($response_gen_8);
        ?>
        <h3 class="text-center">What is the total number of Pokemon in each generation?
        </h3>
        <p class="text-center">
            <?php echo "Generation 1: " . $gen_1_rows . " Pokemon" ?>
        </p>
        <p class="text-center">
            <?php echo "Generation 2: " . $gen_2_rows . " Pokemon" ?>
        </p>
        <p class="text-center">
            <?php echo "Generation 3: " . $gen_3_rows . " Pokemon" ?>
        </p>
        <p class="text-center">
            <?php echo "Generation 4: " . $gen_4_rows . " Pokemon" ?>
        </p>
        <p class="text-center">
            <?php echo "Generation 5: " . $gen_5_rows . " Pokemon" ?>
        </p>
        <p class="text-center">
            <?php echo "Generation 6: " . $gen_6_rows . " Pokemon" ?>
        </p>
        <p class="text-center">
            <?php echo "Generation 7: " . $gen_7_rows . " Pokemon" ?>
        </p>
        <p class="text-center">
            <?php echo "Generation 8: " . $gen_8_rows . " Pokemon" ?>
        </p>
    </div>
    <div class="my-4 pt-5">
        <?php
        // QUESTION 9
        $sql =
            "SELECT * 
        FROM `pokedex` 
        WHERE type_1 = 'Ghost'  
        AND type_2 = 'Fairy'" or die(mysqli_error($connection));

        // response handling
        $response = mysqli_query($connection, $sql);
        $object = mysqli_fetch_array($response);
        ?>
        <h3 class="text-center">What are the names of Pokemon that have both "Ghost" and "Fairy" as their types?
        </h3>
        <p class="text-center">
            <?php echo "Name:" . $object['name'] ?>
        </p>
    </div>
    <div class="my-4 pt-5">
        <?php
        // QUESTION 10
        $sql_hp = "SELECT AVG(hp) FROM `pokedex` WHERE type_1 = 'Grass'" or die(mysqli_error($connection));
        $sql_attack = "SELECT AVG(attack) FROM `pokedex` WHERE type_1 = 'Grass'" or die(mysqli_error($connection));
        $sql_defense = "SELECT AVG(defense) FROM `pokedex` WHERE type_1 = 'Grass'" or die(mysqli_error($connection));

        // response handling
        $response_hp = mysqli_query($connection, $sql_hp);
        $response_attack = mysqli_query($connection, $sql_attack);
        $response_defense = mysqli_query($connection, $sql_defense);
        // objects
        $object_hp = mysqli_fetch_array($response_hp);
        $object_attack = mysqli_fetch_array($response_attack);
        $object_defense = mysqli_fetch_array($response_defense);
        ?>
        <h3 class="text-center">What is the average HP, attack and defense stats of Pokemon belonging to the "Grass"
            type?
        </h3>
        <p class="text-center">
            <?php echo "Average HP: " . number_format($object_hp['AVG(hp)'], 0) ?>
        </p>
        <p class="text-center">
            <?php echo "Average Attack: " . number_format($object_attack['AVG(attack)'], 0) ?>
        </p>
        <p class="text-center">
            <?php echo "Average Defense: " . number_format($object_defense['AVG(defense)'], 0) ?>
        </p>
    </div>
    <div class="my-4 pt-5">
        <?php
        // QUESTION 11 - INSERT
        $sql_insert =
            "INSERT INTO pokedex (name, type_1, hp, attack, defense, speed, special_attack, special_defense, generation, legendary)
            VALUES ('Sprigatito', 'Grass', 40, 61, 54, 65, 45, 45, 9, 0) " or die(mysqli_error($connection));

        // response handling
        $response_insert = mysqli_query($connection, $sql_insert);
        $message = "";

        if ($response_insert == 1) {
            $sql_fetch_sprigatito = "SELECT * 
            FROM `pokedex` 
            WHERE generation = 9";
            $response_fetch_sprigatito = mysqli_query($connection, $sql_fetch_sprigatito);
            $object = mysqli_fetch_array($response_fetch_sprigatito);
            $message = "New Pokemon " . $object['name'] . " inserted successfully!";
        }
        ?>
        <h3 class="text-center">Insert Sprigatito into the Pokedex
        </h3>
        <p class="text-center ">
            <?php echo $message ?>
        </p>
    </div>
    <div class="my-4 pt-5">
        <?php
        // QUESTION 12 - UPDATE
        $sql_update =
            "UPDATE pokedex SET speed = speed + 10 WHERE generation = 9 " or die(mysqli_error($connection));

        // response handling
        $response = mysqli_query($connection, $sql_update);
        $message = "";

        if ($response == 1) {
            $sql_fetch_sprigatito = "SELECT * 
            FROM `pokedex` 
            WHERE generation = 9";
            $response_fetch_sprigatito = mysqli_query($connection, $sql_fetch_sprigatito);
            $object = mysqli_fetch_array($response_fetch_sprigatito);
            $message = $object['name'] . "'s speed stat has been updated";
        }
        ?>
        <h3 class="text-center">Increment Sprigatito speed stat by 10 and display the updated entry to the user.
        </h3>
        <p class="text-center">
            <?php echo $message ?>
        </p>
    </div>
    <div class="my-4 pt-5">
        <?php
        // QUESTION 13 - DELETE
        $sql_delete =
            "DELETE FROM pokedex WHERE generation = 9" or die(mysqli_error($connection));

        // response handling
        $response = mysqli_query($connection, $sql_delete);
        $message = "";

        if ($response == 1) {
            $message = "Sprigatito has been deleted from the Pokedex.";
        }
        ?>
        <h3 class="text-center">Delete the Sprigatito from the Pokedex and try to display it to the user.
        </h3>
        <p class="text-center">
            <?php echo $message ?>
        </p>
    </div>
    </div>

</main>

<?php include("includes/footer.php") ?>