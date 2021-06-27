<?php
$files = glob(__DIR__ . "/lang/*.json");
function code($value, $code = '')
{
    if ($code) {
        return explode('.', array_reverse(explode('/', $value))[0])[0] === $code;
    } else {
        return explode('.', array_reverse(explode('/', $value))[0])[0];
    }
}
function value($country, $key){
    return  code($country, $key)?$key:$country;
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Translate Json</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php if ($files) : ?>
        <div class="container">
            <div class="row">
                <div class="col-12 p-5">
                    <?php foreach ($files as $li => $value) : ?>
                        <?php if (code($value, 'en')) : ?>
                            <?php foreach (json_decode(file_get_contents($value), true) as $key => $lang) : ?>
                                <div class="form-control mb-2">
                                    <label class="p-2"><?= $key ?></label>
                                    <?php foreach ($files as  $country) : ?>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text" style="width:50px">
                                                <?= code($country) ?>
                                            </span>
                                            <input type="text" value="<?= $lang ?>" class="form-control">
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            <?php endforeach ?>
                        <?php endif; ?>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>