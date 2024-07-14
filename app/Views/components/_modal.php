<div x-show="openSurvey" class="fixed inset-0 z-10 flex items-center justify-center h-full px-2 py-4">
    <div x-show="openSurvey" x-transition:enter="transition-opacity ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute inset-0 transition-opacity bg-gray-500 bg-opacity-75" x-on:click="openSurvey = false"></div>
    <!-- Modal Content -->
    <div x-show="openSurvey" x-transition:enter="transition-transform ease-out duration-300" x-transition:enter-start="transform scale-75" x-transition:enter-end="transform scale-100" x-transition:leave="transition-transform ease-in duration-300" x-transition:leave-start="transform scale-100" x-transition:leave-end="transform scale-75" class="z-50 w-full h-full max-w-3xl overflow-auto bg-white rounded-md shadow-xl">

        <div class="relative flex flex-col bg-white shadow-lg rounded-xl dark:bg-gray-800">
            <div class="absolute top-2 end-2">
                <button type="button" class="flex items-center justify-center text-sm font-semibold text-gray-800 border border-transparent rounded-lg w-7 h-7 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-transparent dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" x-on:click="openSurvey = false">
                    <span class="sr-only">Close</span>
                    <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18" />
                        <path d="m6 6 12 12" />
                    </svg>
                </button>
            </div>

            <div class="p-4 overflow-y-auto sm:p-10">
                <div class="text-center">
                    <h1 class="text-xl font-extrabold text-gray-700">Survei Kepuasan Pelanggan SBU JPP</h1>
                </div>

                <form class="mt-8">
                    <div class="mb-4">
                        <label for="nama" class="block mb-2 label required">Nama Lengkap/Divisi</label>
                        <input type="text" name="nama" id="nama" placeholder="John Doe" class="input" autocomplete="off" />
                    </div>

                    <div class="mb-6">
                        <label for="perusahaan" class="block mb-2 label required">Nama Perusahaan/DivisiS</label>
                        <input type="text" name="perusahaan" id="perusahaan" placeholder="PT. Pupuk Kalimantan Timur" class="input" autocomplete="off" />
                    </div>

                    <div class="mb-6">
                        <label for="nohp" class="block mb-2 label required">Nomor HP</label>
                        <input type="number" name="nohp" id="nohp" placeholder="081234567890" class="input" autocomplete="off" />
                    </div>

                    <div class="mb-6">
                        <label for="kategori" class="block mb-2 label required">Kategori</label>
                        <fieldset class="grid grid-cols-2 gap-4">
                            <legend class="sr-only">Delivery</legend>
                            <div>
                                <input type="radio" name="kategori" value="produk" id="produk" class="peer hidden [&:checked_+_label_i]:block" checked />

                                <label for="produk" class="label-select">
                                    <div class="flex items-center justify-between">
                                        <p class="text-gray-700">Produk</p>

                                        <i class='hidden bx bxs-check-circle' style='color:#fb923c'></i>
                                    </div>
                                </label>
                            </div>

                            <div>
                                <input type="radio" name="kategori" value="jasa" id="jasa" class="peer hidden [&:checked_+_label_i]:block" />

                                <label for="jasa" class="label-select">
                                    <div class="flex items-center justify-between">
                                        <p class="text-gray-700">Jasa</p>

                                        <i class='hidden bx bxs-check-circle' style='color:#fb923c'></i>
                                    </div>
                                </label>
                            </div>
                        </fieldset>
                    </div>

                    <?php foreach ($pertanyaans as $pertanyaan) : ?>
                        <div class="mb-6">
                            <label for="<?= $pertanyaan->IdPertanyaan ?>" class="block mb-2 label required"><?= ucwords($pertanyaan->NamaPertanyaan) ?></label>
                            <fieldset class="grid grid-cols-3 gap-1 sm:grid-cols-5">

                                <div>
                                    <input type="radio" name="<?= $pertanyaan->IdPertanyaan ?>" value="1" id="<?= $pertanyaan->IdPertanyaan ?>1" class="peer hidden [&:checked_+_label_i]:block" />
                                    <label for="<?= $pertanyaan->IdPertanyaan ?>1" class="label-select">
                                        <div class="flex items-center">
                                            <i class='bx bxs-star' style='color:#fb923c'></i>
                                        </div>
                                    </label>
                                </div>

                                <div>
                                    <input type="radio" name="<?= $pertanyaan->IdPertanyaan ?>" value="2" id="<?= $pertanyaan->IdPertanyaan ?>2" class="peer hidden [&:checked_+_label_i]:block" />
                                    <label for="<?= $pertanyaan->IdPertanyaan ?>2" class="label-select">
                                        <div class="flex items-center">
                                            <i class='bx bxs-star' style='color:#fb923c'></i>
                                            <i class='bx bxs-star' style='color:#fb923c'></i>
                                        </div>
                                    </label>
                                </div>

                                <div>
                                    <input type="radio" name="<?= $pertanyaan->IdPertanyaan ?>" value="3" id="<?= $pertanyaan->IdPertanyaan ?>3" class="peer hidden [&:checked_+_label_i]:block" />
                                    <label for="<?= $pertanyaan->IdPertanyaan ?>3" class="label-select">
                                        <div class="flex items-center">
                                            <i class='bx bxs-star' style='color:#fb923c'></i>
                                            <i class='bx bxs-star' style='color:#fb923c'></i>
                                            <i class='bx bxs-star' style='color:#fb923c'></i>
                                        </div>
                                    </label>
                                </div>

                                <div>
                                    <input type="radio" name="<?= $pertanyaan->IdPertanyaan ?>" value="4" id="<?= $pertanyaan->IdPertanyaan ?>4" class="peer hidden [&:checked_+_label_i]:block" />
                                    <label for="<?= $pertanyaan->IdPertanyaan ?>4" class="label-select">
                                        <div class="flex items-center">
                                            <i class='bx bxs-star' style='color:#fb923c'></i>
                                            <i class='bx bxs-star' style='color:#fb923c'></i>
                                            <i class='bx bxs-star' style='color:#fb923c'></i>
                                            <i class='bx bxs-star' style='color:#fb923c'></i>
                                        </div>
                                    </label>
                                </div>

                                <div>
                                    <input type="radio" name="<?= $pertanyaan->IdPertanyaan ?>" value="5" id="<?= $pertanyaan->IdPertanyaan ?>5" class="peer hidden [&:checked_+_label_i]:block" />
                                    <label for="<?= $pertanyaan->IdPertanyaan ?>5" class="label-select">
                                        <div class="flex items-center">
                                            <i class='bx bxs-star' style='color:#fb923c'></i>
                                            <i class='bx bxs-star' style='color:#fb923c'></i>
                                            <i class='bx bxs-star' style='color:#fb923c'></i>
                                            <i class='bx bxs-star' style='color:#fb923c'></i>
                                            <i class='bx bxs-star' style='color:#fb923c'></i>
                                        </div>
                                    </label>
                                </div>
                            </fieldset>
                        </div>
                    <?php endforeach; ?>

                    <div class="mt-6">
                        <button class="w-full px-4 py-2 font-semibold tracking-wide text-white transition-colors duration-300 transform bg-black-500 rounded-lg hover:bg-orange-400 focus:outline-none focus:bg-orange-400 focus:ring focus:ring-orange-300 focus:ring-opacity-50">
                            Kirim Survei
                        </button>
                        <span class="before:content-['*'] before:text-red-500 block text-sm font-semibold mt-2 text-red-500">) Wajib diisi</span>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>