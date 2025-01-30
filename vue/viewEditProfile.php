<?php if(isset($_SESSION['user'])): ?>
    <div class="container mx-auto max-w-lg p-8 bg-white shadow-lg rounded my-10">
        <h2 class="text-3xl font-bold text-center mb-6">Edit Profile</h2>

        <form action="try_editProfile/<?= $_SESSION['user']['id_Utilisateur'] ?>" method="post">

            <div class="mb-4">
                <label for="lastname">Lastname</label>
                <input type="text" name="Lieu_depart" id="lastname" class="w-full px-4 py-2 border border-gray-300 rounded-md" value="<?= $_SESSION['user']['Nom_utilisateur'] ?>" required>
            </div>

            <div class="mb-4">
                <label for="firstname">Firstname</label>
                <input type="text" name="Prenom_utilisateur" id="firstname" class="w-full px-4 py-2 border border-gray-300 rounded-md" value="<?= $_SESSION['user']['Prenom_utilisateur'] ?>" required>
            </div>

            <div class="mb-4">
                <label for="email">Email</label>
                <input type="email" name="Distance_liaison" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-md" value="<?= $_SESSION['user']['Mail'] ?>" required>
            </div>

            <div class="mb-4">
                <label for="pwd">Password</label>
                <input type="pass" name="Mot_de_passe" class="w-full px-4 py-2 border border-gray-300 rounded-md" id="pwd">
            </div>

            <div class="mb-4">
                <label for="pwdConf">Confirmation password</label>
                <input type="pass" name="Mot_de_passeConf" class="w-full px-4 py-2 border border-gray-300 rounded-md" id="pwdConf">
            </div>

            <button type="submit" class="w-40 bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700">Save Changes</button>

        </form>
    </div
<?php else: ?>
    <?php header('location: /marieteam_php'); ?>
<?php endif; ?>