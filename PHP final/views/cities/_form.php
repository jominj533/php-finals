<?php
    // Convert city object into form_fields associative array ONLY if form_fields are not set
    $form_fields = $form_fields ?? [];
    if (count($form_fields) === 0 && isset($city)) $form_fields = (array) $city;
?>

<form action="<?= ROOT_PATH ?>/cities/<?= $action ?>" method="post">
    <?php if ($action === "update"): ?>
        <input type="hidden" name="id" value="<?= $form_fields["id"] ?>">
    <?php endif ?>

    <div class="form-group my-3">
        <label for="name">Name</label>
        <input class="form-control" type="text" name="name" value="<?= $form_fields["name"] ?? "" ?>">
    </div>

    <div class="form-group my-3">
        <label for="country">Country</label>
        <input class="form-control" type="text" name="country" value="<?= $form_fields["country"] ?? "" ?>">
    </div>

    <div class="form-group my-3">
        <label for="province">Province</label>
        <input class="form-control" type="text" name="province" value="<?= $form_fields["province"] ?? "" ?>">
    </div>

    <div class="form-group my-3">
        <label for="population">Population</label>
        <input class="form-control" type="number" min="1" step="1" name="population" value="<?= $form_fields["population"] ?? "" ?>">
    </div>

    <div>
        <button class="btn btn-primary">Submit</button>
    </div>
</form>