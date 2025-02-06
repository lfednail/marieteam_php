<?php if(isset($_SESSION['user'])): ?>
    <?php if(!empty($errors)): ?>
        <div class="error" > <p class="error-message" >
            <?php foreach ($errors as $error): ?>
                <?= $error; ?><br>
            <?php endforeach; ?>
        </p></div>
    <?php endif; ?>
	<h5><?= $_SESSION['user']['Nom_utilisateur'] . ' ' . $_SESSION['user']['Prenom_utilisateur'] ?></h5>
	<br>

	<a href="profile/editProfile">Edit profile</a>
	<br>

	<a href="profile/reservation">Your reservation</a>
	<br>

	<a href="logout">Disconnection</a>
<?php else: ?>
	<?php header('location: /marieteam_php'); ?>
<?php endif; ?>