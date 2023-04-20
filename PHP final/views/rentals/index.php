<div class="container">
    <h1>List Rentals</h1>

    <a href="<?= ROOT_PATH ?>/rentals/new" class="btn btn-primary my-3">New rental...</a>

    <?php if (isset($rentals) && count($rentals) > 0): ?>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>City</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($rentals as $rental): ?>
                <tr>
                    <td><?= $rental->name ?></td>
                    <td><?= $rental->city ?></td>
                    <td>
                        <a class="btn btn-warning" href="<?= ROOT_PATH ?>/rentals/edit/<?= $rental->id ?>">edit</a>
                        <a class="btn btn-danger" href="<?= ROOT_PATH ?>/rentals/delete/<?= $rental->id ?>" onclick="return confirm('Are you sure you want to delete this rental?')">delete</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <?php endif ?>
</div>