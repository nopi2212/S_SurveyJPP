<?= $this->extend('layouts/app_auth') ?>

<?= $this->section('title') ?> <?= $title ?> <?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Card Section -->
<p class="text-sm font-semibold text-gray-400 capitalize">list pertanyaan yang ditanyakan pada survei.</p>

<!-- Alert -->
<?php if (session()->has('message')) : ?>
    <?= $this->include('components/_alert') ?>
<?php endif; ?>

<div class="w-full py-5 mx-auto">
    <!-- Card -->
    <div class="p-4 bg-white shadow rounded-xl sm:p-7 dark:bg-slate-900">

        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700" id="dataTableConf">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-sm font-semibold text-gray-900 capitalize text-start">Kode Pertanyaan</th>
                                    <th scope="col" class="px-6 py-3 text-sm font-semibold text-gray-900 capitalize text-start">Nama Pertanyaan</th>
                                    <th scope="col" class="px-6 py-3 text-sm font-semibold text-gray-900 capitalize text-start">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                <?php foreach ($pertanyaans as $pertanyaan) :  ?>
                                    <tr>
                                        <td class="text-sm font-bold text-gray-700"><?= ucwords($pertanyaan->IdPertanyaan) ?></td>
                                        <td class="text-sm font-bold text-gray-700"><?= ucwords($pertanyaan->NamaPertanyaan) ?></td>
                                        <td class="">
                                            <a href="<?= site_url('pertanyaan/' . $pertanyaan->IdPertanyaan . '/edit') ?>" class="p-2 text-sm font-bold text-orange-800 bg-orange-200 rounded-lg hover:bg-orange-300"><i class='text-lg bx bx-edit-alt'></i> Ubah</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Card -->
</div>
<!-- End Card Section -->

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    new DataTable('#dataTableConf');
</script>
<?= $this->endSection() ?>