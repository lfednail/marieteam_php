<?php if(isset($_SESSION['user'])): ?>
    <?php
    echo '<pre>';
    var_dump($_SESSION['user']);
    echo '</pre>';
    ?>
    <h5><?= $_SESSION['user']['Nom_utilisateur'] . ' ' . $_SESSION['user']['Prenom_utilisateur'] ?></h5>
    <a href="profile/reservation">Your reservation</a>

    <a href="logout">Disconnection</a>
<?php else: ?>
    <?php header('location: /marieteam/public'); ?>
<?php endif; ?>