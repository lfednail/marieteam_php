<?php


// Rediriger l'utilisateur s'il n'est pas connecté
if (!isset($_SESSION['user'])) {
    header('Location: /marieteam_php');
    exit;
}

$errors = [];

// Traitement de l'upload de l'avatar
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['avatar'])) {
    $uploadDir = 'uploads/avatars/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    // Créer un nom de fichier unique
    $fileName = uniqid() . '-' . basename($_FILES['avatar']['name']);
    $uploadFile = $uploadDir . $fileName;

    // Vérifier que le fichier est une image
    $check = getimagesize($_FILES['avatar']['tmp_name']);
    if ($check === false) {
        $errors[] = "Le fichier sélectionné n'est pas une image valide.";
    } else {
        if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile)) {
            // Mettez à jour l'avatar dans la session (et dans la BDD si nécessaire)
            $_SESSION['user']['avatar'] = $uploadFile;
        } else {
            $errors[] = "L'upload de l'image a échoué.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon Profil</title>
    <!-- Inclusion de Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Inclusion de Font Awesome pour l'icône (optionnel) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-pap0Gl6gvQk9+Sx25u2TQFRQp7En5GqqltmUlBTJl0v+qYB3BwIjgWQyW1Il8JbF4nVujCskOup0Ch7e3vBfZA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Styles pour l'overlay sur l'image */
        .avatar-container {
            position: relative;
            display: inline-block;
        }
        .avatar-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            border-radius: 9999px;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }
        .avatar-container:hover .avatar-overlay {
            opacity: 1;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="max-w-6xl mx-auto mt-10 p-4">
        <!-- Conteneur de la carte profil -->
        <div class="bg-white shadow-xl rounded-lg overflow-hidden flex flex-col md:flex-row">
            <!-- Panneau latéral -->
            <div class="bg-gradient-to-b from-blue-600 to-purple-600 p-6 flex flex-col items-center md:w-1/3">
                <!-- Formulaire d'upload de l'avatar -->
                <form action="" method="POST" enctype="multipart/form-data" class="flex flex-col items-center">
                    <label for="avatarInput" class="cursor-pointer avatar-container">
                        <img class="w-32 h-32 rounded-full border-4 border-white shadow-md transition hover:opacity-90"
                             src="<?= isset($_SESSION['user']['avatar']) ? $_SESSION['user']['avatar'] : 'https://via.placeholder.com/150' ?>"
                             alt="Avatar">
                        <!-- Overlay avec icône de crayon -->
                        <div class="avatar-overlay">
                            <i class="fa-solid fa-pencil text-white text-2xl"></i>
                        </div>
                    </label>
                    <input type="file" id="avatarInput" name="avatar" class="hidden" accept="image/*" onchange="this.form.submit()">
                </form>
                <!-- Informations essentielles -->
                <div class="mt-4 text-center">
                    <h2 class="text-xl font-bold text-white">
                        <?= $_SESSION['user']['Nom_utilisateur'] . ' ' . $_SESSION['user']['Prenom_utilisateur'] ?>
                    </h2>
                    <p class="text-white text-sm"><?= $_SESSION['user']['Mail'] ?></p>
                </div>
            </div>
            <!-- Section principale -->
            <div class="p-6 md:w-2/3">
                <!-- Affichage des erreurs -->
                <?php if (!empty($errors)): ?>
                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded" role="alert">
                        <?php foreach ($errors as $error): ?>
                            <p><?= $error; ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <!-- Détails du profil -->
                <h3 class="text-2xl font-semibold text-gray-800 mb-4">Détails du Profil</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div class="p-4 border rounded-lg">
                        <h4 class="font-bold text-gray-600">Email</h4>
                        <p class="text-gray-800"><?= $_SESSION['user']['Mail'] ?></p>
                    </div>
                    <div class="p-4 border rounded-lg">
                        <h4 class="font-bold text-gray-600">Date d'inscription</h4>
                        <p class="text-gray-800"><?= $_SESSION['user']['date_inscription'] ?? 'N/A' ?></p>
                    </div>
                    <div class="p-4 border rounded-lg">
                        <h4 class="font-bold text-gray-600">Rôle</h4>
                        <p class="text-gray-800"><?= $_SESSION['user']['role'] ?? 'Utilisateur' ?></p>
                    </div>
                    <!-- Ajoutez d'autres informations ici si besoin -->
                </div>
                <!-- Boutons d'actions -->
                <div class="flex flex-col md:flex-row gap-4">
                    <a href="profile/editProfile" class="flex-1 text-center bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition">
                        ✏️ Modifier le Profil
                    </a>
                    <a href="profile/reservation" class="flex-1 text-center bg-green-600 text-white py-3 rounded-lg hover:bg-green-700 transition">
                        📅 Mes Réservations
                    </a>
                    <a href="logout" class="flex-1 text-center bg-red-600 text-white py-3 rounded-lg hover:bg-red-700 transition">
                        🚪 Déconnexion
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
