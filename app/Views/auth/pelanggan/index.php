<?= $this->extend('layouts/app_auth') ?>

<?= $this->section('title') ?> <?= $title ?> <?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Card Section -->
<p class="text-sm font-semibold text-gray-400 capitalize">data pelanggan yang melakukan survei pada website.</p>

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
                                    <th scope="col" class="px-6 py-3 text-sm font-semibold text-gray-900 capitalize text-start">Nama</th>
                                    <th scope="col" class="px-6 py-3 text-sm font-semibold text-gray-900 capitalize text-start">Perusahaan</th>
                                    <th scope="col" class="px-6 py-3 text-sm font-semibold text-gray-900 capitalize text-start">No Hp</th>
                                    <th scope="col" class="px-6 py-3 text-sm font-semibold text-gray-900 capitalize text-start">Transaksi Terakhir</th>
                                    <th scope="col" class="px-6 py-3 text-sm font-semibold text-gray-900 capitalize text-start">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                <?php foreach ($customers as $customer) :  ?>
                                    <?php $tanggal = date('Y-m-d', strtotime($customer->LastTransaction)); ?>
                                    <tr>
                                        <td class="text-sm font-bold text-gray-700"><?= ucwords($customer->NamaCustomer) ?></td>
                                        <td class="text-sm font-bold text-gray-700"><?= ucwords($customer->NamaPerusahaan) ?></td>
                                        <td class="text-sm font-bold text-gray-700"><?= $customer->NoHpCustomer ?></td>
                                        <td class="text-sm font-bold text-gray-700"><?= tgl_indonesia($tanggal) ?></td>
                                        <td class="text-sm font-bold text-red-500">
                                            <a onclick="return confirm('Yakin Hapus Data?')" href="<?= site_url() ?>pelanggan/<?= $customer->IdCustomer ?>/delete" class="px-3 py-2 bg-red-100 rounded-lg hover:bg-red-200"><i class='text-lg bx bx-trash'></i> Hapus</a>
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