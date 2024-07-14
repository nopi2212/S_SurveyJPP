<?= $this->extend('layouts/app_auth') ?>

<?= $this->section('title') ?> <?= $title ?> <?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Card Section -->
<p class="text-sm font-semibold text-gray-400 capitalize">tambah data list pengguna aplikasi survei.</p>

<div class="w-full py-5 mx-auto">
    <!-- Card -->
    <div class="p-4 bg-white shadow rounded-xl sm:p-7 dark:bg-slate-900">


        <form method="post" action="<?= site_url('pengguna/save') ?>">
            <?= csrf_field(); ?>

            <div class="mb-4">
                <label for="Username" class="text-sm label">Username</label>
                <input id="Username" autofocus name="Username" type="text" class="input">
                <!-- Error -->
                <?php if ($validation->getError('Username')) : ?>
                    <div class='mt-1 mb-4 text-sm font-bold text-red-500'>
                        <?= $error = $validation->getError('Username'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="mb-4">
                <label for="Role" class="text-sm label">Role</label>
                <!-- <input id="Role" autofocus name="Role" type="text" class="bg-gray-200 input" value="Pimpinan" readonly> -->
                <select class="input" name="Role" id="Role">
                    <option value="pimpinan">Pimpinan</option>
                    <option value="customer">Customer</option>
                </select>
                <!-- Error -->
                <?php if ($validation->getError('Role')) : ?>
                    <div class='mt-1 mb-4 text-sm font-bold text-red-500'>
                        <?= $error = $validation->getError('Role'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="mb-4">
                <label for="FullName" class="text-sm label">Full Name</label>
                <input id="FullName" autofocus name="FullName" type="text" class="input">
                <!-- Error -->
                <?php if ($validation->getError('FullName')) : ?>
                    <div class='mt-1 mb-4 text-sm font-bold text-red-500'>
                        <?= $error = $validation->getError('FullName'); ?>
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