<?php include "header.php"; 
include "config.php"; 


$id = $_GET['id'];

$adminId= $_SESSION['adminId'];
// echo("admin in id degeri $adminId");
// exit($adminId);

$sorgu = $baglanti->query("SELECT * FROM Applicants where id =$id");
$cikti = $sorgu->fetch(PDO::FETCH_ASSOC);

// $applicantId= $cikti["id"]
$sorgu2= $baglanti->query("SELECT * FROM applicant_admin where admin_id=$adminId AND applicant_id=$id");


?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-3">


                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="dist/img/avatar.png"
                                    alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center"><?=$cikti["fullname"]?></h3>

                            <p class="text-muted text-center"><?=$cikti["email"] ?></p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Tel</b> <a class="float-right"><?=$cikti["phone"] ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>CV</b> <a href="#" class="float-right">click</a>
                                </li>

                                <li class="list-group-item">
                                    <b>Linkedin</b> <a href="#" class="float-right">click</a>
                                </li>

                            </ul>

                            <a href="applicants.php" class="btn btn-primary btn-block"><b>Back</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <div class="row"></div>

                    <?php
                         $cikti2 = $sorgu2->fetch(PDO::FETCH_ASSOC);

                        if(!$cikti2) {  ?>


                    <div class="container" style="margin-bottom: 15%; margin-top:10%">
                        <form action="applicants-detail-register.php?id=<?=$id?>" method="post"
                            enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Add Comment</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="comment"
                                    rows="3"></textarea>
                            </div>
                            <div class="d-flex justify-content-between">
                                <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch
                                    data-off-color="danger" data-on-color="success" data-on-text="Approve"
                                    data-off-text="Reject">

                                <button type="submit" name="submit"
                                    class="btn btn-warning btn-sm"><b>Save</b></button>

                            </div>

                        </form>
                    </div>


                    <?php } else{
                         $oy = $cikti2["vote"] ? "checked": "";
                         $date=date_create($cikti2["created_date"]);
                         $newDate = date_format($date,"d.m.Y H:i");
                        ?>

                    <div class="container" style="margin-bottom: 15%; margin-top:10%">
                        <form action="applicants-detail-update.php?id=<?=$id?>" method="post"
                            enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Comment</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="comment"
                                    placeholder="<?=$cikti2["comment"]?>" rows="3"></textarea>
                            </div>
                            <div class="d-flex justify-content-between">
                                <input type="checkbox" name="my-checkbox" <?=$oy?> data-bootstrap-switch
                                    data-off-color="danger" data-on-color="success" data-on-text="Approve"
                                    data-off-text="Reject">

                                <button type="submit" name="submit"
                                    class="btn btn-warning btn-sm"><b>Update</b></button>

                            </div>
                            <dt>Last Updated Date</dt>
                            <dd><?=$newDate?></dd>

                        </form>
                    </div>

                    <?php } ?>


                    <!-- /.card -->


                </div>

                <div class="col-md-1"></div>

                <div class="col-md-6">
                    <?=$cikti["modal_helper"] ?>
                </div>

                <div class="col-md-1"></div>
            </div><!-- /.container-fluid -->


    </section>
    <!-- /.content -->
</div>



<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- Bootstrap Switch -->
<script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">

<script>
$(function() {

    $("input[data-bootstrap-switch]").each(function() {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));

    })


})
</script>