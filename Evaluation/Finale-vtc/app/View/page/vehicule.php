<table class="table">
    <thead>
    <tr>
        <th>id_vehicule</th>
        <th>Marque</th>
        <th>Modèle</th>
        <th>Couleur</th>
        <th>Immatriculation</th>
        <th class="text-center">modification</th>
        <th class="text-center">suppression</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($vehicule as $v): ?>
        <tr>
            <td><?= $v->id_vehicule; ?></td>
            <td><?= $v->marque; ?></td>
            <td><?= $v->modele; ?></td>
            <td><?= $v->couleur; ?></td>
            <td><?= $v->immatriculation; ?></td>
            <td class="text-center"><a href="?p=vehicule&action=modif&id=<?= $v->id_vehicule; ?>"><i class="fas fa-pencil-alt"></i></a></td>
            <td class="text-center"><a href="?p=vehicule&action=supprime&id=<?= $v->id_vehicule; ?>"><i class="fas fa-times"></i></a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<form method="post">

    <?php if (isset($_GET['action']) && $_GET['action'] === 'modif'): ?>
        <label  for="marque">Marque</label>
        <input type="text" name="marque" class="form-control mb-3" placeholder="Marque" value="<?= $vehicule[0]->marque; ?>" required>
        <label for="modele">Modèle</label>
        <input type="text" name="modele" class="form-control mb-3" placeholder="Modele" value="<?= $vehicule[0]->modele; ?>" required>
        <label for="couleur">Couleur</label>
        <input type="text" name="couleur" class="form-control mb-3" placeholder="Couleur" value="<?= $vehicule[0]->couleur; ?>" required>
        <label for="immatriculation">Immatriculation</label>
        <input type="text" name="immatriculation" class="form-control mb-3" placeholder="Immatriculation" value="<?= $vehicule[0]->immatriculation; ?>" required>
        <input type="hidden" name="id" value="<?= $vehicule[0]->id_vehicule; ?>">
        <input type="submit" class="btn btn-dark" value="Mettre à jour">
    <?php else: ?>
        <label  for="marque">Marque</label>
        <input type="text" name="marque" class="form-control mb-3" placeholder="Marque" required>
        <label for="modele">Modèle</label>
        <input type="text" name="modele" class="form-control mb-3" placeholder="Modele" required>
        <label for="couleur">Couleur</label>
        <input type="text" name="couleur" class="form-control mb-3" placeholder="Couleur" required>
        <label for="immatriculation">Immatriculation</label>
        <input type="text" name="immatriculation" class="form-control mb-3" placeholder="Immatriculation" required>
        <input type="submit" class="btn btn-dark" value="Ajouter">
    <?php endif; ?>
</form>