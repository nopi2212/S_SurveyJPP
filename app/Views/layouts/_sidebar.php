<div id="application-sidebar" class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform hidden fixed top-0 start-0 bottom-0 z-[60] w-64 bg-white border-e border-gray-200 pt-7 pb-10 overflow-y-auto lg:block lg:translate-x-0 lg:end-auto lg:bottom-0 [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-slate-700 dark:[&::-webkit-scrollbar-thumb]:bg-slate-500 dark:bg-gray-800 dark:border-gray-700">
    <div class="px-6 pb-4">
        <a href="#" aria-label="Brand">
            <img class="w-auto h-9" src="<?= base_url('img/logo.png') ?>" alt="">
        </a>
    </div>

    <nav class="flex flex-col flex-wrap w-full p-6 hs-accordion-group" data-hs-accordion-always-open>
        <ul class="space-y-1.5 list-none m-0">

            <li class="<?= ($current_page == 'dashboard') ? 'bg-gray-200 rounded-md' : ''; ?>">
                <a class="flex items-center text-sm font-semibold gap-x-3.5 py-2 px-2.5 text-slate-700 rounded-lg hover:bg-gray-100 dark:bg-gray-900 dark:text-white dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="<?= site_url('dashboard') ?>">
                    <i class='bx-xs bx bx-home-alt'></i>
                    Dashboard
                </a>
            </li>

            <?php if (session()->get('Role') == 'admin') : ?>
                <li class="<?= ($current_page == 'pengguna') ? 'bg-gray-200 rounded-md' : ''; ?>">
                    <a class="flex items-center text-sm font-semibold gap-x-3.5 py-2 px-2.5 text-slate-700 rounded-lg hover:bg-gray-100 dark:bg-gray-900 dark:text-white dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="<?= site_url('pengguna') ?>">
                        <i class='bx-xs bx bx-user'></i>
                        Pengguna
                    </a>
                </li>

                <li class="<?= ($current_page == 'halaman-utama') ? 'bg-gray-200 rounded-md' : ''; ?>">
                    <a class="flex items-center text-sm font-semibold gap-x-3.5 py-2 px-2.5 text-slate-700 rounded-lg hover:bg-gray-100 dark:bg-gray-900 dark:text-white dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="<?= site_url('halaman-utama') ?>">
                        <i class='bx-xs bx bx-buildings'></i>
                        Halaman Utama
                    </a>
                </li>

                <li class="<?= ($current_page == 'pelanggan') ? 'bg-gray-200 rounded-md' : ''; ?>">
                    <a class="flex items-center text-sm font-semibold gap-x-3.5 py-2 px-2.5 text-slate-700 rounded-lg hover:bg-gray-100 dark:bg-gray-900 dark:text-white dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="<?= site_url('pelanggan') ?>">
                        <i class='bx-xs bx bx-group'></i>
                        Pelanggan
                    </a>
                </li>
            <?php endif; ?>

            <?php if (session()->get('Role') != 'customer') : ?>
                <li class="<?= ($current_page == 'pertanyaan') ? 'bg-gray-200 rounded-md' : ''; ?>">
                    <a class="flex items-center text-sm font-semibold gap-x-3.5 py-2 px-2.5 text-slate-700 rounded-lg hover:bg-gray-100 dark:bg-gray-900 dark:text-white dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="<?= site_url('pertanyaan') ?>">
                        <i class='bx-xs bx bx-file'></i>
                        Pertanyaan
                    </a>
                </li>

                <li class="<?= ($current_page == 'hasil-kuisioner') ? 'bg-gray-200 rounded-md' : ''; ?>">
                    <a class="flex items-center text-sm font-semibold gap-x-3.5 py-2 px-2.5 text-slate-700 rounded-lg hover:bg-gray-100 dark:bg-gray-900 dark:text-white dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="<?= site_url('hasil-kuisioner') ?>">
                        <i class='bx-xs bx bx-list-check'></i>
                        Hasil Kuisioner
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</div>