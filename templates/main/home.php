<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choisissez votre service | MarieTeam</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

<!-- Header Section -->
<header class="relative bg-blue-700 text-white py-20">
    <!-- Image de fond floutée -->
    <div class="absolute inset-0">
        <img src="/marieteam_php/public/assets/image-header.jpg" alt="Paysage maritime"
             class="w-full h-full object-cover blur-md opacity-60">
    </div>

    <!-- Contenu du header -->
    <div class="relative z-10 container mx-auto text-center">
        <h1 class="text-5xl font-bold">Bienvenue chez MarieTeam</h1>
        <p class="mt-4 text-xl">
            Votre partenaire pour voyager ou transporter vos marchandises à travers le monde.
        </p>
        <div class="mt-8">
            <a href="#services" class="bg-green-500 text-white px-8 py-3 rounded-lg shadow-lg hover:bg-green-600">
                Nos Services
            </a>
        </div>
    </div>
</header>

<!-- Main Content -->
<main class="container mx-auto w-full py-16 px-4">
    <!-- Services Section -->
    <section id="services" class="text-center py-16">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl font-bold text-blue-800 mb-6">Nos Services</h2>
            <p class="text-gray-600 mb-12">
                Découvrez nos solutions adaptées pour le voyage et le fret maritime.
            </p>
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Service de Voyage -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden mx-auto max-w-sm">
                    <img src="/marieteam_php/public/assets/sunset-voyages.jpg" alt="Service de Voyage" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-blue-800">Services de Voyage</h3>
                        <p class="mt-4 text-gray-600">
                            Profitez d'une expérience de voyage inoubliable avec nos offres personnalisées et un service irréprochable.
                        </p>
                        <a href="#voyage" class="mt-6 inline-block bg-blue-500 text-white px-6 py-2 rounded-lg shadow-lg hover:bg-blue-600">
                            En savoir plus
                        </a>
                    </div>
                </div>

                <!-- Service de Fret Maritime -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden mx-auto max-w-sm">
                    <img src="/marieteam_php/public/assets/Modern-cargo-ship.png" alt="Service de Fret Maritime" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-blue-800">Services de Fret Maritime</h3>
                        <p class="mt-4 text-gray-600">
                            Transportez vos marchandises à l'échelle internationale avec une solution fiable et économique.
                        </p>
                        <a href="#fret" class="mt-6 inline-block bg-green-500 text-white px-6 py-2 rounded-lg shadow-lg hover:bg-green-600">
                            En savoir plus
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Footer -->
<footer class="bg-gray-800 text-white py-6 text-center">
    <div class="container mx-auto">
        <p>© 2024 MarieTeam. Tous droits réservés.</p>
    </div>
</footer>

</body>
</html>
