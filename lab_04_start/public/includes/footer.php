<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
<?php if (isset($_GET['attraction_id'])): ?>

    <script>
        var myModal = new bootstrap.Modal(document.getElementById("exampleModal"), {});

        document.onreadystatechange = function () {
            myModal.show();
        };
    </script>

<?php endif; ?>
</body>

</html>