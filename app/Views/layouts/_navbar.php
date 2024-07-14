<header class="sticky top-0 inset-x-0 flex flex-wrap sm:justify-start sm:flex-nowrap z-[48] w-full bg-white border-b text-sm py-2.5 sm:py-4 lg:ps-64">
    <nav class="flex items-center justify-between w-full px-4 mx-auto lg:justify-end basis-full sm:px-6 md:px-8" aria-label="Global">
        <div class="flex items-center gap-5 lg:me-0 lg:hidden">
            <!-- Navigation Toggle -->
            <button type="button" class="flex items-center text-gray-500 hover:text-gray-600" data-hs-overlay="#application-sidebar" aria-controls="application-sidebar" aria-label="Toggle navigation">
                <i class='bx bx-menu bx-sm'></i>
            </button>
            <!-- End Navigation Toggle -->
        </div>

        <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
            <button id="hs-dropdown-with-header" type="button" class="flex flex-col items-end font-bold text-gray-800">
                <?= ucwords(session()->get('FullName')) ?>
                <span class="text-xs text-gray-400"><?= ucwords(session()->get('Role')) ?></span>
            </button>

            <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-[15rem] bg-white shadow-md rounded-lg p-2" aria-labelledby="hs-dropdown-with-header">
                <div class="px-5 py-3 -m-2 bg-gray-100 rounded-t-lg">
                    <p class="text-sm text-gray-500">Last Login</p>
                    <?php $tanggal = date('Y-m-d', strtotime(session()->get('LastLogin'))); ?>
                    <p class="text-sm font-semibold text-gray-800"><?= tgl_indonesia($tanggal) ?></p>
                </div>
                <div class="py-2 mt-2 first:pt-0 last:pb-0">
                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500" href="<?= site_url() ?>rubah-password/<?= session()->get('IdUser') ?>">
                        <i class='bx-xs bx bx-lock-alt'></i>
                        Change Password
                    </a>
                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-red-600 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500" href="<?= site_url('logout') ?>">
                        <i class='bx-xs bx bx-log-out'></i>
                        Logout
                    </a>
                </div>
            </div>
        </div>

    </nav>
</header>