<!-- Hero Section -->
<div class="relative bg-blue-700 text-white py-20">
    <div class="absolute inset-0">
        <img src="/marieteam_php/assets/ferry-edit.jpg" alt="Ferry en mer" class="w-full h-full object-cover opacity-30">
    </div>
    <div class="relative z-10 container mx-auto text-center">
        <h1 class="text-5xl font-bold mb-4">Edit Liaisons</h1>
        <p class="text-xl">Modify the details of this maritime connection</p>
    </div>
</div>

<!-- Edit Form -->
<div class="container mx-auto px-4 py-12">
    <div class="bg-white rounded-lg shadow-lg p-8 max-w-4xl mx-auto">
        <form action="/marieteam_php/liaisons/update/<?= $liaison['id_Liaison'] ?>" method="POST" class="space-y-6">
            <!-- Departure Location -->
            <div>
                <label for="lieu_depart" class="block text-sm font-medium text-gray-700">Departure Location</label>
                <input type="text" id="lieu_depart" name="lieu_depart" 
                    value="<?= htmlspecialchars($liaison['Lieu_depart']) ?>" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <!-- Arrival Location -->
            <div>
                <label for="lieu_arrivee" class="block text-sm font-medium text-gray-700">Arrival Location</label>
                <input type="text" id="lieu_arrivee" name="lieu_arrivee" 
                    value="<?= htmlspecialchars($liaison['Lieu_arrivee']) ?>" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <!-- Distance -->
            <div>
                <label for="distance" class="block text-sm font-medium text-gray-700">Distance (km)</label>
                <input type="number" id="distance" name="distance" 
                    value="<?= htmlspecialchars($liaison['Distance_liaison']) ?>" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <!-- Ports -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Departure Port -->
                <div>
                    <label for="port_depart" class="block text-sm font-medium text-gray-700">Departure Port</label>
                    <select id="port_depart" name="port_depart" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <?php foreach ($ports as $port): ?>
                            <option value="<?= $port['id_Port'] ?>" 
                                    <?= $port['id_Port'] == $liaison['id_Port_depart'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($port['Nom_port']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Arrival Port -->
                <div>
                    <label for="port_arrivee" class="block text-sm font-medium text-gray-700">Arrival Port</label>
                    <select id="port_arrivee" name="port_arrivee" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <?php foreach ($ports as $port): ?>
                            <option value="<?= $port['id_Port'] ?>" 
                                    <?= $port['id_Port'] == $liaison['id_Port_arrivee'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($port['Nom_port']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="flex justify-end space-x-4">
                <a href="/marieteam_php/liaisons" 
                    class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Cancel
                </a>
                <button type="submit" 
                        class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div> 