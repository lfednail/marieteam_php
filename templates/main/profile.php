<?php if(isset($_SESSION['user'])): ?>
    <h5><?= $_SESSION['user']['Nom_utilisateur'] . ' ' . $_SESSION['user']['Prenom_utilisateur'] ?></h5>
    <br>

    <a href="profile/editProfile">Edit profile</a>
    <br>

    <a href="profile/reservation">Your reservation</a>
    <br>

    <a href="logout">Disconnection</a>
<?php else: ?>
    <?php header('location: /marieteam'); ?>
<?php endif; ?>