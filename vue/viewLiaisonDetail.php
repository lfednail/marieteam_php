<!-- Improved Tables -->
<div class="p-4 space-y-8">
  <div style="position: sticky; top: 0; background: white; z-index: 10;">
    <label for="Tarif" class="block text-lg font-semibold text-gray-700 mb-2">Tarif</label>
    <table id="Tarif" class="w-full border border-gray-300 bg-white shadow-md rounded-lg overflow-hidden">
      <thead class="bg-blue-700 text-white text-center">
      <tr>
        <th class="py-3 px-4">Category</th>
        <th class="py-3 px-4">Type</th>
				<?php foreach($periodes as $p): ?>
          <th class="py-3 px-4"> <?= $p['Debut_periode'] . ' <br> to <br> ' . $p['Fin_periode'] ?> </th>
				<?php endforeach; ?>
        <th></th>
      </tr>
      </thead>
      <tbody class="text-center">
			<?php foreach($tarif as $t): ?>
        <tr class="even:bg-gray-100 border-t border-gray-300">
          <td class="py-3 px-4"> <?= $t['Libelle_categorie_tarif'] ?> </td>
          <td class="py-3 px-4"> <?= $t['Libelle_typeTarif'] ?> </td>
					<?php foreach($periodes as $p): ?>
            <td class="py-3 px-4"> <?= (new DateTime($t['Debut_periode']) == new DateTime($p['Debut_periode'])) ? $t['Tarif'] . '€' : 'N/A' ?> </td>
					<?php endforeach; ?>
        </tr>
			<?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <!-- Table: Crossing Voyageur -->
	<?php if (!empty($crossingVoyageur)): ?>
    <div class="w-full mx-auto">
      <label class="block text-lg font-semibold text-gray-700 mb-2">Crossing Voyageur</label>
      <table class="w-full border border-gray-300 bg-white shadow-md rounded-lg overflow-hidden">
        <thead class="bg-blue-700 text-white text-center">
        <tr>
          <th class="py-3 px-4">Boarding Date</th>
          <th class="py-3 px-4">Arrival Date</th>
          <th class="py-3 px-4">Boarding Quay</th>
          <th class="py-3 px-4">Destination</th>
          <th class="py-3 px-4">Travel Length</th>
          <th class="py-3 px-4">Boat Name</th>
          <th class="py-3 px-4">Passenger Places</th>
          <th class="py-3 px-4">Vehicle Places &lt; 5m</th>
          <th class="py-3 px-4">Vehicle Places &gt; 5m</th>
        </tr>
        </thead>
        <tbody class="text-center">
				<?php foreach ($crossingVoyageur as $cv): ?>
          <tr class="even:bg-gray-100 border-t border-gray-300">
            <td class="py-3 px-4"> <?= $cv['Date_depart'] ?> </td>
            <td class="py-3 px-4"> <?= $cv['Date_arrive'] ?> </td>
            <td class="py-3 px-4"> <?= $cv['Lieu_depart'] ?> </td>
            <td class="py-3 px-4"> <?= $cv['Lieu_arrivee'] ?> </td>
            <td class="py-3 px-4"> <?= $cv['Distance_liaison'] ?> </td>
            <td class="py-3 px-4"> <?= $cv['Nom_bateau'] ?> </td>
            <td class="py-3 px-4"> <?= $cv['Places_passager'] ?> </td>
            <td class="py-3 px-4"> <?= $cv['Places_vehicule_inf_5'] ?> </td>
            <td class="py-3 px-4"> <?= $cv['Places_vehicule_sup_5'] ?> </td>
          </tr>
				<?php endforeach; ?>
        </tbody>
      </table>
    </div>
	<?php endif; ?>

  <!-- Table: Crossing Fret -->
	<?php if (!empty($crossingFret)): ?>
    <div class="w-full mx-auto">
      <label class="block text-lg font-semibold text-gray-700 mb-2">Crossing Fret</label>
      <table class="w-full border border-gray-300 bg-white shadow-md rounded-lg overflow-hidden">
        <thead class="bg-blue-700 text-white text-center">
        <tr>
          <th class="py-3 px-4">Boarding Date</th>
          <th class="py-3 px-4">Arrival Date</th>
          <th class="py-3 px-4">Boarding Quay</th>
          <th class="py-3 px-4">Destination</th>
          <th class="py-3 px-4">Travel Length</th>
          <th class="py-3 px-4">Boat Name</th>
          <th class="py-3 px-4">Max Weight</th>
        </tr>
        </thead>
        <tbody class="text-center">
				<?php foreach ($crossingFret as $cf): ?>
          <tr class="even:bg-gray-100 border-t border-gray-300">
            <td class="py-3 px-4"> <?= $cf['Date_depart'] ?> </td>
            <td class="py-3 px-4"> <?= $cf['Date_arrive'] ?> </td>
            <td class="py-3 px-4"> <?= $cf['Lieu_depart'] ?> </td>
            <td class="py-3 px-4"> <?= $cf['Lieu_arrivee'] ?> </td>
            <td class="py-3 px-4"> <?= $cf['Distance_liaison'] ?> </td>
            <td class="py-3 px-4"> <?= $cf['Nom_bateau'] ?> </td>
            <td class="py-3 px-4"> <?= $cf['Poid_max'] ?> </td>
          </tr>
				<?php endforeach; ?>
        </tbody>
      </table>
    </div>
	<?php endif; ?>
</div>
