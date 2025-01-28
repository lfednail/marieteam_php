<!-- login.php -->

<!-- if error -->
<?php
    if(!empty($_SESSION['error'])){
        echo '<div class="error" > <p class="error-message" >';
        foreach ($_SESSION['error'] as $error)
            echo $error . '<br>';
        echo  '</p></div>';
    }
?>

<!-- Login Form -->
<div class="container mx-auto max-w-lg p-8 bg-white shadow-lg rounded mt-12 my-10">
	<h2 class="text-3xl font-bold text-center mb-6">Register</h2>

	<form action="try_register" method="POST">
		<div class="mb-4">
			<label for="last_name" class="block text-gray-700">Last name</label>
			<input type="text" id="last_name" name="last_name" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
		</div>
		<div class="mb-4">
			<label for="first_name" class="block text-gray-700">First name</label>
			<input type="text" id="first_name" name="first_name" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
		</div>
		<div class="mb-4">
			<label for="email" class="block text-gray-700">Email</label>
			<input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
		</div>
		<div class="mb-6">
			<label for="password" class="block text-gray-700">Password</label>
			<input type="password" id="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
		</div>
		<button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700">Register</button>
	</form>
	<p class = "py-2 text-sm">Do you already have an account? Use it!</p>
	<button type="button" onclick=location.href="login" class="w-40 bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700">Connection</button>
</div>