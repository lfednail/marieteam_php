<!-- login.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

<div class="container mx-auto max-w-lg p-8 bg-white shadow-lg rounded">
	<h2 class="text-3xl font-bold text-center mb-6">Login</h2>

	<form action="#" method="POST">
		<div class="mb-4">
			<label for="email" class="block text-gray-700">Email</label>
			<input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
		</div>
		<div class="mb-6">
			<label for="password" class="block text-gray-700">Password</label>
			<input type="password" id="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
		</div>
		<button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700">Login</button>
	</form>
	<p class = "py-2 text-sm">Pas de compte ?</p>
    <button type="button" onclick=location.href="register" class="w-40 bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700">Inscription</button>
</div>

<script>
    const menuBtn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>

</body>
</html>
