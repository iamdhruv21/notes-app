<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="/laracast/" class="<?= urlIs('/laracast/') ? "bg-gray-900 text-white" : "text-gray-300"?> hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Home</a>
                        <a href="/laracast/about" class="<?= urlIs('/laracast/about') ? "bg-gray-900 text-white" : "text-gray-300"?> hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">About</a>
                        <?php if ($_SESSION['user'] ?? false) : ?>
                            <a href="/laracast/notes" class="<?= urlIs('/laracast/notes') ? "bg-gray-900 text-white" : "text-gray-300"?> hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Notes</a>
                        <?php endif; ?>
                        <a href="/laracast/contact" class="<?= urlIs('/laracast/contact') ? "bg-gray-900 text-white" : "text-gray-300"?> hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Contact</a>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    <div class="relative ml-3">
                        <div>

                            <?php if ($_SESSION['user'] ?? false) : ?>
                                <button type="button" class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                </button>

                            <?php else : ?>
                                <a href="/laracast/register" class="<?= urlIs('/laracast/register') ? "bg-gray-900 text-white" : "text-gray-300"?> hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Register</a>
                                <a href="/laracast/login" class="<?= urlIs('/laracast/login') ? "bg-gray-900 text-white" : "text-gray-300"?> hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Login</a>
                            <?php endif; ?>
                        </div>

                        <?php if ($_SESSION['user'] ?? false) : ?>
                            <form action="/laracast/sessions" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                    <button type="submit" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Log out</button>
                                </div>
                            </form>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>