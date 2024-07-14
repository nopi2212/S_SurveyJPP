<div x-show="openSurvey" class="fixed inset-0 z-10 flex items-center justify-center h-full px-2 py-4">
    <div x-show="openSurvey" x-transition:enter="transition-opacity ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute inset-0 transition-opacity bg-gray-500 bg-opacity-75" x-on:click="openSurvey = false"></div>
    <!-- Modal Content -->
    <div x-show="openSurvey" x-transition:enter="transition-transform ease-out duration-300" x-transition:enter-start="transform scale-75" x-transition:enter-end="transform scale-100" x-transition:leave="transition-transform ease-in duration-300" x-transition:leave-start="transform scale-100" x-transition:leave-end="transform scale-75" class="z-50 w-full h-full max-w-5xl overflow-auto bg-white rounded-md shadow-xl">

        <div class="relative flex flex-col ">
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

                <form class="mt-8" method="POST" action="<?= site_url() ?>">
                    <?= csrf_field(); ?>
                    <div class="mb-4">
                        <label for="nama" class="block mb-2 font-extrabold label required">Nama Lengkap</label>
                        <input required type="text" name="nama" id="nama" placeholder="John Doe" class="input bg-gray-200" autocomplete="off" value="<?= ucwords(session()->get('FullName')) ?>" readonly autofocus />
                        <?php if ($validation->getError('nama')) : ?>
                            <div class='mt-1 mb-4 text-sm font-bold text-red-500'>
                                <?= $error = $validation->getError('nama'); ?>
                            </div>
                        <?php endif; ?>
                    </div ][][]>

                    <div class="mb-6">
                        <label for="perusahaan" class="block mb-2 font-extrabold label required">Nama Perusahaan/Divisi</label>
                        <input required type="text" name="perusahaan" id="perusahaan" placeholder="PT. Pupuk Kalimantan Timur" class="input" autocomplete="off" />
                        <?php if ($validation->getError('perusahaan')) : ?>
                            <div class='mt-1 mb-4 text-sm font-bold text-red-500'>
                                <?= $error = $validation->getError('perusahaan'); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-6">
                        <label for="nohp" class="block mb-2 font-extrabold label required">Nomor HP</label>
                        <input required type="number" name="nohp" id="nohp" placeholder="081234567890" class="input" autocomplete="off" />
                        <?php if ($validation->getError('nohp')) : ?>
                            <div class='mt-1 mb-4 text-sm font-bold text-red-500'>
                                <?= $error = $validation->getError('nohp'); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-6">
                        <label for="kategori" class="block mb-2 font-extrabold label required">Kategori</label>
                        <div class="flex gap-x-6">
                            <div class="flex items-center">
                                <input required type="radio" name="kategori" class="shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600" id="jasa" value="jasa">
                                <label for="jasa" class="font-semibold text-gray-500 ms-2">Jasa</label>
                            </div>
                            <div class="flex items-center">
                                <input required type="radio" name="kategori" class="shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600" id="produk" value="produk">
                                <label for="produk" class="font-semibold text-gray-500 ms-2">Produk</label>
                            </div>
                        </div>
                        <?php if ($validation->getError('kategori')) : ?>
                            <div class='mt-1 mb-4 text-sm font-bold text-red-500'>
                                <?= $error = $validation->getError('kategori'); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php foreach ($pertanyaans as $pertanyaan) : ?>
                        <div class="mb-6">
                            <label class="block mb-2 font-extrabold label required"><?= $pertanyaan->NamaPertanyaan ?></label>
                            <div class="flex items-center justify-between mb-6">
                                <div>
                                    <p class="mb-2 font-semibold text-gray-600"><i class='bx bx-chevron-right'></i> Kepentingan</p>
                                    <div class="flex flex-col gap-2">
                                        <?php for ($i = 0; $i < 5; $i++) : ?>
                                            <div class="flex items-center text-sm">
                                                <input required type="radio" name="<?= $pertanyaan->IdPertanyaan ?>kepentingan" class="shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600" id="<?= $pertanyaan->IdPertanyaan . $i . $kepentingan[$i] ?>" value="<?= $i + 1; ?>">
                                                <label for="<?= $pertanyaan->IdPertanyaan . $i . $kepentingan[$i] ?>" class="font-semibold text-gray-500 ms-2"><?= $kepentingan[$i] ?></label>
                                            </div>
                                        <?php endfor; ?>
                                    </div>
                                </div>

                                <div>
                                    <p class="mb-2 font-semibold text-gray-600"><i class='bx bx-chevron-right'></i> Kepuasan</p>
                                    <div class="flex flex-col gap-2">
                                        <?php for ($i = 0; $i < 5; $i++) : ?>
                                            <div class="flex items-center text-sm">
                                                <input required type="radio" name="<?= $pertanyaan->IdPertanyaan ?>kepuasan" class="shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600" id="<?= $pertanyaan->IdPertanyaan . $i . $kepuasan[$i] ?>" value="<?= $i + 1; ?>">
                                                <label for="<?= $pertanyaan->IdPertanyaan . $i . $kepuasan[$i] ?>" class="font-semibold text-gray-500 ms-2"><?= $kepuasan[$i] ?></label>
                                            </div>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                                <hr />
                            </div>

                        </div>
                    <?php endforeach; ?>

                    <div class="mt-6">
                        <button class="w-full px-4 py-2 font-semibold tracking-wide text-white transition-colors duration-300 transform bg-orange-500 rounded-lg hover:bg-orange-400 focus:outline-none focus:bg-orange-400 focus:ring focus:ring-orange-300 focus:ring-opacity-50">
                            Kirim Survei
                        </button>
                        <span class="before:content-['*'] before:text-red-500 block text-sm font-semibold mt-2 text-red-500">) Wajib diisi</span>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>