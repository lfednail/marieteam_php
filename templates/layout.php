<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data["title"] /* est defini dans le routage */ ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">
<nav class="bg-blue-700 p-6"> <!-- Increased padding here -->
    <div class="container mx-auto flex items-center justify-between">
        <!-- Logo -->
        <a href="#" class="text-white text-4xl font-bold">MarieTeam</a> <!-- Increased font size -->

        <!-- Links (hidden on mobile) -->
        <div class="hidden md:flex space-x-8"> <!-- Increased space between links -->
            <a href="#" class="text-gray-300 text-2xl hover:text-white">Home</a> <!-- Increased font size -->
            <a href="#" class="text-gray-300 text-2xl hover:text-white">About</a> <!-- Increased font size -->
            <a href="#" class="text-gray-300 text-2xl hover:text-white">Services</a> <!-- Increased font size -->
            <a href="#" class="text-gray-300 text-2xl hover:text-white">Contact</a> <!-- Increased font size -->
        </div>

        <!-- Mobile Menu Button -->
        <button id="menu-btn" class="block md:hidden text-gray-300 hover:text-white text-2xl"> <!-- Increased font size -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8"> <!-- Increased icon size -->
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <!-- Mobile Menu (hidden by default) -->
    <div id="mobile-menu" class="hidden md:hidden flex flex-col space-y-6 mt-2 bg-blue-950 p-6 rounded"> <!-- Increased padding -->
        <a href="#" class="text-gray-300 text-2xl hover:text-white">Home</a> <!-- Increased font size -->
        <a href="#" class="text-gray-300 text-2xl hover:text-white">About</a> <!-- Increased font size -->
        <a href="#" class="text-gray-300 text-2xl hover:text-white">Services</a> <!-- Increased font size -->
        <a href="#" class="text-gray-300 text-2xl hover:text-white">Contact</a> <!-- Increased font size -->
    </div>
</nav>
<script>
    const menuBtn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>

</body>
</html>
