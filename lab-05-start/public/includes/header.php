<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php echo $title; ?>
    </title>
    <!-- BS Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- BS Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body class="d-flex flex-column justify-content-between min-vh-100">
    <header class="text-center">
        <nav class="py-2 bg-dark border-bottom">
            <div class="container d-flex flex-wrap">
                <ul class="nav me-auto">
                    <li class="nav-item"><a href="#" class="nav-link link-light link-body-emphasis px-2">Browse by: </a>
                    </li>
                    <!-- Depending upon the categories that you choose, the link text and referenced page will differ. -->
                    <li class="nav-item"><a href="xx"
                            class="nav-link link-light link-body-emphasis px-2">Genre&emsp;|</a></li>
                    <li class="nav-item"><a href="xx"
                            class="nav-link link-light link-body-emphasis px-2">Character&emsp;|</a></li>
                    <li class="nav-item"><a href="yy" class="nav-link link-light link-body-emphasis px-2"> Decade</a>
                    </li>
                </ul>
                <ul class="nav">
                    <li class="nav-item"><a href="search.php"
                            class="nav-link link-light link-body-emphasis px-2">Advanced Search</a></li>
                </ul>
            </div>
        </nav>
        <section class="py-3 mb-4 border-bottom">
            <div class="container d-flex flex-wrap justify-content-center">
                <a href="index.php"
                    class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto link-body-emphasis text-decoration-none">
                    <svg class="bi me-2" width="40" height="32">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                    <h1 class="fs-4 fw-light text-danger"><i class="bi bi-book-half"></i> The Comic Chronicler</h1>
                </a>

                <!-- If you choose to do the 'quick search' as your challenge, include the widget here. -->
                <!-- <form class="col-12 col-lg-auto mb-3 mb-lg-0" role="search"> -->
                <!-- This is an input type of search, so the user has to hit 'enter' or 'return' to submit the form. A more user-friendly thing to do would be to also offer a submit button beside it. -->
                <!-- <input type="search" class="form-control" aria-label="Search">
                    </form> -->
            </div>
        </section>
    </header>