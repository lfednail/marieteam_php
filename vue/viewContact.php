<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Vérification de l'email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "L'email n'est pas valide.";
    } else {
        // L'adresse email où le message sera envoyé
        $to = "votreemail@domaine.com"; // Remplacez par votre adresse email
        $subject = "Nouveau message de $name";
        $body = "Nom: $name\nEmail: $email\n\nMessage:\n$message";
        $headers = "From: $email";

        // Envoi de l'email
        if (mail($to, $subject, $body, $headers)) {
            $success = "Message envoyé avec succès !";
        } else {
            $error = "Une erreur s'est produite. Veuillez réessayer.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 py-10">
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold text-center mb-4">Contactez-nous</h1>

        <!-- Message de succès ou d'erreur -->
        <?php if (isset($success)) { ?>
            <div class="bg-green-500 text-white p-3 rounded-md mb-4"><?php echo $success; ?></div>
        <?php } elseif (isset($error)) { ?>
            <div class="bg-red-500 text-white p-3 rounded-md mb-4"><?php echo $error; ?></div>
        <?php } ?>

        <form method="POST" action="">
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                <input type="text" id="name" name="name" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div class="mb-4">
                <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                <textarea id="message" name="message" required rows="4" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
            </div>

            <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                Envoyer
            </button>
        </form>
    </div>
</body>
</html>
