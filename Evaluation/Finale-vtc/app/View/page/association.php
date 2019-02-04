<table class="table">
    <thead>
    <tr>
        <th>id_association</th>
        <th>id_conducteur</th>
        <th>id_vehicule</th>
        <th class="text-center">modification</th>
        <th class="text-center">suppression</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($association as $a): ?>
        <tr>
            <td><?= $a->id_association; ?></td>
            <td><?= $a->id_conducteur; ?></td>
            <td><?= $a->id_vehicule; ?></td>
            <td class="text-center"><a href="?p=association&action=modif&id=<?= $a->id_association; ?>"><i class="fas fa-pencil-alt"></i></a></td>
            <td class="text-center"><a href="?p=association&action=supprime&id=<?= $a->id_association; ?>"><i class="fas fa-times"></i></a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<form method="post">

    <select name="conducteur" class="form-control mb-3">
        <option value="">--Choisissez un conducteur--</option>
        <?php foreach ($conducteur as $c): ?>
            <option value="<?= $c->id_conducteur; ?>"><?= $c->nom . ' ' . $c->prenom; ?></option>
        <?php endforeach; ?>
    </select>

    <select name="vehicule" class="form-control mb-3">
        <option value="">--Choisissez un véhicule--</option>
        <?php foreach ($vehicule as $v): ?>
            <option value="<?= $v->id_vehicule; ?>"><?= $v->immatriculation . ' - ' . $v->marque . ' - ' . $v->modele; ?></option>
        <?php endforeach; ?>
    </select>
    <?php if (isset($_GET['action']) && $_GET['action'] === 'modif'): ?>
        <input type="hidden" name="id" value="<?= $association[0]->id_association; ?>">
        <input type="submit" class="btn btn-dark" value="Mettre à jour">
    <?php else: ?>
        <input type="submit" class="btn btn-dark" value="Ajouter">
    <?php endif; ?>


</form>