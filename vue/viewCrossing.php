<!-- Crossing Page Modern Design -->
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-50 py-12">
    <div class="container mx-auto px-4">
        <!-- Hero Section -->
        <div class="mb-10">
            <div class="h-56 md:h-72 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-2xl flex items-center justify-center shadow-lg relative overflow-hidden">
                <div class="absolute inset-0 bg-black bg-opacity-30"></div>
                <div class="relative z-10 text-center">
                    <h1 class="text-4xl md:text-5xl font-bold text-white mb-2">Look for a crossing</h1>
                    <p class="text-lg md:text-xl text-blue-100">Find the ideal crossing for your needs</p>
                </div>
            </div>
        </div>

        <!-- Search Form -->
        <div class="max-w-3xl mx-auto mb-12">
            <form action="/marieteam_php/crossing/search" method="POST" class="bg-white rounded-2xl shadow-md p-8 grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                <div>
                    <label for="lieu_depart" class="block text-gray-700 font-medium mb-1">Departure</label>
                    <input type="text" id="lieu_depart" name="lieu_depart" placeholder="Departure city" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="lieu_arrivee" class="block text-gray-700 font-medium mb-1">Arrival</label>
                    <input type="text" id="lieu_arrivee" name="lieu_arrivee" placeholder="Arrival city" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="date_depart" class="block text-gray-700 font-medium mb-1">Date</label>
                    <input type="date" id="date_depart" name="date_depart" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200 shadow">Search</button>
                </div>
            </form>
        </div>

        <!-- Results Section -->
        <div class="mt-8">
            <?php if (!empty($crossings)) : ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <?php foreach ($crossings as $crossing) : ?>
                        <div class="bg-white rounded-2xl shadow-md p-6 flex flex-col justify-between hover:shadow-xl transition duration-300">
                            <div>
                                <h2 class="text-2xl font-bold text-blue-700 mb-2">
                                    <?= htmlspecialchars($crossing['lieu_depart']) ?> → <?= htmlspecialchars($crossing['lieu_arrivee']) ?>
                                </h2>
                                <p class="text-gray-600 mb-2">
                                    <span class="font-medium">Date :</span> <?= htmlspecialchars($crossing['date_depart']) ?>
                                </p>
                                <p class="text-gray-600 mb-2">
                                    <span class="font-medium">hour :</span> <?= htmlspecialchars($crossing['heure_depart']) ?>
                                </p>
                                <p class="text-gray-600 mb-2">
                                    <span class="font-medium">Boat :</span> <?= htmlspecialchars($crossing['nom_bateau'] ?? 'N/A') ?>
                                </p>
                                <p class="text-gray-600 mb-2">
                                    <span class="font-medium">Time :</span> <?= htmlspecialchars($crossing['duree'] ?? 'N/A') ?>
                                </p>
                            </div>
                            <div class="mt-4 flex justify-end">
                                <a href="/marieteam_php/crossing/detail?id=<?= urlencode($crossing['id_traversee']) ?>" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg font-semibold transition duration-200">Details</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <div class="text-center text-gray-500 text-lg mt-12">
                    No crossing found for your criteria.
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>