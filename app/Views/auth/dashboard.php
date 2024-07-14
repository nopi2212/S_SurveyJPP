<?= $this->extend('layouts/app_auth') ?>

<?= $this->section('title') ?> <span class="mb-4"><?= $title ?></span> <?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Jasa -->
<?php
$TotalMISJasa = 0;
$totalWSJasa = 0;
$resultCSIJasa = 0;
$totalSurvey = count($resultSurveyTaskJasa) / count($pertanyaan);
if ($totalSurvey > 0) {
    foreach ($pertanyaan as $per) {
        $totalSurveyKepentingan = 0;
        foreach ($resultSurveyTaskJasa as $resultJasa) {
            if ($per->IdPertanyaan == $resultJasa->IdPertanyaan) {
                $totalSurveyKepentingan += $resultJasa->Kepentingan;
            }
        }
        $TotalMISJasa += $totalSurveyKepentingan / $totalSurvey;
    }
    foreach ($pertanyaan as $per) {
        $TotalKepentingan = 0;
        $TotalKepuasan = 0;
        foreach ($resultSurveyTaskJasa as $resultJasa) {
            if ($per->IdPertanyaan == $resultJasa->IdPertanyaan) {
                $TotalKepentingan += $resultJasa->Kepentingan;
                $TotalKepuasan += $resultJasa->Kepuasan;
            }
        }
        $a = (($TotalKepentingan / $totalSurvey) / $TotalMISJasa) * 1;
        $b = $TotalKepuasan / $totalSurvey;
    }
    foreach ($pertanyaan as $per) {
        $TotalKepentingan = 0;
        $TotalKepuasan = 0;
        foreach ($resultSurveyTaskJasa as $resultJasa) {
            if ($per->IdPertanyaan == $resultJasa->IdPertanyaan) {
                $TotalKepentingan += $resultJasa->Kepentingan;
                $TotalKepuasan += $resultJasa->Kepuasan;
            }
        }
        $a = (($TotalKepentingan / $totalSurvey) / $TotalMISJasa) * 1;
        $b = $TotalKepuasan / $totalSurvey;
        $totalWSJasa += $a * $b;
    }
    $resultCSIJasa = ($totalWSJasa / 5) * 100;
}
?>

<!-- Produk -->
<?php
$TotalMISProduk = 0;
$totalWSProduk = 0;
$resultCSIProduk = 0;
$totalSurvey = count($resultSurveyTaskProduk) / count($pertanyaan);
if ($totalSurvey > 0) {
    foreach ($pertanyaan as $per) {
        $totalSurveyKepentingan = 0;
        foreach ($resultSurveyTaskProduk as $resultProduk) {
            if ($per->IdPertanyaan == $resultProduk->IdPertanyaan) {
                $totalSurveyKepentingan += $resultProduk->Kepentingan;
            }
        }
        $TotalMISProduk += $totalSurveyKepentingan / $totalSurvey;
    }
    foreach ($pertanyaan as $per) {
        $TotalKepentingan = 0;
        $TotalKepuasan = 0;
        foreach ($resultSurveyTaskProduk as $resultProduk) {
            if ($per->IdPertanyaan == $resultProduk->IdPertanyaan) {
                $TotalKepentingan += $resultProduk->Kepentingan;
                $TotalKepuasan += $resultProduk->Kepuasan;
            }
        }
        $a = (($TotalKepentingan / $totalSurvey) / $TotalMISProduk) * 1;
        $b = $TotalKepuasan / $totalSurvey;
    }
    foreach ($pertanyaan as $per) {
        $TotalKepentingan = 0;
        $TotalKepuasan = 0;
        foreach ($resultSurveyTaskProduk as $resultProduk) {
            if ($per->IdPertanyaan == $resultProduk->IdPertanyaan) {
                $TotalKepentingan += $resultProduk->Kepentingan;
                $TotalKepuasan += $resultProduk->Kepuasan;
            }
        }
        $a = (($TotalKepentingan / $totalSurvey) / $TotalMISProduk) * 1;
        $b = $TotalKepuasan / $totalSurvey;
        $totalWSProduk += $a * $b;
    }
    $resultCSIProduk = ($totalWSProduk / 5) * 100;
}
?>

