<?= $this->extend('layouts/app_auth') ?>

<?= $this->section('title') ?> <?= $title ?> <?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Card Section -->
<p class="text-sm font-semibold text-gray-400 capitalize">rubah password dari akun.</p>


<!-- Alert -->
<?php if (session()->has('message')) : ?>
    <?= $this->include('components/_alert') ?>
<?php endif; ?>

<div class="w-full py-5 mx-auto">
    <!-- Card -->
    <div class="p-4 bg-white shadow rounded-xl sm:p-7 dark:bg-slate-900">


        <form method="post" action="<?= site_url('rubah-password') ?>">
            <?= csrf_field(); ?>

            <input type="hidden" name="id" value="<?= $id; ?>">

            <div class="mb-4">
                <label for="PasswordOld" class="text-sm label">Password Lama</label>
                <input id="PasswordOld" autofocus name="PasswordOld" type="text" class="input">
                <!-- Error -->
                <?php if ($validation->getError('PasswordOld')) : ?>
                    <div class='mt-1 mb-4 text-sm font-bold text-red-500'>
                        <?= $error = $validation->getError('PasswordOld'); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="mb-4">
                <label for="PasswordNew" class="text-sm label">Password Baru</label>
                <input id="PasswordNew" autofocus name="PasswordNew" type="text" class="input">
                <!-- Error -->
                <?php if ($validation->getError('PasswordNew')) : ?>
                    <div class='mt-1 mb-4 text-sm font-bold text-red-500'>
                        <?= $error = $validation->getError('PasswordNew'); ?>
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

<?= $this->section('script') ?>
<?php if (session()->has('msg')) : ?>
    <script>
        const Toast1 = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast1.fire({
            icon: "error",
            title: "Data Password Lama Tidak Sesuai!"
        });
    </script>
<?php endif; ?>
<?php session()->remove('msg'); ?>
<?= $this->endSection() ?>