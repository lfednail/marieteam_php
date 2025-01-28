<!-- Header Section -->
<header class="relative bg-blue-700 text-white py-20">
    <!-- Image de fond floutée -->
    <div class="absolute inset-0">
        <img src="/marieteam_php/assets/image-header.jpg" alt="Paysage maritime"
             class="w-full h-full object-cover blur-md opacity-60">
    </div>

    <!-- Contenu du header -->
    <div class="relative z-10 container mx-auto text-center">
        <h1 class="text-5xl font-bold">Welcome to MarieTeam</h1>
        <p class="mt-4 text-xl">
            Our partner to travel or transport our merchandises throughout the world.
        </p>
        <div class="mt-8">
            <a href="#services" class="bg-green-500 text-white px-8 py-3 rounded-lg shadow-lg hover:bg-green-600">
                Our Services
            </a>
        </div>
    </div>
</header>

<!-- Main Content -->
<main class="container mx-auto w-full py-16 px-4">
    <!-- Services Section -->
    <section id="services" class="text-center py-16">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl font-bold text-blue-800 mb-6">Our Services</h2>
            <p class="text-gray-600 mb-12">
                Discover our dynamic solutions for cruises and frets.
            </p>
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Service de Voyage -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden mx-auto max-w-sm">
                    <img src="/marieteam_php/assets/sunset-voyages.jpg" alt="Service de Voyage" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-blue-800">Cruise services</h3>
                        <p class="mt-4 text-gray-600">
                            Try an unforgivable travel experience with our personalised offers and impeccable services
                        </p>
                        <a href="#voyage" class="mt-6 inline-block bg-blue-500 text-white px-6 py-2 rounded-lg shadow-lg hover:bg-blue-600">
                            Know more
                        </a>
                    </div>
                </div>

                <!-- Service de Fret Maritime -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden mx-auto max-w-sm">
                    <img src="/marieteam_php/assets/Modern-cargo-ship.png" alt="Service de Fret Maritime" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-blue-800">Marieteam Fret service</h3>
                        <p class="mt-4 text-gray-600">
                            Transport your merchandises on an internation scale with a reliable and cheap solution
                        </p>
                        <a href="#fret" class="mt-6 inline-block bg-green-500 text-white px-6 py-2 rounded-lg shadow-lg hover:bg-green-600">
                            Know more
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
