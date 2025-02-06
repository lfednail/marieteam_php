<?php


// Redirect if the user is not logged in
if (!isset($_SESSION['user'])) {
    header('Location: /marieteam_php');
    exit;
}

$errors = [];

// Handle avatar upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['avatar'])) {
    $uploadDir = 'uploads/avatars/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    // Create a unique file name
    $fileName = uniqid() . '-' . basename($_FILES['avatar']['name']);
    $uploadFile = $uploadDir . $fileName;

    // Check if the file is a valid image
    $check = getimagesize($_FILES['avatar']['tmp_name']);
    if ($check === false) {
        $errors[] = "The selected file is not a valid image.";
    } else {
        if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile)) {
            // Update the avatar in the session (and in the DB if necessary)
            $_SESSION['user']['avatar'] = $uploadFile;
        } else {
            $errors[] = "Image upload failed.";
        }
    }
}
?>

<!-- Profile card container -->
<div class="max-w-6xl mx-auto mt-10 p-4">
    <div class="bg-white shadow-xl rounded-lg overflow-hidden flex flex-col md:flex-row">
        <!-- Sidebar -->
        <div class="bg-gradient-to-b from-blue-600 to-purple-600 p-6 flex flex-col items-center md:w-1/3">
            <!-- Avatar upload form -->
            <form action="" method="POST" enctype="multipart/form-data" class="flex flex-col items-center">
                <label for="avatarInput" class="cursor-pointer avatar-container relative inline-block">
                    <img class="w-32 h-32 rounded-full border-4 border-white shadow-md transition hover:opacity-90"
                         src="<?= isset($_SESSION['user']['avatar']) ? $_SESSION['user']['avatar'] : 'https://via.placeholder.com/150' ?>"
                         alt="Avatar">
                    <!-- Overlay with pencil icon -->
                    <div class="avatar-overlay absolute top-0 left-0 w-full h-full bg-black bg-opacity-40 rounded-full flex items-center justify-center opacity-0 transition duration-300 ease-in-out hover:opacity-100">
                        <i class="fa-solid fa-pencil text-white text-2xl"></i>
                    </div>
                </label>
                <input type="file" id="avatarInput" name="avatar" class="hidden" accept="image/*" onchange="this.form.submit()">
            </form>
            <!-- Basic user info -->
            <div class="mt-4 text-center">
                <h2 class="text-xl font-bold text-white">
                    <?= $_SESSION['user']['Nom_utilisateur'] . ' ' . $_SESSION['user']['Prenom_utilisateur'] ?>
                </h2>
                <p class="text-white text-sm"><?= $_SESSION['user']['Mail'] ?></p>
            </div>
        </div>
        <!-- Main section -->
        <div class="p-6 md:w-2/3">
            <!-- Error messages -->
            <?php if (!empty($errors)): ?>
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded" role="alert">
                    <?php foreach ($errors as $error): ?>
                        <p><?= $error; ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <!-- Profile details -->
            <h3 class="text-2xl font-semibold text-gray-800 mb-4">Profile Details</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div class="p-4 border rounded-lg"> ?></p>
                </div>
                <div class="p-4 border rounded-lg">
                    <h4 class="font-bold text-gray-600">Registration Date</h4>
                    <p class="text-gray-800"><?= $_SESSION['user']['date_inscription'] ?? 'N/A' ?></p>
                </div>
                <div class="p-4 border rounded-lg">
                    <h4 class="font-bold text-gray-600">Role</h4>
                    <p class="text-gray-800"><?= $_SESSION['user']['role'] ?? 'User' ?></p>
                </div>
                <!-- Additional information can be added here -->
            </div>
            <!-- Action buttons -->
            <div class="flex flex-col md:flex-row gap-4">
                <a href="profile/editProfile" class="flex-1 text-center bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition">
                  Edit Profile
                </a>
                <a href="profile/reservation" class="flex-1 text-center bg-green-600 text-white py-3 rounded-lg hover:bg-green-700 transition">
                  My Reservations
                </a>
                <a href="logout" class="flex-1 text-center bg-red-600 text-white py-3 rounded-lg hover:bg-red-700 transition">
                  Logout
                </a>
            </div>
        </div>
    </div>
</div>
