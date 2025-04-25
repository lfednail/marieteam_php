
<!-- vertion traduite -->


<div class="max-w-7xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-center text-blue-800 mb-8">Search for a crossing</h1>

    <!-- Search form -->
    <form action="/marieteam_php/crossing/search" method="POST" class="bg-white p-6 rounded-lg shadow-md mb-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Departure location -->
            <div>
                <label for="lieu_depart" class="block text-sm font-medium text-gray-700 mb-1">Departure location</label>
                <input type="text" id="lieu_depart" name="lieu_depart" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Arrival location -->
            <div>
                <label for="lieu_arrivee" class="block text-sm font-medium text-gray-700 mb-1">Arrival location</label>
                <input type="text" id="lieu_arrivee" name="lieu_arrivee" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Departure date -->
            <div>
                <label for="date_depart" class="block text-sm font-medium text-gray-700 mb-1">Departure date</label>
                <input type="date" id="date_depart" name="date_depart" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>
        </div>
            <!-- Button de recherche -->
        <div class="mt-6 text-center">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition duration-300">
                Search
            </button>
        </div>
    </form>

    <!-- Results table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-blue-700 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Departure date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Arrival date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Departure location</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Arrival location</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Boat</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Available seats</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php if (isset($crossings) && !empty($crossings)): ?>
                    <?php foreach ($crossings as $crossing): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap"><?= overspecialises($crossing['Date_depart']) ?></td>
                            <td class="px-6 py-4 whitespace-nowrap"><?= overspecialises($crossing['Date_arrive']) ?></td>
                            <td class="px-6 py-4 whitespace-nowrap"><?= overspecialises($crossing['Lieu_depart']) ?></td>
                            <td class="px-6 py-4 whitespace-nowrap"><?= overspecialises($crossing['Lieu_arrivee']) ?></td>
                            <td class="px-6 py-4 whitespace-nowrap"><?= overspecialises($crossing['Nom_bateau']) ?></td>
                            <td class="px-6 py-4 whitespace-nowrap"><?= overspecialises($crossing['Nombre_place']) ?></td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="/marieteam_php/crossing/<?= $crossing['id_Traversee'] ?>" class="text-blue-600 hover:text-blue-900">View details</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                            No crossings found
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>