<!-- Liaison Details Redesign with Summary, Back Button, Photo, Map, and Quick Actions -->
<div class="container mx-auto px-4 py-10 max-w-6xl space-y-12">

    <!-- Back Button -->
    <div class="mb-4">
        <a href="/marieteam_php/liaisons" class="inline-flex items-center px-4 py-2 bg-blue-100 text-blue-800 rounded-lg shadow hover:bg-blue-200 transition">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back to list
        </a>
    </div>

    <!-- Section: Title, Summary, Photo, Map, Quick Actions -->
    <div class="bg-gradient-to-r from-blue-800 to-blue-500 text-white rounded-2xl shadow-lg p-8 flex flex-col gap-6 md:flex-row md:items-center md:justify-between">
        <div class="flex flex-col gap-6 md:flex-row md:items-center md:gap-10 w-full">
            <div class="flex-1 min-w-[260px]">
                <h1 class="text-4xl font-bold mb-2 flex items-center gap-3">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                    Route Details
                </h1>
                <p class="text-lg opacity-90">All information about this maritime route, its tariffs and crossings.</p>
                <!-- Liaison Summary Card -->
                <div class="bg-white bg-opacity-90 rounded-xl shadow p-6 flex flex-col gap-2 mt-4">
                    <div class="flex items-center gap-2">
                        <!-- Icône drapeau départ -->
                        <svg class="w-5 h-5 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 21V5a1 1 0 011-1h11l-1.5 3L17 10H5" />
                        </svg>
                        <span class="font-semibold text-gray-700">Departure quay:</span>
                        <span class="text-gray-900"> <?= htmlspecialchars($liaison['Lieu_depart'] ?? ($crossingVoyageur[0]['Lieu_depart'] ?? ($crossingFret[0]['Lieu_depart'] ?? 'N/A'))) ?> </span>
                    </div>
                    <div class="flex items-center gap-2">
                        <!-- Icône drapeau à damier arrivée -->
                        <svg class="w-5 h-5 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <rect x="4" y="5" width="16" height="14" rx="2" fill="white" stroke="currentColor" stroke-width="2"/>
                            <path d="M4 5h16M4 19h16M4 9h16M4 13h16" stroke="currentColor" stroke-width="2"/>
                            <path d="M8 5v14M12 5v14M16 5v14" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        <span class="font-semibold text-gray-700">Arrival quay:</span>
                        <span class="text-gray-900"> <?= htmlspecialchars($liaison['Lieu_arrivee'] ?? ($crossingVoyageur[0]['Lieu_arrivee'] ?? ($crossingFret[0]['Lieu_arrivee'] ?? 'N/A'))) ?> </span>
                    </div>
                    <div class="flex items-center gap-2">
                        <!-- Icône double flèche horizontale distance -->
                        <svg class="w-5 h-5 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12h10M7 12l-3-3m3 3l-3 3M17 12l3-3m-3 3l3 3" />
                        </svg>
                        <span class="font-semibold text-gray-700">Distance:</span>
                        <span class="text-gray-900"> <?= htmlspecialchars($liaison['Distance_liaison'] ?? ($crossingVoyageur[0]['Distance_liaison'] ?? ($crossingFret[0]['Distance_liaison'] ?? 'N/A'))) ?> km</span>
                    </div>
                </div>
                <!-- Quick Actions (admin only) -->
                <?php if(isset($_SESSION['user']) && (strtolower($_SESSION['user']['Role']) === 'admin')): ?>
                <div class="mt-6 flex gap-4 flex-wrap">
                    <a href="/marieteam_php/liaisons/edit/<?= $liaison['id_Liaison'] ?? '' ?>" class="inline-flex items-center px-4 py-2 bg-yellow-400 text-yellow-900 rounded-lg shadow hover:bg-yellow-500 transition">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13l6-6m2 2l-6 6m2 2l-6 6" /></svg>
                        Edit
                    </a>
                    <a href="/marieteam_php/liaisons/delete/<?= $liaison['id_Liaison'] ?? '' ?>" class="inline-flex items-center px-4 py-2 bg-red-100 text-red-700 rounded-lg shadow hover:bg-red-200 transition" onclick="return confirm('Are you sure you want to delete this route?');">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                        Delete
                    </a>
                    <a href="/marieteam_php/crossings/create?liaison=<?= $liaison['id_Liaison'] ?? '' ?>" class="inline-flex items-center px-4 py-2 bg-green-100 text-green-700 rounded-lg shadow hover:bg-green-200 transition">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                        Add crossing
                    </a>
                </div>
                <?php endif; ?>
            </div>
            <!-- Photo -->
            <div class="flex flex-col items-center gap-2">
                <?php
                $imgName = strtolower(str_replace(' ', '-', $liaison['Lieu_arrivee'] ?? ($crossingVoyageur[0]['Lieu_arrivee'] ?? ($crossingFret[0]['Lieu_arrivee'] ?? 'default'))));
                $imgPath = "/marieteam_php/assets/img_destination/{$imgName}.jpg";
                ?>
                <img src="<?= $imgPath ?>" alt="Route photo" class="rounded-xl shadow-lg object-cover w-[400px] h-[250px] bg-gray-200" onerror="this.onerror=null;this.src='/marieteam_php/assets/img_destination/default.jpg';">
                <span class="text-xs text-white opacity-80">Illustrative photo</span>
            </div>
        </div>
    </div>

    <!-- Section: Tariffs -->
    <div class="bg-white rounded-2xl shadow-lg p-6">
        <h2 class="text-2xl font-semibold text-blue-800 mb-4 flex items-center gap-2">
            <!-- Icône Tariffs : pièce de monnaie -->
            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" stroke-width="2" />
                <path stroke-width="2" d="M8 12a4 4 0 1 0 8 0 4 4 0 1 0-8 0" />
            </svg>
            Tariffs
        </h2>
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 rounded-lg shadow-sm">
                <thead class="bg-blue-700 text-white">
      <tr>
        <th class="py-3 px-4">Category</th>
        <th class="py-3 px-4">Type</th>
				<?php foreach($periodes as $p): ?>
                            <th class="py-3 px-4"><?= $p['Debut_periode'] . ' <br> to <br> ' . $p['Fin_periode'] ?></th>
				<?php endforeach; ?>
      </tr>
      </thead>
      <tbody class="text-center">
			<?php foreach($tarif as $t): ?>
                        <tr class="even:bg-gray-50 odd:bg-white border-t">
                            <td class="py-3 px-4"><?= $t['Libelle_categorie_tarif'] ?></td>
                            <td class="py-3 px-4"><?= $t['Libelle_typeTarif'] ?></td>
					<?php foreach($periodes as $p): ?>
                                <td class="py-3 px-4"><?= (new DateTime($t['Debut_periode']) == new DateTime($p['Debut_periode'])) ? $t['Tarif'] . '€' : 'N/A' ?></td>
					<?php endforeach; ?>
        </tr>
			<?php endforeach; ?>
      </tbody>
    </table>
        </div>
  </div>

    <!-- Section: Passenger Crossings -->
	<?php if (!empty($crossingVoyageur)): ?>
    <div class="bg-white rounded-2xl shadow-lg p-6">
        <h2 class="text-2xl font-semibold text-blue-800 mb-4 flex items-center gap-2">
            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M9 21h6M12 17v4m0-4V3"></path>
            </svg>
            Passenger Crossings
        </h2>
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 rounded-lg shadow-sm">
                <thead class="bg-blue-700 text-white">
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
                        <tr class="even:bg-gray-50 odd:bg-white border-t">
                            <td class="py-3 px-4"><?= $cv['Date_depart'] ?></td>
                            <td class="py-3 px-4"><?= $cv['Date_arrive'] ?></td>
                            <td class="py-3 px-4"><?= $cv['Lieu_depart'] ?></td>
                            <td class="py-3 px-4"><?= $cv['Lieu_arrivee'] ?></td>
                            <td class="py-3 px-4"><?= $cv['Distance_liaison'] ?></td>
                            <td class="py-3 px-4"><?= $cv['Nom_bateau'] ?></td>
                            <td class="py-3 px-4"><?= $cv['Places_passager'] ?></td>
                            <td class="py-3 px-4"><?= $cv['Places_vehicule_inf_5'] ?></td>
                            <td class="py-3 px-4"><?= $cv['Places_vehicule_sup_5'] ?></td>
          </tr>
				<?php endforeach; ?>
        </tbody>
      </table>
        </div>
    </div>
	<?php endif; ?>

    <!-- Section: Freight Crossings -->
	<?php if (!empty($crossingFret)): ?>
    <div class="bg-white rounded-2xl shadow-lg p-6">
        <h2 class="text-2xl font-semibold text-blue-800 mb-4 flex items-center gap-2">
            <!-- Icône Freight Crossings : camion -->
            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <rect x="1" y="7" width="15" height="10" rx="2" stroke-width="2" />
                <rect x="16" y="11" width="5" height="6" rx="1" stroke-width="2" />
                <circle cx="6" cy="19" r="2" stroke-width="2" />
                <circle cx="18" cy="19" r="2" stroke-width="2" />
            </svg>
            Freight Crossings
        </h2>
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 rounded-lg shadow-sm">
                <thead class="bg-blue-700 text-white">
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
                        <tr class="even:bg-gray-50 odd:bg-white border-t">
                            <td class="py-3 px-4"><?= $cf['Date_depart'] ?></td>
                            <td class="py-3 px-4"><?= $cf['Date_arrive'] ?></td>
                            <td class="py-3 px-4"><?= $cf['Lieu_depart'] ?></td>
                            <td class="py-3 px-4"><?= $cf['Lieu_arrivee'] ?></td>
                            <td class="py-3 px-4"><?= $cf['Distance_liaison'] ?></td>
                            <td class="py-3 px-4"><?= $cf['Nom_bateau'] ?></td>
                            <td class="py-3 px-4"><?= $cf['Poid_max'] ?></td>
          </tr>
				<?php endforeach; ?>
        </tbody>
      </table>
        </div>
    </div>
	<?php endif; ?>

</div>
