<?php if(isset($_SESSION['user'])): ?>
    <?php if($_SESSION['user']['Role'] == "Admin" | "admin" ): ?>
        <div class="container mx-auto max-w-lg p-8 bg-white shadow-lg rounded">
            <h2 class="text-3xl font-bold text-center mb-6">Create</h2>

            <form action="liaisons" method="post">
                <div class="mb-4">
                    <label for="depart">Depart site</label>
                    <input type="text" name="Lieu_depart" id="depart" required>
                </div>

                <div class="mb-4">
                    <label for="arrivee">Finish site</label>
                    <input type="text" name="Lieu_depart" id="arrivee" required>
                </div>

                <div class="mb-4">
                    <label for="distance">Distance</label>
                    <input type="number" name="Distance_liaison" id="distance" required>
                </div>
                <button type="submit">Create</button>
            </form>
        </div>
    <?php endif; ?>
    <?php header('location: /marieteam_php/liaisons'); ?>
<?php endif; ?>
<?php header('location: /marieteam_php/liaisons'); ?>
