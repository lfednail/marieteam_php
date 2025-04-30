<!-- Hero Section -->
<div class="bg-blue-800 text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl font-bold mb-4">Our Liaisons</h1>
        <p class="text-lg">Discover our maritime connections</p>
    </div>
</div>

<!-- Liaisons Grid -->
<div class="container mx-auto px-4 py-12">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        <?php foreach ($liaisons as $l): ?>
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <!-- Image -->
                <div class="relative h-48">
                    <img src="/marieteam_php/assets/<?= strtolower(str_replace(' ', '-', $l['Lieu_arrivee'])) ?>.jpg" 
                        alt="<?= $l['Lieu_arrivee'] ?>" 
                        class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-4 text-white">
                        <h3 class="text-lg font-bold"><?= $l['Lieu_depart'] ?></h3>
                        <p class="text-sm">to</p>
                        <h3 class="text-lg font-bold"><?= $l['Lieu_arrivee'] ?></h3>
                    </div>
                </div>
                
                <!-- Content -->
                <div class="p-4">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-gray-600">Distance</span>
                        <span class="font-semibold"><?= $l['Distance_liaison'] ?> km</span>
                    </div>
                    
                    <div class="flex gap-2">
                        <a href="/marieteam_php/liaisons/<?= $l['id_Liaison'] ?>" 
                            class="flex-1 bg-blue-600 text-white text-center py-2 rounded hover:bg-blue-700 transition duration-300">
                            View details
                        </a>
                        <?php if(isset($_SESSION['user']) && ($_SESSION['user']['Role'] == "admin" || $_SESSION['user']['Role'] == "Admin")): ?>
                            <a href="/marieteam_php/liaisons/edit/<?= $l['id_Liaison'] ?>" 
                                class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 transition duration-300">
                                Edit
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Add New Liaison Button (for admins) -->
<?php if(isset($_SESSION['user']) && ($_SESSION['user']['Role'] == "admin" || $_SESSION['user']['Role'] == "Admin")): ?>
    <div class="container mx-auto px-4 py-8 text-center">
        <a href="/marieteam_php/liaisons/create" 
            class="inline-block bg-green-600 text-white px-6 py-3 rounded shadow hover:bg-green-700 transition duration-300">
            Add new liaisons
        </a>
    </div>
<?php endif; ?>