<?php

use App\DB\BDD;

$db = new BDD();

$traversee = $db->selectAll('Select * from viewtraversee');
?>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg my-10">
  <table class="w-full text-sm text-left rtl:text-right text-gray-500">
    <thead class="text-xs text-white uppercase bg-gray-50">
    <tr>
      <th scope="col" class="px-6 py-3">Boarding date</th>
      <th scope="col" class="px-6 py-3">Arrival date</th>
      <th scope="col" class="px-6 py-3">Number of places</th>
      <th scope="col" class="px-6 py-3">Boarding quay</th>
      <th scope="col" class="px-6 py-3">Destination</th>
      <th scope="col" class="px-6 py-3">Travel length</th>
      <th scope="col" class="px-6 py-3">Boat name</th>
      <th scope="col" class="px-6 py-3">Type boat</th>
    </tr>
    </thead>
    <tbody>
		<?php foreach ($traversee as $t): ?>
      <tr class="odd:bg-white even:bg-gray-50 border-b ">
        <td class="px-6 py-4"><?= $t['Date_depart'] ?></td>
        <td class="px-6 py-4"><?= $t['Date_arrive'] ?></td>
        <td class="px-6 py-4"><?= $t['Nombre_place'] ?></td>
        <td class="px-6 py-4"><?= $t['Lieu_depart'] ?></td>
        <td class="px-6 py-4"><?= $t['Lieu_arrivee'] ?></td>
        <td class="px-6 py-4"><?= $t['Distance_liaison'] ?></td>
        <td class="px-6 py-4"><?= $t['Nom_bateau'] ?></td>
        <td class="px-6 py-4"><?= $t['Type_bateau'] ?></td>
      </tr>
		<?php endforeach; ?>
    </tbody>
  </table>
</div>
