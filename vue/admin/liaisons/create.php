<!-- Hero Section -->
<div class="relative bg-gradient-to-r from-blue-900 to-blue-700 text-white py-24">
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-black/40"></div>
    </div>
    <div class="relative z-10 container mx-auto text-center">
        <h1 class="text-6xl font-bold mb-6">Nouvelle Liaison</h1>
        <p class="text-xl max-w-2xl mx-auto">Créez une nouvelle connexion maritime entre deux ports</p>
    </div>
</div>

<!-- Create Form -->
<div class="container mx-auto px-4 py-12">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <form action="/marieteam_php/liaisons/store" method="POST" class="p-8">
                <!-- Ports Selection -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                    <!-- Departure Port -->
                    <div>
                        <label for="port_depart" class="block text-sm font-medium text-gray-700 mb-2">Port de départ</label>
                        <select id="port_depart" name="port_depart" required
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="">Sélectionnez un port de départ</option>
                            <?php foreach ($ports as $port): ?>
                                <option value="<?= $port['id_Port'] ?>">
                                    <?= htmlspecialchars($port['Nom_port']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Arrival Port -->
                    <div>
                        <label for="port_arrivee" class="block text-sm font-medium text-gray-700 mb-2">Port d'arrivée</label>
                        <select id="port_arrivee" name="port_arrivee" required
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="">Sélectionnez un port d'arrivée</option>
                            <?php foreach ($ports as $port): ?>
                                <option value="<?= $port['id_Port'] ?>">
                                    <?= htmlspecialchars($port['Nom_port']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <!-- Distance -->
                <div class="mb-8">
                    <label for="distance" class="block text-sm font-medium text-gray-700 mb-2">Distance (km)</label>
                    <div class="relative">
                        <input type="number" id="distance" name="distance" required min="0" step="0.01"
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               placeholder="Entrez la distance en kilomètres">
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <span class="text-gray-500">km</span>
                        </div>
                    </div>
                </div>

                <!-- Preview Section -->
                <div class="mb-8 p-6 bg-gray-50 rounded-lg">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Aperçu de la liaison</h3>
                    <div class="flex items-center justify-between">
                        <div class="flex-1 text-center">
                            <span id="preview_depart" class="text-gray-500">Port de départ</span>
                        </div>
                        <div class="flex items-center gap-2 text-gray-500">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                            <span id="preview_distance">0</span>
                            <span>km</span>
                        </div>
                        <div class="flex-1 text-center">
                            <span id="preview_arrivee" class="text-gray-500">Port d'arrivée</span>
                        </div>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex justify-end space-x-4">
                    <a href="/marieteam_php/liaisons" 
                       class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Annuler
                    </a>
                    <button type="submit" 
                            class="px-6 py-3 border border-transparent rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Créer la liaison
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript for Preview -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const portDepart = document.getElementById('port_depart');
    const portArrivee = document.getElementById('port_arrivee');
    const distance = document.getElementById('distance');
    const previewDepart = document.getElementById('preview_depart');
    const previewArrivee = document.getElementById('preview_arrivee');
    const previewDistance = document.getElementById('preview_distance');

    function updatePreview() {
        const selectedDepart = portDepart.options[portDepart.selectedIndex].text;
        const selectedArrivee = portArrivee.options[portArrivee.selectedIndex].text;
        
        previewDepart.textContent = selectedDepart || 'Port de départ';
        previewArrivee.textContent = selectedArrivee || 'Port d\'arrivée';
        previewDistance.textContent = distance.value || '0';
    }

    portDepart.addEventListener('change', updatePreview);
    portArrivee.addEventListener('change', updatePreview);
    distance.addEventListener('input', updatePreview);
});
</script> 