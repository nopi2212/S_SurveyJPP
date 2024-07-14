<?= $this->extend('layouts/app_auth') ?>

<?= $this->section('title') ?> <?= $title . " <i class='text-[8px] bx bxs-circle'></i> Kategori " . ucwords($kategori) . " Tahun " . $tahun ?> <?= $this->endSection() ?>

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

            <!-- Kepentingan -->
            <div class="mb-6">
                <p class="py-2 font-bold text-gray-600">Data Skala Kepentingan</p>
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700" id="dataTableKepentingan">
                                <thead>
                                    <tr>
                                        <th scope="col" class="p-3 text-sm font-bold text-white capitalize bg-orange-400 border border-gray-300 text-start">Nama Pelanggan</th>
                                        <th scope="col" class="p-3 text-sm font-bold text-white capitalize bg-orange-400 border border-gray-300 text-start">Transaksi</th>
                                        <th scope="col" class="p-3 text-sm font-bold text-white capitalize bg-orange-400 border border-gray-300 text-start">Kategori</th>
                                        <?php foreach ($pertanyaans as $pertanyaan) :  ?>
                                            <th scope="col" class="p-3 text-sm font-bold text-white capitalize bg-orange-400 border border-gray-300 text-start"><?= $pertanyaan->IdPertanyaan; ?></th>
                                        <?php endforeach; ?>
                                    </tr>
                                </thead>
                                <tbody class="font-bold divide-y divide-gray-200 dark:divide-gray-700">
                                    <?php foreach ($datas as $customer) :  ?>
                                        <?php $hasil = 0 ?>
                                        <?php $tanggal = date('Y-m-d', strtotime($customer->LastTransaction)); ?>
                                        <tr>
                                            <td class="p-3 text-sm font-bold text-gray-700 border border-gray-300"><?= ucwords($customer->NamaCustomer) ?></td>
                                            <td class="p-3 text-sm font-bold text-gray-700 border border-gray-300"><?= tgl_indonesia($tanggal, true) ?></td>
                                            <td class="p-3 text-sm font-bold text-gray-700 border border-gray-300"><?= ucwords($customer->KategoriTransaction) ?></td>
                                            <?php foreach ($resultSurveyTask as $hasilkuisioner) :  ?>
                                                <?php if ($customer->IdCustomer == $hasilkuisioner->customer_IdCustomer) : ?>
                                                    <td class="p-3 text-sm font-bold text-gray-700 border border-gray-300"><?= ($hasilkuisioner->Kepentingan) ?></td>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </tr>
                                    <?php endforeach; ?>

                                    <tr>
                                        <td colspan="3" class="p-3 text-sm font-extrabold text-center text-gray-700 border border-gray-300">Total</td>
                                        <?php foreach ($pertanyaans as $pertanyaan) : ?>
                                            <?php $TotalKepentingan = 0 ?>
                                            <?php foreach ($resultSurveyTask as $result) : ?>
                                                <?php if ($pertanyaan->IdPertanyaan == $result->IdPertanyaan) : ?>
                                                    <?php $TotalKepentingan += $result->Kepentingan; ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                            <td class="p-3 text-sm font-bold text-gray-700 border border-gray-300"><?= ($TotalKepentingan) ?></td>
                                        <?php endforeach; ?>
                                    </tr>

                                    <tr>
                                        <td colspan="3" class="p-3 text-sm font-extrabold text-center text-orange-500 border border-gray-300">Mean Importance Score (MIS)</td>
                                        <?php foreach ($pertanyaans as $pertanyaan) : ?>
                                            <?php $TotalKepentingan = 0 ?>
                                            <?php $TotalKepentingan2 = count($resultSurveyTask) / count($pertanyaans) ?>
                                            <?php foreach ($resultSurveyTask as $result) : ?>
                                                <?php if ($pertanyaan->IdPertanyaan == $result->IdPertanyaan) : ?>
                                                    <?php $TotalKepentingan += $result->Kepentingan; ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                            <td class=" p-3 text-sm font-bold text-orange-500 border border-gray-300"><?= numberFormat(round($TotalKepentingan / $TotalKepentingan2, 4)) ?></td>
                                        <?php endforeach; ?>
                                    </tr>

                                    <tr>
                                        <td colspan="3" class="p-3 text-sm font-extrabold text-center text-orange-500 border border-gray-300">Total Mean Importance Score (MIS)</td>
                                        <?php $TotalMIS = 0 ?>
                                        <?php $surveyKepentingan = count($resultSurveyTask) / count($pertanyaans) ?>
                                        <?php foreach ($pertanyaans as $pertanyaan) : ?>
                                            <?php $totalSurveyKepentingan = 0 ?>
                                            <?php foreach ($resultSurveyTask as $result) : ?>
                                                <?php if ($pertanyaan->IdPertanyaan == $result->IdPertanyaan) : ?>
                                                    <?php $totalSurveyKepentingan += $result->Kepentingan; ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                            <?php $TotalMIS += $totalSurveyKepentingan / $surveyKepentingan; ?>
                                        <?php endforeach; ?>
                                        <td colspan="7" class="p-3 text-sm font-extrabold text-center text-orange-500 border border-gray-300"><?= numberFormat(round($TotalMIS, 4)) ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kepuasan -->
            <div class="mb-6">
                <p class="py-2 font-bold text-gray-600">Data Skala Kepuasan</p>
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700" id="dataTableKepuasan">
                                <thead>
                                    <tr>
                                        <th scope="col" class="p-3 text-sm font-bold text-white capitalize bg-orange-400 border border-gray-300 text-start">Nama Pelanggan</th>
                                        <th scope="col" class="p-3 text-sm font-bold text-white capitalize bg-orange-400 border border-gray-300 text-start">Transaksi</th>
                                        <th scope="col" class="p-3 text-sm font-bold text-white capitalize bg-orange-400 border border-gray-300 text-start">Kategori</th>
                                        <?php foreach ($pertanyaans as $pertanyaan) :  ?>
                                            <th scope="col" class="p-3 text-sm font-bold text-white capitalize bg-orange-400 border border-gray-300 text-start"><?= $pertanyaan->IdPertanyaan; ?></th>
                                        <?php endforeach; ?>
                                    </tr>
                                </thead>
                                <tbody class="font-bold divide-y divide-gray-200 dark:divide-gray-700">
                                    <?php foreach ($datas as $customer) :  ?>
                                        <?php $hasil = 0 ?>
                                        <?php $tanggal = date('Y-m-d', strtotime($customer->LastTransaction)); ?>
                                        <tr>
                                            <td class="p-3 text-sm font-bold text-gray-700 border border-gray-300"><?= ucwords($customer->NamaCustomer) ?></td>
                                            <td class="p-3 text-sm font-bold text-gray-700 border border-gray-300"><?= tgl_indonesia($tanggal, true) ?></td>
                                            <td class="p-3 text-sm font-bold text-gray-700 border border-gray-300"><?= ucwords($customer->KategoriTransaction) ?></td>
                                            <?php foreach ($resultSurveyTask as $hasilkuisioner) :  ?>
                                                <?php if ($customer->IdCustomer == $hasilkuisioner->customer_IdCustomer) : ?>
                                                    <td class="p-3 text-sm font-bold text-gray-700 border border-gray-300"><?= ($hasilkuisioner->Kepuasan) ?></td>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </tr>
                                    <?php endforeach; ?>

                                    <tr>
                                        <td colspan="3" class="p-3 text-sm font-extrabold text-center text-gray-700 border border-gray-300">Total</td>
                                        <?php foreach ($pertanyaans as $pertanyaan) : ?>
                                            <?php $TotalKepuasan = 0 ?>
                                            <?php foreach ($resultSurveyTask as $result) : ?>
                                                <?php if ($pertanyaan->IdPertanyaan == $result->IdPertanyaan) : ?>
                                                    <?php $TotalKepuasan += $result->Kepuasan; ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                            <td class="p-3 text-sm font-bold text-gray-700 border border-gray-300"><?= ($TotalKepuasan) ?></td>
                                        <?php endforeach; ?>
                                    </tr>

                                    <tr>
                                        <td colspan="3" class="p-3 text-sm font-extrabold text-center text-orange-500 border border-gray-300">Mean Satisfaction Score (MSS)</td>
                                        <?php foreach ($pertanyaans as $pertanyaan) : ?>
                                            <?php $TotalKepuasan = 0 ?>
                                            <?php $TotalKepuasan2 = count($resultSurveyTask) / count($pertanyaans) ?>
                                            <?php foreach ($resultSurveyTask as $result) : ?>
                                                <?php if ($pertanyaan->IdPertanyaan == $result->IdPertanyaan) : ?>
                                                    <?php $TotalKepuasan += $result->Kepuasan; ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                            <td class="p-3 text-sm font-bold text-orange-500 border border-gray-300"><?= numberFormat(round($TotalKepuasan / $TotalKepuasan2, 4)) ?></td>
                                        <?php endforeach; ?>
                                    </tr>

                                    <tr>
                                        <td colspan="3" class="p-3 text-sm font-extrabold text-center text-orange-500 border border-gray-300">Total Mean Satisfaction Score (MSS)</td>
                                        <?php $TotalMSS = 0 ?>
                                        <?php $surveyKepuasan = count($resultSurveyTask) / count($pertanyaans) ?>
                                        <?php foreach ($pertanyaans as $pertanyaan) : ?>
                                            <?php $totalSurveyKepuasan = 0 ?>
                                            <?php foreach ($resultSurveyTask as $result) : ?>
                                                <?php if ($pertanyaan->IdPertanyaan == $result->IdPertanyaan) : ?>
                                                    <?php $totalSurveyKepuasan += $result->Kepuasan; ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                            <?php $TotalMSS += $totalSurveyKepuasan / $surveyKepuasan; ?>
                                        <?php endforeach; ?>
                                        <td colspan="7" class="p-3 text-sm font-extrabold text-center text-orange-500 border border-gray-300"><?= numberFormat(round($TotalMSS, 4)) ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Indeks Kepuasan Pelanggan (CSI) -->
            <div class="mb-6">
                <p class="py-2 font-bold text-gray-600">Data Indeks Kepuasan Pelanggan (CSI)</p>
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700" id="dataTableKepuasan">
                                <thead>
                                    <tr>
                                        <th scope="col" colspan="3" class="p-3 text-sm font-bold text-center text-white capitalize bg-orange-400 border border-gray-300">#</th>
                                        <?php foreach ($pertanyaans as $pertanyaan) :  ?>
                                            <th scope="col" class="p-3 text-sm font-bold text-white capitalize bg-orange-400 border border-gray-300 text-start"><?= $pertanyaan->IdPertanyaan; ?></th>
                                        <?php endforeach; ?>
                                    </tr>
                                </thead>
                                <tbody class="font-bold divide-y divide-gray-200 dark:divide-gray-700">
                                    <tr>
                                        <td colspan="3" class="p-3 text-sm font-extrabold text-center text-gray-700 border border-gray-300">Weight Factor (WF)</td>
                                        <?php foreach ($pertanyaans as $pertanyaan) : ?>
                                            <?php $TotalKepentingan = 0 ?>
                                            <?php $TotalKepentingan2 = count($resultSurveyTask) / count($pertanyaans) ?>
                                            <?php foreach ($resultSurveyTask as $result) : ?>
                                                <?php if ($pertanyaan->IdPertanyaan == $result->IdPertanyaan) : ?>
                                                    <?php $TotalKepentingan += $result->Kepentingan; ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                            <td class="p-3 text-sm font-bold text-gray-700 border border-gray-300"><?= numberFormat(round((($TotalKepentingan / $TotalKepentingan2) / $TotalMIS) * 1, 4)) ?></td>
                                        <?php endforeach; ?>
                                    </tr>

                                    <tr>
                                        <td colspan="3" class="p-3 text-sm font-extrabold text-center text-gray-700 border border-gray-300">Weight Score (WS)</td>
                                        <?php foreach ($pertanyaans as $pertanyaan) : ?>
                                            <?php $TotalKepentingan = 0 ?>
                                            <?php $TotalKepuasan = 0 ?>
                                            <?php $TotalKepentingan2 = count($resultSurveyTask) / count($pertanyaans) ?>
                                            <?php foreach ($resultSurveyTask as $result) : ?>
                                                <?php if ($pertanyaan->IdPertanyaan == $result->IdPertanyaan) : ?>
                                                    <?php $TotalKepentingan += $result->Kepentingan; ?>
                                                    <?php $TotalKepuasan += $result->Kepuasan; ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                            <?php $a = (($TotalKepentingan / $TotalKepentingan2) / $TotalMIS) * 1; ?>
                                            <?php $b = $TotalKepuasan / $TotalKepentingan2; ?>
                                            <td class="p-3 text-sm font-bold text-gray-700 border border-gray-300"><?= numberFormat(round($a * $b, 4)); ?></td>
                                        <?php endforeach; ?>
                                    </tr>

                                    <tr>
                                        <td colspan="3" class="p-3 text-sm font-extrabold text-center text-gray-700 border border-gray-300">Total Weight Score (WT)</td>
                                        <?php $totalWS = 0 ?>
                                        <?php foreach ($pertanyaans as $pertanyaan) : ?>
                                            <?php $TotalKepentingan = 0 ?>
                                            <?php $TotalKepuasan = 0 ?>
                                            <?php $TotalKepentingan2 = count($resultSurveyTask) / count($pertanyaans) ?>
                                            <?php foreach ($resultSurveyTask as $result) : ?>
                                                <?php if ($pertanyaan->IdPertanyaan == $result->IdPertanyaan) : ?>
                                                    <?php $TotalKepentingan += $result->Kepentingan; ?>
                                                    <?php $TotalKepuasan += $result->Kepuasan; ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                            <?php $a = (($TotalKepentingan / $TotalKepentingan2) / $TotalMIS) * 1; ?>
                                            <?php $b = $TotalKepuasan / $TotalKepentingan2; ?>
                                            <?php $totalWS += $a * $b; ?>
                                        <?php endforeach; ?>
                                        <td colspan="7" class="p-3 text-sm font-bold text-center text-gray-700 border border-gray-300"><?= numberFormat(round($totalWS, 4)); ?></td>
                                    </tr>

                                    <tr>
                                        <td colspan="3" class="p-3 text-sm font-extrabold text-center text-orange-500 border border-gray-300">Customer Satisfaction Index (CSI)</td>
                                        <?php $resultCSI = ($totalWS / 5) * 100; ?>
                                        <td colspan="7" class="p-3 text-sm font-extrabold text-center text-orange-500 border border-gray-300"><?= numberFormat(round($resultCSI, 2)) ?>%</td>
                                    </tr>

                                    <tr>
                                        <td colspan="3" class="p-3 text-sm font-extrabold text-center text-gray-700 border border-gray-300">Kesimpulan</td>
                                        <td colspan="7" class="p-3 text-sm font-extrabold text-gray-700 border border-gray-300 text-start">
                                            Berdasarkan Kriteria Nilai Indeks Kepuasan Pelanggan, dengan hasil kuisioner kategori <?= ucwords($kategori) ?> tahun <?= $tahun ?> mendapatkan nilai CSI = <span class="text-lg text-orange-500"><?= numberFormat(round($resultCSI, 2)) ?>%</span>. Dari nilai CSI tersebut dapat disimpulkan bahwa kriteria Indeks Kepuasan Pelanggan adalah <span class="text-lg text-orange-400"><?= cekCSI(round($resultCSI, 4)) ?></span>.
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-end w-full">
                <form action="<?= site_url() ?>hasil-kuisioner/print" method="post">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="kategori" value="<?= $kategori ?>">
                    <input type="hidden" name="tahun" value="<?= $tahun ?>">
                    <button type="submit" class="inline-flex items-center px-4 py-3 text-sm font-semibold text-white bg-orange-500 border border-transparent rounded-lg gap-x-2 hover:bg-orange-400">Cetak Laporan Hasil Kuisioner</button>
                </form>
            </div>

            <!-- Kriteria Nilai Indeks Kepuasan Pelanggan (CSI) -->
            <div class="mb-6">
                <p class="py-2 font-bold text-gray-600">Kriteria Nilai Indeks Kepuasan Pelanggan (CSI)</p>
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700" id="dataTableKepentingan">
                                <thead>
                                    <tr>
                                        <th scope="col" class="p-3 text-sm font-bold text-white capitalize bg-orange-400 border border-gray-300 text-start">#</th>
                                        <th scope="col" class="p-3 text-sm font-bold text-white capitalize bg-orange-400 border border-gray-300 text-start">Nilai CSI</th>
                                        <th scope="col" class="p-3 text-sm font-bold text-white capitalize bg-orange-400 border border-gray-300 text-start">Kriteria CSI</th>
                                    </tr>
                                </thead>
                                <tbody class="font-bold divide-y divide-gray-200 dark:divide-gray-700">
                                    <?php foreach ($nilaiCSI as $key => $value) :  ?>
                                        <tr>
                                            <td class="p-3 text-sm font-bold text-gray-100 bg-orange-400 border border-gray-300"><?= $key + 1 ?></td>
                                            <td class="p-3 text-sm font-bold text-gray-700 border border-gray-300"><?= $value; ?></td>
                                            <td class="p-3 text-sm font-bold text-gray-700 border border-gray-300"><?= $kriteriaCSI[$key] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Card -->
</div>
<!-- End Card Section -->

<?= $this->endSection() ?>