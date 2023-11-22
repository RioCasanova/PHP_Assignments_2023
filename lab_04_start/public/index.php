<?php include("includes/header.php") ?>
<?php require_once("/home/rcasanova2/data/connect.php"); ?>
<?php require_once("../private/prepared.php"); ?>
<?php

$attraction_id = isset($_GET['id']) ? $_GET['id'] : "";
if (isset($_GET['id'])) {
    $attraction_id = $_GET['id'];
} elseif (isset($_POST['id'])) {
    $attraction_id = $_POST['id'];
} else {
    $attraction_id = "";
}

$category = isset($_GET['category']) ? $_GET['category'] : "";
?>
<!-- We are trying to filter our results by the Category - so we want to use the category column and pass it into the URL -->

<body class="container">
    <header class="mt-5">
        <nav class="mb-5 pb-5">
            <a href="index.php" class="btn btn-dark">Home</a>
            <a href="login.php" class="btn btn-success">Login</a>
        </nav>
        <div class="">
            <h1 class="fw-light text-center mt-5">Edmonton Attractions</h1>
            <p class="text-muted mb-4">Welcome to Edmonton Attractions, your guide to the best things to see
                and do in Edmonton, Alberta! Whether you're a local resident or a visitor to our vibrant city, we've
                curated
                a list of exciting attractions that showcase Edmonton's rich culture, natural beauty, and entertainment
                options.</p>
            <p class="mt-4">Explore our selection of restaurants, parks, museums, festivals, historical
                buildings, and more. Each attraction comes with useful information such as category, cost, address,
                rating,
                and a brief description. You can even find direct links to their websites for further details and
                planning.
                Discover the hidden gems and popular hotspots that make edmonton a fantastic destination. Start your
                adventure today by browsing through the attractions below.</p>
        </div>
    </header>
    <main>
        <section class="mb-4">
            <h2 class="fw-bold mt-5 mb-3">Browse by Category:</h2>
            <div class="text-center">
                <button class="btn btn-outline-primary m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?category=Shopping"
                        class="text-decoration-none text-reset">Shopping</a>
                </button>
                <button class="btn btn-outline-secondary m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?category=Historical%20Buildings%20%26%20Monuments"
                        class="text-decoration-none text-reset">
                        Historical Buildings & Monuments</a>
                </button>
                <button class="btn btn-outline-success m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?category=Parks%20%26%20Natural%20Attractions"
                        class="text-decoration-none text-reset">Parks & Natural Attractions</a>
                </button>
                <button class="btn btn-outline-danger m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?category=Fine%20Arts"
                        class="text-decoration-none text-reset">Fine Arts</a>
                </button>
                <button class="btn btn-outline-warning m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?category=Science%20%26%20Technology"
                        class="text-decoration-none text-reset">Science & Technology</a>
                </button>
                <button class="btn btn-outline-info m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?category=Live%20Music%20%26%20Theatre"
                        class="text-decoration-none text-reset">Live Music & Theatre</a>
                </button>
                <button class="btn btn-outline-dark m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?category=Recreational%20Facilities"
                        class="text-decoration-none text-reset">Recreational Facilities</a>
                </button>
                <button class="btn btn-outline-primary m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?category=Year-Round%20Attractions"
                        class="text-decoration-none text-reset">Year-Round Attractions</a>
                </button>
                <button class="btn btn-outline-secondary m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?category=Restaurants%20%26%20Food%20Vendors"
                        class="text-decoration-none text-reset">Restaurants & Food Vendors</a>
                </button>
                <button class="btn btn-outline-success m-2">
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?category=Festivals"
                        class="text-decoration-none text-reset">Festivals</a>
                </button>
            </div>
            <div>
                <?php


                if (isset($_GET['category']) && !empty($_GET['category'])) {
                    $attractions = filter_by_category();
                } else {
                    $attractions = get_all_attractions();
                }

                ?>

                <div class="row row-cols-1 row-cols-md-3 g-4 mt-4">
                    <?php foreach ($attractions as $x) { ?>
                        <div class="col">
                            <div class="card card-body h-100">
                                <?php
                                echo "<h4 class=\"card-title\"><b>" . $x['name'] . "</b></h4>";
                                echo "<h5 class=\"text-muted card-text\">" . $x['category'] . "</h5>";
                                echo "<p class=\"card-text\"><b>Cost: </b>" . $x['cost'] . "</p>";
                                echo "<p class=\"card-text\"><b>Area of Town: </b>" . $x['area_of_town'] . "</p>";
                                echo "<p class=\"card-text\"><b>Season: </b>" . $x['season'] . "</p>";
                                echo "<p class=\"card-text\"><b>Address: </b>" . $x['address'] . "</p>";
                                echo "<p class=\"card-text\">" . $x['description'] . "</p>";
                                echo "<p><b>Rating: </b>" . $x['rating'] . "</p>";
                                echo $x['family_friendly'] == true ? "<p class=\"text-success\">Family Friendly</p>" : "<p class=\"text-warning\">For Adults</p>";
                                echo "<p class=\"card-text\">" . "<a href='" . $x['url'] . "'>Visit Website</a>" . "</p>";
                                ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    </main>
    <?php include("includes/footer.php") ?>