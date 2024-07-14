<?= $this->extend('layouts/app_auth') ?>

<?= $this->section('title') ?> <?= $title ?> <?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Card Section -->
<p class="text-sm font-semibold text-gray-400 capitalize">list pengguna aplikasi survei.</p>

<!-- Alert -->
<?php if (session()->has('message')) : ?>
    <?= $this->include('components/_alert') ?>
<?php endif; ?>

<div class="w-full py-5 mx-auto">
    <!-- Card -->
    <div class="p-4 bg-white shadow rounded-xl sm:p-7 dark:bg-slate-900">

        <div class="flex justify-end">
            <a href="<?= site_url() ?>pengguna/create" class="px-3 py-1 text-sm font-bold text-white bg-orange-500 rounded-md hover:bg-orange-400">Tambah Data</a>
        </div>

        <div class="flex flex-col mt-6">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700" id="dataTableConf">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-sm font-semibold text-gray-900 capitalize text-start">FullName</th>
                                    <th scope="col" class="px-6 py-3 text-sm font-semibold text-gray-900 capitalize text-start">Username</th>
                                    <th scope="col" class="px-6 py-3 text-sm font-semibold text-gray-900 capitalize text-start">Role</th>
                                    <th scope="col" class="px-6 py-3 text-sm font-semibold text-gray-900 capitalize text-start">LastLogin</th>
                                    <th scope="col" class="px-6 py-3 text-sm font-semibold text-gray-900 capitalize text-start">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                <?php foreach ($users as $user) :  ?>
                                    <?php $LastLogin = date('Y-m-d', strtotime($user->LastLogin)); ?>
                                    <tr>
                                        <td class="text-sm font-bold text-gray-700"><?= ucwords($user->FullName) ?></td>
                                        <td class="text-sm font-bold text-gray-700"><?= ucwords($user->Username) ?></td>
                                        <td class="text-sm font-bold text-gray-700"><?= ucwords($user->Role) ?></td>
                                        <td class="text-sm font-bold text-gray-700"><?= tgl_indonesia($LastLogin) ?></td>
                                        <td class="">
                                            <?php if ($user->Role != 'admin') : ?>
                                                <a href="<?= site_url('pengguna/' . $user->IdUser . '/edit') ?>" class="p-2 text-sm font-bold text-yellow-800 bg-yellow-200 rounded-lg hover:bg-yellow-300"><i class='text-lg bx bx-edit-alt'></i> Ubah</a>
                                                <a onclick="return confirm('Yakin Hapus Data ?')" href="<?= site_url('pengguna/' . $user->IdUser . '/delete') ?>" class="p-2 text-sm font-bold text-orange-800 bg-orange-200 rounded-lg hover:bg-orange-300"><i class='text-lg bx bx-trash'></i> Hapus</a>
                                            <?php else : ?>
                                                <strong>-</strong>
                                            <?php endif; ?>
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