<div id="dismiss-alert" class="p-4 mt-3 text-sm text-teal-800 transition duration-300 border border-teal-200 rounded-lg hs-removing:translate-x-5 hs-removing:opacity-0 bg-teal-50 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500" role="alert">
    <div class="flex items-center justify-center">
        <div class="flex-shrink-0">
            <i class='text-teal-800 bx-xs bx bx-check-double'></i>
        </div>
        <div class="ms-2">
            <div class="text-sm font-medium">
                Data Berhasil <?= session()->getFlashData('message') ?>.
            </div>
        </div>
        <div class="ps-3 ms-auto">
            <div class="-mx-1.5 -my-1.5">
                <button type="button" class="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-teal-50 focus:ring-teal-600 dark:bg-transparent dark:hover:bg-teal-800/50 dark:text-teal-600" data-hs-remove-element="#dismiss-alert">
                    <span class="sr-only">Dismiss</span>
                    <i class='bx bx-x bx-xs'></i>
                </button>
            </div>
        </div>
    </div>
</div>