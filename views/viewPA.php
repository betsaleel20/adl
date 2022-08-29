<?php
    $cssForm='././publics/CSS/forms.css';
    $cssList='././publics/CSS/displayList.css';
    $title="Compte-rendu pole";
    ob_start();
?>

<div class="formulaire">
    <form action="index.php? action=makePA" method="POST">
        <h3>Compte-rendu d'un pôle (C.R.P)</h3>
        <table>
            <tr>
                <td><label for="">Periode</label></td>
                <td><label for="">Date</label></td>
                <td><label for="">Effectif</label></td>
                <td><label for="pole">Pôle</label></td>
                <td><label for="">Pr Daddy</label></td>
                <td><label for="">Missionnares</label></td>
            </tr>
            <tr>
                <td><input type="week" name="periode" placeholder="Ex: 2022-W23" required></td>
                <td><input type="date" name="pa_date" required></td>
                <td><input type="number" name="effectif" placeholder="effectif" required></td>
                <td><select name="pole" id="pole" required>
                    <option value="">choisir</option>
                <?php
                    $allPoles=$listePole;
                    if($allPoles!=false){
                        // faire monter cette condition afin de n'afficher le form que lorsqu'il ya au moins un pole disponible
                        $j=count($allPoles[0]);
                        for($i=0; $i<$j; $i++){ ?>
                        
                            <option value="<?=$allPoles[1][$i]?>"><?php echo($allPoles[0][$i]->getPolename())?></option>
                    <?php }
                    }
                    
                ?>
                    
                </select></td>
                <td><input type="time" name="daddy"required ></td>
                <td><input type="time" name="missionnaries"required ></td>
                <td class="bouton"><input type="submit" value="Enregistrer"></td>
            </tr>
        </table>
    </form>
</div>

<hr class="separateur">

<div class="affichages">
    <?php
        if($listePole!=false){?>
            <h3>Liste des Comptes-rendus des pôles(C.R.P) déjà enregistré</h3>
            <table>
                <thead>
                    <tr>
                        <th>Periodes</th>
                        <th>Dates</th>
                        <th>Pôles</th>
                        <th>Effectifs</th>
                        <th>Pr.Daddy</th>
                        <th>Vol. Daddy</th>
                        <th>Missionnaires</th>
                        <th>Vol. Miss</th>
                        <th>Jeûne</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Periodes</th>
                        <th>Dates</th>
                        <th>Pôles</th>
                        <th>Effectifs</th>
                        <th>Pr.Daddy</th>
                        <th>Vol. Daddy</th>
                        <th>Missionnaires</th>
                        <th>Vol. Miss</th>
                        <th>Jeûne</th>
                    </tr>
                </tfoot>
                <?php
                    $j=count($listAccountPole[0]);
                    for($i=0; $i<$j; $i++){ $iden=$listAccountPole[0][$i]->getId_pole(); ?>
                        <tbody>
                            <tr>
                                <td><?=$listAccountPole[0][$i]->getPeriode() ?></td>
                                <td><?= $listAccountPole[0][$i]->getPa_date() ?></td>
                                <td><?=getOnePole($iden)->getPolename() ?></td>
                                <td><?= $listAccountPole[0][$i]->getEffectif() ?></td>
                                <td><?= $listAccountPole[0][$i]->getDaddy() ?></td>
                                <td class="volume">à calculer...</td>
                                <td><?= $listAccountPole[0][$i]->getMissionnaries() ?></td>
                                <td class="volume">à calculer...</td>
                                <td>
                                    <a href="index.php? action=formFasting&amp;idPole=<?=$iden?>&amp;idPA=<?=$listAccountPole[1][$i]?>" title="Enregistrer le Jeûne">
                                        <img src="././publics/images/plus.jpg" alt="ajouter">
                                    </a>
                                </td>

                            </tr>
                        </tbody>
                    <?php }
                ?>
            </table>
    <?php }else{
        echo("Aucun compte rendu de pole(C.R.P) enregistré pour le moment");
    }
    ?>
</div>

<?php
    $pageContent=ob_get_clean();
    include('pageTemplate.php');
?>