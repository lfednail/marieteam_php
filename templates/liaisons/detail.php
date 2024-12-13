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
$bateauFret =[];

foreach ($listTraverseeLiaison as $traversee){
    $bateauFret [ $traversee['id_Bateau'] ] = $db->selectOne("Select b.id_Bateau, b.Longueur_bateau, b.Largeur_bateau, bf.Poid_max from bateau as b, bateaufret as bf, fret as f where b.id_Bateau = ${traversee['id_Bateau']} and b.id_Bateau = f.id_Bateau and bf.id_Bateaufret = f.id_Bateaufret ");
}

?>


<table>
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
            <td><?= $p['Debut_periode'] . '<br>au<br>' . $p['Fin_periode'] ?? 'undefined' ?></td>
        <?php endforeach;?>
    </tr>
    <?php foreach($listLiaisonTarif as $lt):

        ?>
        <tr>
            <td><?= $Lettre_identification[ $lt['Lettre_identification'] ] ['Lettre_identification'] ?></td>
            <td><?= $Libelle_typeTarif [ $lt['Lettre_identification'] ] [ $lt['id_TypeTarif'] ] ['Libelle_typeTarif'] ?></td>
            <?php foreach($periode as $key =>$p): ?>
                <td><?= $tarif [ $lt['Lettre_identification'] ] [ $lt['id_TypeTarif'] ] [ $key ]  ?? 'undefined' ; ?></td>
            <?php endforeach;?>
        </tr>
    <?php endforeach; ?>
</table>

<table>
    <tr>
        <th></th>
    </tr>
</table>