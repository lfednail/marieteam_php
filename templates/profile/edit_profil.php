<?php if(isset($_SESSION['user'])): ?>
    <div class="container mx-auto max-w-lg p-8 bg-white shadow-lg rounded">
        <h2 class="text-3xl font-bold text-center mb-6">Edit</h2>

        <form action="/mariteam_php/pubic/profile/try_editProfile/<?= $_SESSION['id_utilisateur'] ?>" method="post">

            <div class="mb-4">
                <label for="lastname">Lastname</label>
                <input type="text" name="Lieu_depart" id="lastname" value="<?= $_SESSION['Nom_utilisateur'] ?>" required>
            </div>

            <div class="mb-4">
                <label for="firstname">Firstname</label>
                <input type="text" name="Prenom_utilisateur" id="firstname" value="<?= $_SESSION['Prenom_Utilisateur'] ?>" required>
            </div>

            <div class="mb-4">
                <label for="email">Email</label>
                <input type="email" name="Distance_liaison" id="email" value="<?= $_SESSION['Mail'] ?>" required>
            </div>

            <div class="mb-4">
                <label for="pwd">Password</label>
                <input type="text" name="Mot_de_passe" id="pwd">
            </div>

            <div class="mb-4">
                <label for="pwdConf">Confirmation password</label>
                <input type="text" name="Mot_de_passeConf" id="pwdConf">
            </div>

            <button type="submit">Edit</button>

        </form>
    </div
<?php else: ?>
    <?php header('location: /'); ?>
<?php endif; ?>