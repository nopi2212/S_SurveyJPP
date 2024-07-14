<?= $this->extend('layouts/app_auth') ?>

<?= $this->section('title') ?> <?= $title ?> <?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Card Section -->
<p class="text-sm font-semibold text-gray-400 capitalize">ubah data list pertanyaan yang ditanyakan pada survei.</p>

<!-- Alert -->
<?php if (session()->has('message')) : ?>
    <?= $this->include('components/_alert') ?>
<?php endif; ?>

<div class="w-full py-5 mx-auto">
    <!-- Card -->
    <div class="p-4 bg-white shadow rounded-xl sm:p-7 dark:bg-slate-900">


        <form method="post" action="<?= site_url('pertanyaan/' . $pertanyaan->IdPertanyaan . '/update') ?>">
            <?= csrf_field(); ?>

            <div class="mb-2">
                <label for="NamaPertanyaan" class="text-sm label">Nama Pertanyaan Survei</label>
                <input id="NamaPertanyaan" name="NamaPertanyaan" type="text" class="input" value="<?= $pertanyaan->NamaPertanyaan ?>">
                <!-- Error -->
                <?php if ($validation->getError('NamaPertanyaan')) : ?>
                    <div class='mt-1 mb-4 text-sm font-bold text-red-500'>
                        <?= $error = $validation->getError('NamaPertanyaan'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="flex justify-end mt-5 gap-x-2">
                <button type="submit" class="text-sm button">
                    Simpan Data
                </button>
            </div>

        </form>

    </div>
    <!-- End Card -->
</div>
<!-- End Card Section -->

<?= $this->endSection() ?>