<?php require base_path("views/partials/head.php");?>

<?php require base_path("views/partials/nav.php");?>
<?php require base_path("views/partials/banner.php");?>


    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

            <form method="POST" action="/laracast/note">
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">

                <label for="body"></label>
                <textarea id="body" name="body" class="w-[600px] p-2"><?= $note['note']?></textarea>

                <?php if(isset($errors['body'])) : ?>
                    <p class="text-red-500 text-sm mt-2"> <?= $errors['body']?> </p>
                <?php endif; ?>

                <p class="flex gap-x-4">
                    <a href="/laracast/notes" class="text-gray-500 hover:underline mt-6">Cancel</a>
                    <button type="submit" class="text-blue-500 hover:underline mt-6">Update</button>
                </p>
            </form>

        </div>
    </main>

<?php require base_path('views/partials/footer.php'); ?>
<?php
