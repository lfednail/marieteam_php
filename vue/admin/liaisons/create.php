<!-- Hero Section -->
<div class="relative bg-gradient-to-r from-blue-900 to-blue-700 text-white py-24">
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-black/40"></div>
    </div>
    <div class="relative z-10 container mx-auto text-center">
        <h1 class="text-6xl font-bold mb-6">New Liaisons</h1>
        <p class="text-xl max-w-2xl mx-auto">Create a new maritime connection between two ports</p>
    </div>
</div>

<!-- Create Form -->
<div class="container mx-auto px-4 py-12">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <form action="/marieteam_php/liaisons/store" method="POST" class="p-8">
                <!-- New form to add a route -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                    <!-- Departure quay -->
                    <div>
                        <label for="depart" class="block text-sm font-medium text-gray-700 mb-2">Departure quay</label>
                        <input type="text" name="Lieu_depart" id="depart" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent" required placeholder=":  Marseille">
                    </div>
                    <!-- Arrival quay -->
                    <div>
                        <label for="arrivee" class="block text-sm font-medium text-gray-700 mb-2">Arrival quay</label>
                        <input type="text" name="Lieu_arrivee" id="arrivee" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent" required placeholder=":  Bastia">
                    </div>
                    <!-- Distance -->
                    <div>
                        <label for="distance" class="block text-sm font-medium text-gray-700 mb-2">Route length (km)</label>
                        <input type="number" name="Distance_liaison" id="distance" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent" required min="0" step="0.01" placeholder="Distance in kilometers" value="1">
                    </div>
                </div>
                <!-- Route preview -->
                <div class="mb-8 p-6 bg-gray-50 rounded-lg">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Route preview</h3>
                    <div class="flex items-center justify-between">
                        <div class="flex-1 text-center">
                            <span id="preview_depart" class="text-gray-500">Departure quay</span>
                        </div>
                        <div class="flex items-center gap-2 text-gray-500">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                            <span id="preview_distance">1</span>
                            <span>km</span>
                        </div>
                        <div class="flex-1 text-center">
                            <span id="preview_arrivee" class="text-gray-500">Arrival quay</span>
                        </div>
                    </div>
                </div>
                <!-- Submit button -->
                <div class="flex justify-end space-x-4">
                    <a href="/marieteam_php/liaisons" 
                        class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="px-6 py-3 border border-transparent rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Create route
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript for Preview -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const depart = document.getElementById('depart');
    const arrivee = document.getElementById('arrivee');
    const distance = document.getElementById('distance');
    const previewDepart = document.getElementById('preview_depart');
    const previewArrivee = document.getElementById('preview_arrivee');
    const previewDistance = document.getElementById('preview_distance');

    function updatePreview() {
        previewDepart.textContent = depart.value || "Departure quay";
        previewArrivee.textContent = arrivee.value || "Arrival quay";
        previewDistance.textContent = distance.value || '1';
    }

    depart.addEventListener('input', updatePreview);
    arrivee.addEventListener('input', updatePreview);
    distance.addEventListener('input', updatePreview);
});
</script> 