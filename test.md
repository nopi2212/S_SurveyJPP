<tbody class="divide-y divide-gray-200 dark:divide-gray-700" id="table-result">
<?php foreach ($customers as $customer) :  ?>
<?php $tanggal = date('Y-m-d', strtotime($customer->LastTransaction)); ?>
<tr>
<td class="px-2 text-sm font-bold text-gray-700 border"><?= ucwords($customer->NamaCustomer) ?></td>
<td class="px-2 text-sm font-bold text-gray-700 border"><?= tgl_indonesia($tanggal) ?></td>
<td class="px-2 text-sm font-bold text-gray-700 border"><?= ucwords($customer->KategoriTransaction) ?></td>
<?php foreach ($hasilkuisioners as $hasilkuisioner) :  ?>
<?php if ($customer->IdCustomer == $hasilkuisioner->customer_IdCustomer) : ?>
<td class="px-2 text-sm font-bold text-gray-700 border"><?= ($hasilkuisioner->Harapan) ?></td>
<?php endif; ?>
<?php endforeach; ?>
</tr>
<?php endforeach; ?>
</tbody>