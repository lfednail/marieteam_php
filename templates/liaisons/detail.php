<?php

$listLiaisonTarif = $db->select("Select * from tarifliaison as tl where tl.id_Liaison = ${data['id']} order by Lettre_identification ");

$listTraverseeLiaison = $db->select("Select * from traversee where id_Liaison = ${data['id']}");


//donnees pour l affichage du tableau des tarif
$Lettre_identification = [];
$Libelle_typeTarif = [];
$periode = [];
$tarif = [];

foreach ($listLiaisonTarif as $LiaisonTarif){
    $Lettre_identification [ $LiaisonTarif['Lettre_identification'] ] = $db->selectOne("Select Lettre_identification from categorietarif as ct where ct.Lettre_identification = '${LiaisonTarif['Lettre_identification']}' ");
    $Libelle_typeTarif [ $LiaisonTarif['Lettre_identification'] ][ $LiaisonTarif['id_TypeTarif'] ] = $db->selectOne("Select Libelle_typeTarif from typetarif as tt where tt.id_Typetarif = ${LiaisonTarif['id_TypeTarif']} and tt.Lettre_identification = '${LiaisonTarif['Lettre_identification']} '");
    $periode [$LiaisonTarif['id_Periode']] =  $db->selectOne("Select Debut_periode, Fin_periode from periode as p where p.id_Periode = ${LiaisonTarif['id_Periode']} order by Debut_periode");
    $tarif [ $LiaisonTarif['Lettre_identification'] ] [ $LiaisonTarif['id_TypeTarif'] ] [ $LiaisonTarif['id_Periode'] ] =  $LiaisonTarif['Tarif'];
}

//donnees pour la liste des traversee
$bateauFret = [];
$bateauVoyageur = [];

foreach ($listTraverseeLiaison as $traversee){
    $bateauFret [] = $db->selectOne("Select b.id_Bateau, b.Longueur_bateau, b.Largeur_bateau, bf.Poid_max from bateau as b, bateaufret as bf, fret as f where b.id_Bateau = ${traversee['id_Bateau']} and b.id_Bateau = f.id_Bateau and bf.id_Bateaufret = f.id_Bateaufret ");
    $bateauVoyageur [] = $db->selectOne("Select b.id_Bateau, b.Longueur_bateau, b.Largeur_bateau, bv.Vitesse, bv.Places from bateau as b, bateauvoyageur as bv, voyageur as v where b.id_Bateau = ${traversee['id_Bateau']} and b.id_Bateau = v.id_Bateau and bv.id_BateauVoyageur = v.id_BateauVoyageur ");

}

?>


<!-- Table tarif -->
<label for="Tarif">Tarif</label>
<table id="Tarif">
    <tr>
        <th>Categorie</th>
        <th>type</th>
        <th></th>
        <th>Periode</th>
        <th></th>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <?php foreach($periode as $p): ?>
            <td><?= $p['Debut_periode'] . '<br>to<br>' . $p['Fin_periode'] ?? 'undefined' ?></td>
        <?php endforeach;?>
    </tr>
    <?php foreach($listLiaisonTarif as $lt):

        ?>
        <tr>
            <td><?= $Lettre_identification[ $lt['Lettre_identification'] ] ['Lettre_identification'] ?></td>
            <td><?= $Libelle_typeTarif [ $lt['Lettre_identification'] ] [ $lt['id_TypeTarif'] ] ['Libelle_typeTarif'] ?></td>
            <?php foreach($periode as $key =>$p): ?>
                <td><?= $tarif [ $lt['Lettre_identification'] ] [ $lt['id_TypeTarif'] ] [ $key ]  ?? 'undefined' ; ?> €</td>
            <?php endforeach;?>
        </tr>
    <?php endforeach; ?>
</table>

<!-- table traversee bateau fret -->
<?php if($bateauFret[0]): ?>
<label for="Fret">Fret</label>
<table id="Fret">
    <tr>
        <th>Length</th>
        <th>Width</th>
        <th>Weight limit</th>
    </tr>
    <?php foreach ($bateauFret as $fret): ?>
    <tr>
        <td><?= $fret['Longueur_bateau'] ?></td>
        <td><?= $fret['Largeur_bateau'] ?></td>
        <td><?= $fret['Poid_max'] ?> Kg</td>
    </tr>
    <?php endforeach; ?>
</table>
<?php endif; ?>

<!-- table traversee bateau voyageur -->
<?php if($bateauVoyageur[0]): ?>
<label for="cruise ">Cruise </label>
<table id="cruise ">
    <tr>
        <th>Length</th>
        <th>Width</th>
        <th>Speed</th>
        <th>Place</th>
    </tr>
    <?php foreach ($bateauVoyageur as  $voyageur): ?>
    <tr>
        <td><?= $voyageur['Longueur_bateau'] ?></td>
        <td><?= $voyageur['Largeur_bateau'] ?></td>
        <td><?= $voyageur['Vitesse'] ?> Knots</td>
        <td><?= $voyageur['Places'] ?> Kg</td>
    </tr>
    <?php endforeach; ?>
</table>
<?php endif; ?>