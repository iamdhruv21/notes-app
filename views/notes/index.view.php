<?php require base_path("views/partials/head.php");?>

<?php require base_path("views/partials/nav.php");?>
<?php require base_path("views/partials/banner.php");?>


    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <h2 class="text-center">You're all Notes</h2>

            <?php foreach ($notes as $s) : ?>
            <ul>
                <li>
                    <a href="/laracast/note?id=<?= $s['id'] ?>" class="text-blue-500 hover:underline">
                        <?= htmlspecialchars($s['note']) ?>
                    </a>
                </li>
            </ul>
            <?php endforeach;?>

            <p class="mt-6">
                <a href="/laracast/notes/create" class="text-blue-500 hover:underline">Create Note</a>
            </p>

        </div>
    </main>

<?php require base_path('views/partials/footer.php'); ?>
