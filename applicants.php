<?php include "header.php"; 
include "config.php"; 
$sorgu = $baglanti->query("SELECT * FROM Applicants");

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Job Applicants</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Job Applicants</li>
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
                        <div class="card-header">
                            <h3 class="card-title">Applicants</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>FullName</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Linkedin</th>
                                        <th>Knowledge Level</th>
                                        <th>Cv</th>
                                        <th>Vote</th>
                                        <th>Application Date</th>
                                        <th>Review</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                         while ($cikti = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                            
                            $id = $cikti['id'];
                            $modal_helper = json_encode($cikti['modal_helper']);
                            $date=date_create($cikti["basvuru_tarihi"]);
                            $newDate = date_format($date,"d.m.Y H:i");
                           
                            // its for positive poll
                            $sorgu2 = $baglanti->query("SELECT count(*) FROM applicant_admin where applicant_id=$id and vote='on'");
                            $cikti2 = $sorgu2->fetchColumn();
                            // this is for negative polling
            
                           $sorgu3 = $baglanti->query("SELECT count(*) FROM applicant_admin where applicant_id=$id and  vote!='on'");
                           $cikti3 = $sorgu3->fetchColumn();


                    ?>
                                    <tr>
                                         <td><?=$cikti["id"]?></td>
                                        <td><?=$cikti["fullname"]?></td>
                                        <td><?=$cikti["phone"] ?></td>
                                        <td><?=$cikti["email"] ?></td>
                                        <td><a href='<?=$cikti["linkedin"] ?>' target="_blank">Click</a></td>
                                        <td><button id="<?php echo "descriptionModal_".$id;  ?>" data-toggle="modal"
                                                data-target="#exampleModalLong"
                                                onClick='showModal(<?php echo $id .","  .$modal_helper  ?>)'
                                                class="btn btn-outline-success btn-sm">
                                                View</button></td>


                                        <td><button type="button" class="btn btn-outline-info btn-sm"><a
                                                    href="/uploads/<?=$cikti["file_name"] ?>" target="_blank">Show Cv</a></button></td>
                                        <td><button class="btn btn-success"><?=$cikti2?></button>
                                            <button class="btn btn-danger"><?=$cikti3?></button>
                                        </td>
                                        <td><?=$newDate?></td>
                                        <td class="sorting_1 dtr-control"><a
                                                href='applicants-detail.php?id=<?=$cikti["id"]?>'><button type="button"
                                                    class="btn btn-outline-secondary btn-sm">Review</button></a></td>




                                    </tr>

                                    <?php
         } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>FullName</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Linkedin</th>
                                        <th>Knowledge Level</th>
                                        <th>Cv</th>
                                        <th>Vote</th>
                                        <th>Application Date</th>
                                        <th>Review</th>
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


    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Knowledge Level</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div id="descriptionModal" class=""> </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
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
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- Page specific script -->
<script>
$(function() {
    var myTable = $("#example1").DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
        buttons: true,
        // "language": {
        //     "url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Turkish.json"
        // },
        "initComplete": function() {
            setTimeout(function() {
                myTable.buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            }, 10);
        },

        columnDefs: [

            {
                orderable: false,
                targets: 4,

            },

            {
                orderable: false,
                //  width: '200px',
                targets: 5
            },
            {
                orderable: false,
                targets: 6
            },
            {
                orderable: false,
                targets: 7
            },
            {
                orderable: false,
                targets: 9
            },

        ],



    });

});
</script>

<script>
let result;

function showModal(id, modalHelper) {
    let data = decodeURI(modalHelper);
    result = modalHelper;
    document.getElementById('descriptionModal').innerHTML = result;



};

</script>

<?php include "footer.php";  ?>