<?php if (session()->get('Role') == 'admin') : ?>
    <!-- Card Section -->
    <div class="w-full py-5 mx-auto">
        <!-- Grid -->
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 sm:gap-6">
            <!-- Card -->
            <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-800">
                <div class="flex p-4 md:p-5 gap-x-4">
                    <div class="flex-shrink-0 flex justify-center items-center w-[46px] h-[46px] bg-orange-100 rounded-lg dark:bg-gray-800">
                        <i class='text-orange-500 bx-sm bx bx-group'></i>
                    </div>

                    <div class="grow">
                        <p class="text-xs font-bold tracking-wide text-gray-500 uppercase">
                            Total pelanggan
                        </p>
                        <div class="flex items-end gap-1">
                            <h3 class="text-xl font-bold text-orange-500 sm:text-2xl dark:text-gray-200">
                                <?= count($pelanggan) ?>
                            </h3>
                            <span class="text-sm font-medium text-gray-400"> Pelanggan</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Card -->

            <!-- Card -->
            <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-800">
                <div class="flex p-4 md:p-5 gap-x-4">
                    <div class="flex-shrink-0 flex justify-center items-center w-[46px] h-[46px] bg-orange-100 rounded-lg dark:bg-gray-800">
                        <i class='text-orange-500 bx-sm bx bx-file'></i>
                    </div>

                    <div class="grow">
                        <p class="text-xs font-bold tracking-wide text-gray-500 uppercase">
                            Total pertanyaan
                        </p>
                        <div class="flex items-end gap-1">
                            <h3 class="text-xl font-bold text-orange-500 sm:text-2xl dark:text-gray-200">
                                <?= count($pertanyaan) ?>
                            </h3>
                            <span class="text-sm font-medium text-gray-400"> Pertanyaan</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Card -->

            <!-- Card -->
            <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-800">
                <div class="flex p-4 md:p-5 gap-x-4">
                    <div class="flex-shrink-0 flex justify-center items-center w-[46px] h-[46px] bg-orange-100 rounded-lg dark:bg-gray-800">
                        <i class='text-orange-500 bx-sm bx bx-list-check'></i>
                    </div>

                    <div class="grow">
                        <p class="text-xs font-bold tracking-wide text-gray-500 uppercase">
                            Total hasil Kuisioner
                        </p>
                        <div class="flex items-end gap-1">
                            <h3 class="text-xl font-bold text-orange-500 sm:text-2xl dark:text-gray-200">
                                <?= count($hasil_kuisioner) ?>
                            </h3>
                            <span class="text-sm font-medium text-gray-400"> Hasil Kuisioner</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Card -->
        </div>
        <!-- End Grid -->
    </div>
    <!-- End Card Section -->
<?php endif; ?>

<div class="flex gap-4">
    <div class="w-full mb-10 lg:w-2/5">
        <!-- Card -->
        <div class="p-8 bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-800">
            <p class="mb-5 font-bold text-gray-800">Kriteria Nilai <i class="text-orange-600">Customer Satisfaction Index</i> (CSI)</p>
            <div class="flex flex-col">
                <?php foreach ($nilaiCSI as $key => $value) :  ?>
                    <div class="inline-flex px-4 py-3 -mt-px text-sm font-bold text-gray-800 bg-white border border-gray-200 hover:bg-orange-100 gap-x-2 first:rounded-t-lg first:mt-0 last:rounded-b-lg">
                        <div class="flex items-center justify-between w-full">
                            <p><?= $value; ?></p>
                            <span class="inline-flex px-3 py-1 text-xs font-bold text-white bg-orange-500 rounded-full"><?= $kriteriaCSI[$key] ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="w-full mb-10 lg:w-3/5">
        <!-- Card -->
        <div class="p-8 bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-800">
            <p class="mb-3 font-bold text-gray-800">Hasil Analisis Customer Satisfaction Index (CSI) - <?= date('Y') ?> Kategori Jasa</p>
            <div class="mb-10">
                <!-- Jasa -->
                <div class="mb-2">
                    <div class="flex w-full h-2 overflow-hidden bg-gray-200 rounded-full dark:bg-gray-700" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                        <div class="flex flex-col justify-center overflow-hidden text-xs text-center text-white transition duration-500 bg-orange-600 rounded-full whitespace-nowrap dark:bg-orange-500" style="width: <?= round($resultCSIJasa, 2) ?>%"></div>
                    </div>
                </div>
                <!-- End Jasa -->
                <span class="text-sm font-bold text-gray-600">Customer Satisfaction Index (CSI): <strong class="text-lg font-extrabold text-orange-500"><?= round($resultCSIJasa, 2) ?>%</strong></span>
                <br />
                <span class="text-sm font-bold text-gray-600">Indikasi: <strong class="text-base font-extrabold text-orange-500"><?= cekCSI(round($resultCSIJasa, 4)) ?></strong></span>
            </div>

            <p class="mb-3 font-bold text-gray-800">Hasil Analisis Customer Satisfaction Index (CSI) - <?= date('Y') ?> Kategori Produk</p>
            <div class="mb-5">
                <!-- Produk -->
                <div class="mb-2">
                    <div class="flex w-full h-2 overflow-hidden bg-gray-200 rounded-full dark:bg-gray-700" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                        <div class="flex flex-col justify-center overflow-hidden text-xs text-center text-white transition duration-500 bg-orange-600 rounded-full whitespace-nowrap dark:bg-orange-500" style="width: <?= round($resultCSIProduk, 2) ?>%"></div>
                    </div>
                </div>
                <!-- End Produk -->
                <span class="text-sm font-bold text-gray-600">Customer Satisfaction Index (CSI): <strong class="text-lg font-extrabold text-orange-500"><?= round($resultCSIProduk, 2) ?>%</strong></span>
                <br />
                <span class="text-sm font-bold text-gray-600">Indikasi: <strong class="text-base font-extrabold text-orange-500"><?= cekCSI(round($resultCSIProduk, 4)) ?></strong></span>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>

</script>
<?= $this->endSection() ?>