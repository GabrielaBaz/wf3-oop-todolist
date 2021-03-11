<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-dark bg-dark my-3">
            <h1 class="navbar-brand px-4">My ToDo List</h1>
            <ul class="nav">
                <li class="nav-item"><a class="nav-link" href="index.php?action=home">Home</a></li>
            </ul>
        </nav>
    </div>
    <?= $content ?>
</body>

</html>