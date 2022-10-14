<?php include "header.php"; 
include "config.php"; 
$sorgu = $baglanti->query("SELECT * FROM Admins");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Users</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">


                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item">Users</li>
                    </ol>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <?php if ($_SESSION['rolename'] == "Admin" ){  // this checks the authorization?>
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title"></h3>

                                <a href="user_add.php"><button class="btn btn-primary" aria-hidden="true"><i
                                            class="fas fa-plus"></i>&nbsp; Add User</button>
                                </a>
                            </div>
                        </div>
                        <?php } ?>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Role</th>
                                        <th>Title</th>

                                        <?php if ($_SESSION['rolename'] == "Admin" ){  // this checks the authorization?>
                                        <th>System Registration Date</th>
                                        <th>Detail</th>
                                        <th>Review</th>
                                        <?php } ?>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                         while ($cikti = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                            
                            $id = $cikti['id'];
                           
                            $date=date_create($cikti["created_date"]);
                            $newDate = date_format($date,"d.m.Y H:i");
                            
                            // $modal_helper = $cikti['modal_helper'];
                    ?>
                                    <tr>
                                        <td><?=$cikti["id"]?></td>
                                        <td><?=$cikti["username"]?></td>
                                        <td><?=$cikti["email"] ?></td>
                                        <td><?=$cikti["phone"] ?></td>
                                        <td><?=$cikti["rolename"] ?></td>
                                        <td><?=$cikti["detailed_rolename"] ?></td>


                                        <?php if ($_SESSION['rolename'] == "Admin" ){  // this checks the authorization?>
                                        <td><?=$newDate?></td>
                                        <td>
                                            <div class="row">
                                                <button type="button" class="btn btn-success btn-sm editbtn"
                                                    onclick="getId(<?=$cikti['id']?>)">Edit</button>

                                                <button id="delete-item<?= $cikti["id"]?>" data-id='<?=$cikti["id"]?>'
                                                    type="button"
                                                    class="btn btn-danger delete-item btn-sm ml-1">Delete</button>
                                            </div>

                                        </td>
                                        <td>
                                            <a id="kisi<?=$cikti['id']?>"
                                                href="admin_profile.php?id=<?=$cikti["id"] ?>"><span
                                                    class="badge rounded-pill bg-info">Review</span></a>
                                        </td>
                                        <?php } ?>


                                    </tr>

                                    <?php
         } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Role</th>
                                        <th>Title</th>

                                        <?php if ($_SESSION['rolename'] == "Admin" ){  // this checks the authorization?>
                                        <th>System Registration Date</th>
                                        <th>Detail</th>
                                        <th>Review</th>
                                        <?php } ?>

                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>


    <!-- EDIT POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Edit User </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="update_user.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="update_id" id="update_id">

                        <div class="form-group">
                            <label> User Name </label>
                            <input type="text" name="usernameModal" id="usernameModal" class="form-control">
                        </div>

                        <div class="form-group">
                            <label> Email </label>
                            <input type="text" name="emailModal" id="emailModal" class="form-control">
                        </div>

                        <div class="form-group">
                            <label> Phone </label>
                            <input type="text" name="phoneModal" id="phoneModal" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="my-1 mr-2">Role</label>
                            <select class="custom-select my-1 mr-sm-2" id="roleModal" name="roleModal" id="">
                                <!-- <option selected>Seçiniz...</option> -->
                                <option value="Admin">Admin</option>
                                <!-- <option value="İnsan Kaynakları">İnsan Kaynakları</option> -->
                                <option value="Employee">Employee</option>
                                <!-- <option value="Stajyer">Stajyer</option> -->

                            </select>
                        </div>
                        <div class="form-group">
                            <label> Title </label>
                            <input type="text" name="detailed_rolenameModal" id="detailed_rolenameModal"
                                class="form-control">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="update" class="btn btn-success">Edit
                            <i class="fa fa-check"></i>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>



    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- bootbox -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js'></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- Page specific script -->
<script>
$(document).ready(function() {

    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "paging": true,
            columnDefs: [

                {
                    orderable: false,
                    targets: 7,

                },
                {
                    orderable: false,
                    targets: 8,

                },
            ],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    });


    // edit
    $('.editbtn').on('click', function() {

        $('#editmodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        $('#update_id').val(data[0]);
        $('#usernameModal').val(data[1]);
        $('#emailModal').val(data[2]);
        $('#phoneModal').val(data[3]);
        $("#roleModal").val(data[4]);
        $('#detailed_rolenameModal').val(data[5]);
    });


    // Delete 
    $('.delete-item').click(function() {
        var el = this;
        var deleteid = $(this).data('id');

        // console.log(deleteid);
        // alert(deleteid);

        bootbox.confirm({

            message: "Seçili kaydı silmek istiyor musunuz?",
            buttons: {
                confirm: {
                    label: 'Sil',
                    className: 'btn-danger'
                },
                cancel: {
                    label: 'İptal',
                    className: 'btn-secondary'
                }
            },



            callback: function(result) {

                if (result) {
                    // AJAX Request
                    $.ajax({
                        url: 'delete_user.php',
                        type: 'POST',
                        data: {
                            id: deleteid
                        },
                        success: function(response) {

                            // Removing row from HTML Table
                            if (response == 1) {
                                $(el).closest('tr').css('background', 'tomato');
                                $(el).closest('tr').fadeOut(800, function() {
                                    $(this).remove();
                                });
                            } else {
                                bootbox.alert('Record not deleted.');
                            }

                        }
                    });
                }

            }
        });

    });
});
</script>



<?php include "footer.php";  ?>