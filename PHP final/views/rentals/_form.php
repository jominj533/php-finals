<?php
    // Convert rental object into form_fields associative array ONLY if form_fields are not set
    $form_fields = $form_fields ?? [];
    if (count($form_fields) === 0 && isset($rental)) $form_fields = (array) $rental;

    $cities = $cities ?? [];
?>

<form action="<?= ROOT_PATH ?>/rentals/<?= $action ?>" method="post">
    <?php if ($action === "update"): ?>
        <input type="hidden" name="id" value="<?= $form_fields["id"] ?>">
    <?php endif ?>

    <div class="form-group my-3">
        <label for="owner_name">Owner Name</label>
        <input class="form-control" type="text" name="owner_name" value="<?= $form_fields["owner_name"] ?? "" ?>">
    </div>

    <div class="form-group my-3">
        <label for="address">Address</label>
        <textarea class="form-control" type="text" name="address"><?= $form_fields["address"] ?? "" ?></textarea>
    </div>

    <div class="form-group my-3">
        <label for="contact_email">Contact Email</label>
        <input class="form-control" type="email" name="contact_email" value="<?= $form_fields["contact_email"] ?? "" ?>">
    </div>

    <div class="form-group my-3">
        <label for="contact_phone_number">Contact Phone Number</label>
        <input class="form-control" type="text" name="contact_phone_number" value="<?= $form_fields["contact_phone_number"] ?? "" ?>">
    </div>

    <div class="form-group my-3">
        <label for="city">City</label>
        <select name="city_id" class="form-select">
            <option selected>Select a city</option>
            <?php foreach ($cities as $city): ?>
                <option value="<?= $city->id ?>" <?= isset($form_fields["city_id"]) && $form_fields["city_id"] == $city->id ? "selected" : "" ?>><?= $city->name ?></option>
            <?php endforeach ?>
        </select>
    </div>

    <div>
        <button class="btn btn-primary">Submit</button>
    </div>
</form>