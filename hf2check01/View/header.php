<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?= $params['cim'] . ( (isset($params['mottó'])) ? ('|' . $params['mottó']) : '' ) ?></title>
	<link rel="stylesheet" href="./styles/stilus.css" type="text/css">
	<link rel="stylesheet" href="./styles/tablazat.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="/scripts/main.js"></script>
    <script src="/scripts/termek.js"></script>
</head>
<body>
	<header>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img src="./images/<?=$params['kepforras']?>" alt="<?=$params['kepalt']?>" class="img-fluid">
                </div>
                <div class="col-md-9">
                    <h1><?= $params['cim'] ?></h1>
                    <?php if (isset($params['motto'])) { ?><h2><?= $params['motto'] ?></h2><?php } ?>
                    <?php if(isset($_SESSION['login'])) { ?>Bejelentkezve: <strong><?= $_SESSION['csn']." ".$_SESSION['un']." (".$_SESSION['login'].") Szerepkör: ".$_SESSION['szerepkor']."" ?></strong><?php } ?>
                </div>
            </div>
        </div>
	</header>
    <div id="wrapper">