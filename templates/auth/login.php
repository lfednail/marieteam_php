<!-- login.php -->

<!-- if error -->
<?php
if(isset($_SESSION['error'])){
    echo '<div class="error" > <p class="error-messege" >';
    foreach ($_SESSION['error'] as $error)
        echo $error;
    echo  '</p></div>';
}
?>

<div class="container mx-auto max-w-lg p-8 bg-white shadow-lg rounded my-10 " >
	<h2 class="text-3xl font-bold text-center mb-6">Login</h2>

	<form action="try_login" method="POST">
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
	<p class = "py-2 text-sm">You don't have an account? Create one!</p>
    <button type="button" onclick=location.href="register" class="w-40 bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700">Register</button>
</div>