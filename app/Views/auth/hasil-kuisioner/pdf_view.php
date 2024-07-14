<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate PDF CodeIgniter 4 - qadrLabs</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        html {
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            padding: 10px;
        }

        .title {
            padding: 20px 0 6px 0;
            color: #3e3e3e;
        }

        table,
        tr,
        th,
        td {
            border: 1px solid #d4d4d4;
        }

        tr,
        th,
        td {
            padding: 7px 0;
        }

        tr th {
            color: white;
            background-color: orange;
            text-align: center;
        }

        .edit {
            color: orange;
            font-weight: 700;
            font-size: 20px;
        }
    </style>
</head>

<body>
    <h2 style="text-align: center; padding: 10px 0;">Data Hasil Perhitungan Survei - Kategori <?= ucwords($kategori) ?> Tahun <?= $tahun ?></h2>

    <!-- Kepentingan -->
    <h3 class="title">Data Skala Kepentingan</h3>
    <table width=100% cellpadding=2 cellspacing=0 style="margin-top: 5px; text-align:center">
        <thead>
            <tr>
                <th>Nama Pelanggan</th>
                <th>Transaksi</th>
                <th>Kategori</th>
                <?php foreach ($pertanyaans as $pertanyaan) : ?>
                    <th><?= $pertanyaan->IdPertanyaan ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datas as $customer) :  ?>
                <?php $hasil = 0 ?>
                <?php $tanggal = date('Y-m-d', strtotime($customer->LastTransaction)); ?>
                <tr>
                    <td><?= ucwords($customer->NamaCustomer) ?></td>
                    <td><?= tgl_indonesia($tanggal, true) ?></td>
                    <td><?= ucwords($customer->KategoriTransaction) ?></td>
                    <?php foreach ($resultSurveyTask as $hasilkuisioner) :  ?>
                        <?php if ($customer->IdCustomer == $hasilkuisioner->customer_IdCustomer) : ?>
                            <td><?= ($hasilkuisioner->Kepentingan) ?></td>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>

            <tr>
                <th colspan="3">Total</th>
                <?php foreach ($pertanyaans as $pertanyaan) : ?>
                    <?php $TotalKepentingan = 0 ?>
                    <?php foreach ($resultSurveyTask as $result) : ?>
                        <?php if ($pertanyaan->IdPertanyaan == $result->IdPertanyaan) : ?>
                            <?php $TotalKepentingan += $result->Kepentingan; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <td><?= ($TotalKepentingan) ?></td>
                <?php endforeach; ?>
            </tr>

            <tr>
                <th colspan="3">Mean Importance Score (MIS)</th>
                <?php foreach ($pertanyaans as $pertanyaan) : ?>
                    <?php $TotalKepentingan = 0 ?>
                    <?php $TotalKepentingan2 = count($resultSurveyTask) / count($pertanyaans) ?>
                    <?php foreach ($resultSurveyTask as $result) : ?>
                        <?php if ($pertanyaan->IdPertanyaan == $result->IdPertanyaan) : ?>
                            <?php $TotalKepentingan += $result->Kepentingan; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <td><?= numberFormat(round($TotalKepentingan / $TotalKepentingan2, 4)) ?></td>
                <?php endforeach; ?>
            </tr>

            <tr>
                <th colspan="3">Total Mean Importance Score (MIS)</th>
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
                <td colspan="7"><?= numberFormat(round($TotalMIS, 4)) ?></td>
            </tr>
        </tbody>
    </table>

    <!-- Kepuasan -->
    <h3 class="title">Data Skala Kepuasan</h3>
    <table width=100% cellpadding=2 cellspacing=0 style="margin-top: 5px; text-align:center">
        <thead>
            <tr>
                <th>Nama Pelanggan</th>
                <th>Transaksi</th>
                <th>Kategori</th>
                <?php foreach ($pertanyaans as $pertanyaan) :  ?>
                    <th><?= $pertanyaan->IdPertanyaan; ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datas as $customer) :  ?>
                <?php $hasil = 0 ?>
                <?php $tanggal = date('Y-m-d', strtotime($customer->LastTransaction)); ?>
                <tr>
                    <td><?= ucwords($customer->NamaCustomer) ?></td>
                    <td><?= tgl_indonesia($tanggal, true) ?></td>
                    <td><?= ucwords($customer->KategoriTransaction) ?></td>
                    <?php foreach ($resultSurveyTask as $hasilkuisioner) :  ?>
                        <?php if ($customer->IdCustomer == $hasilkuisioner->customer_IdCustomer) : ?>
                            <td><?= ($hasilkuisioner->Kepuasan) ?></td>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>

            <tr>
                <th colspan="3">Total</th>
                <?php foreach ($pertanyaans as $pertanyaan) : ?>
                    <?php $TotalKepuasan = 0 ?>
                    <?php foreach ($resultSurveyTask as $result) : ?>
                        <?php if ($pertanyaan->IdPertanyaan == $result->IdPertanyaan) : ?>
                            <?php $TotalKepuasan += $result->Kepuasan; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <td><?= ($TotalKepuasan) ?></td>
                <?php endforeach; ?>
            </tr>

            <tr>
                <th colspan="3">Mean Satisfaction Score (MSS)</th>
                <?php foreach ($pertanyaans as $pertanyaan) : ?>
                    <?php $TotalKepuasan = 0 ?>
                    <?php $TotalKepuasan2 = count($resultSurveyTask) / count($pertanyaans) ?>
                    <?php foreach ($resultSurveyTask as $result) : ?>
                        <?php if ($pertanyaan->IdPertanyaan == $result->IdPertanyaan) : ?>
                            <?php $TotalKepuasan += $result->Kepuasan; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <td><?= numberFormat(round($TotalKepuasan / $TotalKepuasan2, 4)) ?></td>
                <?php endforeach; ?>
            </tr>

            <tr>
                <th colspan="3">Total Mean Satisfaction Score (MSS)</th>
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
                <td colspan="7"><?= numberFormat(round($TotalMSS, 4)) ?></td>
            </tr>
        </tbody>
    </table>

    <!-- Indeks Kepuasan Pelanggan (CSI) -->
    <h3 class="title">Data Indeks Kepuasan Pelanggan (CSI)</h3>
    <table width=100% cellpadding=2 cellspacing=0 style="margin-top: 5px; text-align:center">
        <thead>
            <tr>
                <th colspan="3">#</th>
                <?php foreach ($pertanyaans as $pertanyaan) :  ?>
                    <th><?= $pertanyaan->IdPertanyaan; ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th colspan="3">Weight Factor (WF)</th>
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
                <th colspan="3">Weight Score (WS)</th>
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
                <th colspan="3">Total Weight Score (WS)</th>
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
                <td colspan="7"><?= numberFormat(round($totalWS, 4)); ?></td>
            </tr>

            <tr>
                <th colspan="3">Customer Satisfaction Index (CSI)</th>
                <?php $resultCSI = ($totalWS / 5) * 100; ?>
                <td colspan="7"><?= numberFormat(round($resultCSI, 2)) ?>%</td>
            </tr>

            <tr>
                <th colspan="3">Kesimpulan</th>
                <td colspan="7" class="p-3 text-sm font-extrabold text-gray-700 border border-gray-300 text-start">
                    Berdasarkan Kriteria Nilai Indeks Kepuasan Pelanggan, dengan hasil kuisioner kategori <?= ucwords($kategori) ?> tahun <?= $tahun ?> mendapatkan nilai CSI = <span class="edit"><?= numberFormat(round($resultCSI, 2)) ?>%</span>. Dari nilai CSI tersebut dapat disimpulkan bahwa kriteria Indeks Kepuasan Pelanggan adalah <span class="edit"><?= cekCSI(round($resultCSI, 4)) ?></span>.
                </td>
            </tr>
        </tbody>
    </table>

    <p style="padding: 20px 0; font-weight: 700;">Jumlah Pelanggan Yang Melakukan Survei : <?= count($datas) ?> Pelanggan</p>
</body>

</html>