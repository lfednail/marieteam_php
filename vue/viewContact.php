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
    <!-- Contact Page -->
    <div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-50 py-12">
        <div class="container mx-auto px-4">
            <!-- Header -->
            <div class="text-center mb-16">
                <h1 class="text-5xl font-bold text-gray-800 mb-4">Get in Touch</h1>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Have questions? We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
            </div>

            <div class="max-w-6xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Contact Cards -->
                    <div class="lg:col-span-1 space-y-6">
                        <!-- Email Card -->
                        <div class="bg-white rounded-xl shadow-sm p-6 transform transition duration-300 hover:scale-105">
                            <div class="flex items-center space-x-4">
                                <div class="bg-blue-100 p-3 rounded-full">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800">Email Us</h3>
                                    <a href="mailto:contact@marieteam.com" class="text-blue-600 hover:text-blue-800">contact@marieteam.com</a>
                                </div>
                            </div>
                        </div>

                        <!-- Phone Card -->
                        <div class="bg-white rounded-xl shadow-sm p-6 transform transition duration-300 hover:scale-105">
                            <div class="flex items-center space-x-4">
                                <div class="bg-green-100 p-3 rounded-full">
                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800">Call Us</h3>
                                    <a href="tel:+33123456789" class="text-blue-600 hover:text-blue-800">+33 1 23 45 67 89</a>
                                </div>
                            </div>
                        </div>

                        <!-- Location Card -->
                        <div class="bg-white rounded-xl shadow-sm p-6 transform transition duration-300 hover:scale-105">
                            <div class="flex items-center space-x-4">
                                <div class="bg-purple-100 p-3 rounded-full">
                                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800">Visit Us</h3>
                                    <p class="text-gray-600">123 Rue de la Mer<br>75000 Paris, France</p>
                                </div>
                            </div>
                        </div>

                        <!-- Hours Card -->
                        <div class="bg-white rounded-xl shadow-sm p-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Business Hours</h3>
                            <div class="space-y-3">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Monday - Friday</span>
                                    <span class="font-medium text-gray-800">9:00 AM - 6:00 PM</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Saturday</span>
                                    <span class="font-medium text-gray-800">10:00 AM - 4:00 PM</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Sunday</span>
                                    <span class="font-medium text-gray-800">Closed</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Form -->
                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-xl shadow-sm p-8">
                            <h2 class="text-2xl font-bold text-gray-800 mb-6">Send us a Message</h2>
                            
                            <?php if (isset($success)): ?>
                                <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <svg class="h-5 w-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm text-green-700"><?= $success ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if (isset($error)): ?>
                                <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <svg class="h-5 w-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm text-red-700"><?= $error ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <form method="POST" action="" class="space-y-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                                        <input type="text" id="name" name="name" required
                                               class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
                                               value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
                                    </div>

                                    <div>
                                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                        <input type="email" id="email" name="email" required
                                               class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"
                                               value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                                    </div>
            </div>

                                <div>
                                    <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                                    <textarea id="message" name="message" required rows="6"
                                              class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300"><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
            </div>

                                <button type="submit" 
                                        class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-3 px-6 rounded-lg font-semibold hover:from-blue-700 hover:to-indigo-700 transition duration-300 transform hover:scale-105">
                                    Send Message
            </button>
        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
