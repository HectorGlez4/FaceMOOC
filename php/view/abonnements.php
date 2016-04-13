<?php
include("head.php");
include("header.php");

global $content;


$formations = $content['page'];
$countFormations = $content['countFormations'];
$perpage = $content['perPage'];
$pages = ceil($countFormations[0] / $perpage);
?>

<body>
<div class="container">
    <div class="jumbotron">
        <h1>Abonnements</h1>
    </div>
    <form id="frmSearch">
        <div class="form-group">
            <label for="keywords">Recherchez une formation dont vous êtes abonné</label>
            <input type="text" id="inputSearch" class="form-control" placeholder="Mots clés..." name="keywords">
        </div>
    </form>
    <div id="divContent" class="page-header frm-content">
    </div>
    <script>var idEmail = "<?php echo $_SESSION['email']; ?>"</script>
    <script src="<?php echo WEBROOT ?>js/searchAbo.js"></script>
    <script>loadFormations(1)</script>

</body>
<?php include('footer.php') ?>