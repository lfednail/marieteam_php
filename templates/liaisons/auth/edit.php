<?php if(isset($_SESSION['user'])): ?>
    <?php if($_SESSION['user']['Role'] == "Admin" | "admin" ): ?>
        <?php $valueLiaison = $db->selectOne("Select * from liaisons where idLiaison = '{$data['id']}'"); ?>
        <div class="container mx-auto max-w-lg p-8 bg-white shadow-lg rounded">
            <h2 class="text-3xl font-bold text-center mb-6">Edit</h2>

            <form action="/mariteam_php/pubic/liaisons/try_edit" method="post">

                <div class="mb-4">
                    <label for="arrivee"
                    <input type="text" name="Lieu_depart" id="depat" value="<?= $valueLiaison['Lieu_depart'] ?>" required>
                </div>

                <div class="mb-4">
                    <label for="depat"
                    <input type="text" name="Lieu_arrivee" id="arrivee" value="<?= $valueLiaison['Lieu_arrivee'] ?>" required>
                </div>
                <div class="mb-4">
                    <label for="distance"
                    <input type="number" name="Distance_liaison" id="distance" value="<?= $valueLiaison['Distance_liaison'] ?>" required>
                </div>
                <button type="submit">Edit</button>
            </form>
        </div>
    <?php endif; ?>
    <?php header('location: /marieteam_php/public/liaisons'); ?>
<?php endif; ?>
<?php header('location: /marieteam_php/public/liaisons'); ?>
