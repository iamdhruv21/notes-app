<?php require base_path("views/partials/head.php");?>

<?php require base_path("views/partials/nav.php");?>
<?php require base_path("views/partials/banner.php");?>


    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <h2 class="text-center">Note</h2>
            <p><?= htmlspecialchars($notes['note']) ?></p>

            <div class="mt-4">
                <a href="/laracast/note/edit?id=<?=$notes['id']?>" class="text-gray-500 pointer px-2 py-1 border border-current rounded">Edit</a>
            </div>

            <form class="mt-2" method="post" action="/laracast/note">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" value="<?=$notes['id']?>">
                <button class="text-sm text-red-500 pointer">Delete</button>
            </form>

            <p class="mt-6"><a href="/laracast/notes" class="text-blue-500 underline">Go Back...</a></p>

        </div>
    </main>

<?php require base_path('views/partials/footer.php'); ?>
