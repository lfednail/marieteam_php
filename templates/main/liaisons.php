<?php

use App\Database\BDD;

$bdd = new BDD();

$listLiaisons = $bdd->select("Select * from liaison");

foreach ($listLiaisons as $liaison):
?>

    <div>
        <h5><?= $liaison ?></h5>
    </div>

<?php endforeach; ?>