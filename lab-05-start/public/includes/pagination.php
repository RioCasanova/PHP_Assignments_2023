<nav>
    <ul class="pagination justify-content-center">
        <?php
        if ($current_page > 1): ?>
            <li class="page-item">
                <a href="index.php?page=<?php echo $current_page - 1 ?>" class="page-link text-danger">Previous</a>
            </li>
        <?php endif ?>
        <?php
        // if we have a massive number of page links, we'll obscure
        // many of these with a gap. In our case, the gap will be an elipsis (...)
        $gap = false;
        // The "window" is how many page links on either side of the current page we 
        // want to receive or see
        $window = 1;
        for ($i = 1; $i <= $total_pages; $i++) {
            if ($i > 1 + $window && $i < $total_pages - $window && abs($i - $current_page) > $window) {
                if (!$gap): ?>
                    <li class="page-item text-danger"><span class="page-link text-danger">...</span></li>
                <?php endif ?>
                <?php $gap = true;
                continue;
            }
            $gap = false;

            if ($current_page == $i): ?>
                <li class="page-item active">
                    <a href="#" class="page-link text-danger">
                        <?php echo $i; ?>
                    </a>
                </li>
            <?php else: ?>
                <li class="page-item">
                    <a href="index.php?page=<?php echo $i; ?>" class="page-link text-danger">
                        <?php echo $i; ?>
                    </a>
                </li>
            <?php endif ?>
        <?php } ?>
        <?php

        if ($current_page < $total_pages): ?>
            <li class="page-item">
                <a href="index.php?page=<?php echo $current_page + 1 ?>" class="page-link text-danger">Next</a>
            </li>
        <?php endif ?>
    </ul>
</nav>