<table class="table">
    <thead>
    <tr>
        <th>id_conducteur</th>
        <th>prenom</th>
        <th>nom</th>
        <th class="text-center">modification</th>
        <th class="text-center">suppression</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($conducteur as $c): ?>
        <tr>
            <td><?= $c->id_conducteur; ?></td>
            <td><?= $c->prenom; ?></td>
            <td><?= $c->nom; ?></td>
            <td class="text-center"><a href="?p=conducteur&action=modif&id=<?= $c->id_conducteur; ?>"><i class="fas fa-pencil-alt"></i></a></td>
            <td class="text-center"><a href="?p=conducteur&action=supprime&id=<?= $c->id_conducteur; ?>"><i class="fas fa-times"></i></a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<form method="post">
    <?php if (isset($_GET['action']) && $_GET['action'] === 'modif'): ?>
        <label  for="prenom">Prenom</label>
        <input type="text" name="prenom" class="form-control mb-3" placeholder="Prenom" value="<?= $conducteur[0]->prenom; ?>" required>
        <label for="nom">Nom</label>
        <input type="text" name="nom" class="form-control mb-3" placeholder="Nom" value="<?= $conducteur[0]->nom; ?>" required>
        <input type="hidden" name="id" value="<?= $conducteur[0]->id_conducteur; ?>">
        <input type="submit" class="btn btn-dark" value="Mettre à jour">
    <?php else: ?>
        <label  for="prenom">Prenom</label>
        <input type="text" name="prenom" class="form-control mb-3" placeholder="Prenom" required>
        <label for="nom">Nom</label>
        <input type="text" name="nom" class="form-control mb-3" placeholder="Nom" required>
        <input type="submit" class="btn btn-dark" value="Ajouter">
    <?php endif; ?>
</form>