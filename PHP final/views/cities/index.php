<div class="container">
    <h1>List Cities</h1>

    <a href="<?= ROOT_PATH ?>/cities/new" class="btn btn-primary my-3">New city...</a>

    <?php if (isset($cities) && count($cities) > 0): ?>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($cities as $city): ?>
                <tr>
                    <td><?= $city->name ?></td>
                    <td>
                        <a class="btn btn-warning" href="<?= ROOT_PATH ?>/cities/edit/<?= $city->id ?>">edit</a>
                        <a class="btn btn-danger" href="<?= ROOT_PATH ?>/cities/delete/<?= $city->id ?>" onclick="return confirm('Are you sure you want to delete this city?')">delete</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <?php endif ?>
</div>