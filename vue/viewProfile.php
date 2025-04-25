<?php

/*
 *
 * NOt MCV CONFORM FIXE THIS FEDNAIL
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
*/
?>

<!-- Profile Page -->
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-50 py-12">
    <div class="container mx-auto px-4">
        <!-- Profile Header -->
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
                <!-- Cover Image -->
                <div class="h-48 bg-gradient-to-r from-blue-600 to-indigo-600 relative">
                    <div class="absolute bottom-0 left-0 right-0 h-24 bg-gradient-to-t from-white to-transparent"></div>
                </div>

                <!-- Profile Info -->
                <div class="px-8 pb-8 -mt-16 relative">
                    <!-- Avatar -->
                    <div class="flex justify-center">
                        <div class="relative">
                            <img class="w-32 h-32 rounded-full border-4 border-white shadow-lg"
                                 src="<?= isset($_SESSION['user']['avatar']) ? $_SESSION['user']['avatar'] : 'https://via.placeholder.com/150' ?>"
                                 alt="Profile picture">
                            <form action="" method="POST" enctype="multipart/form-data" class="absolute bottom-0 right-0">
                                <label for="avatarInput" class="cursor-pointer">
                                    <div class="bg-blue-600 text-white p-2 rounded-full shadow-lg hover:bg-blue-700 transition duration-300">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                    </div>
                                </label>
                                <input type="file" id="avatarInput" name="avatar" class="hidden" accept="image/*" onchange="this.form.submit()">
                            </form>
                        </div>
                    </div>

                    <!-- User Info -->
                    <div class="text-center mt-4">
                        <h1 class="text-3xl font-bold text-gray-800">
                            <?= $_SESSION['user']['Nom_utilisateur'] . ' ' . $_SESSION['user']['Prenom_utilisateur'] ?>
                        </h1>
                        <p class="text-gray-600 mt-1"><?= $_SESSION['user']['Mail'] ?></p>
                    </div>
                </div>
            </div>

            <!-- Profile Details -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                <!-- Account Information -->
                <div class="bg-white rounded-2xl shadow-sm p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Account Information</h2>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                            <div>
                                <p class="text-sm text-gray-500">Email</p>
                                <p class="font-medium text-gray-800"><?= $_SESSION['user']['Mail'] ?></p>
                            </div>
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                            <div>
                                <p class="text-sm text-gray-500">Registration Date</p>
                                <p class="font-medium text-gray-800"><?= $_SESSION['user']['date_inscription'] ?? 'N/A' ?></p>
                            </div>
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                            <div>
                                <p class="text-sm text-gray-500">Role</p>
                                <p class="font-medium text-gray-800"><?= $_SESSION['user']['role'] ?? 'User' ?></p>
                            </div>
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Account Actions -->
                <div class="bg-white rounded-2xl shadow-sm p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Account Actions</h2>
                    <div class="space-y-4">
                        <a href="/marieteam_php/profile/editProfile" 
                           class="flex items-center justify-between p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition duration-300">
                            <div class="flex items-center space-x-3">
                                <div class="bg-blue-100 p-2 rounded-full">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </div>
                                <span class="font-medium text-gray-800">Edit Profile</span>
                            </div>
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>

                        <a href="/marieteam_php/logout" 
                           class="flex items-center justify-between p-4 bg-red-50 rounded-lg hover:bg-red-100 transition duration-300">
                            <div class="flex items-center space-x-3">
                                <div class="bg-red-100 p-2 rounded-full">
                                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                    </svg>
                                </div>
                                <span class="font-medium text-gray-800">Logout</span>
                            </div>
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
