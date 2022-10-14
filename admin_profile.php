<?php 
    include "header.php";
    include "config.php";
    


if (isset($_GET['id'])) {

    $sorgu = $baglanti->query("SELECT * FROM Admins where id=".$_GET['id']);
    $cikti= $sorgu->fetch(PDO::FETCH_ASSOC);

   
    $remainLeaveQuery = $baglanti->query("SELECT sum(amount) as total FROM LeavesLog WHERE personal_id=".$_GET['id']);

    $remainLeaveQuery= $remainLeaveQuery->fetch(PDO::FETCH_ASSOC);

    $totalHour =  $remainLeaveQuery['total'] * 8; // first convert day to hour (each day equals 8 hours)

   
    $usedLeavesQuery = $baglanti->query("SELECT * FROM LeaveRequest where admin_id=".$_GET['id']);

    $usedLeave = 0;
    
    while($result =$usedLeavesQuery->fetch(PDO::FETCH_ASSOC)){
       if ($result['status_'] == "Completed"){
            $usedLeave += $result['hour'];
       }

    }

    $remainLeave = $totalHour - $usedLeave; // hour format

    ?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>




    <section class="content">
        <div class="container-fluid">

            <div class="row justify-content-center">

                <div class="col-md-3 ">
                    <!-- Widget: user widget style 1 -->
                    <div class="card card-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-warning">
                            <h3 id="profileName" class="widget-user-username"><?=$cikti["username"]?></h3>
                            <h5 class="widget-user-desc"><?=$cikti["rolename"]?></h5>
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle elevation-2" src="../dist/img/user1-128x128.jpg" alt="User Avatar">
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-5 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">Tel</h5>
                                        <span class="description-text"><?=$cikti["phone"] ?></span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-7 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">email</h5>
                                        <span><?=$cikti["email"] ?></span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>

                                <!-- /.col -->

                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                    <!-- /.widget-user -->
                </div>

                <div class="col-md-2"></div>

                <div id="LabBox" class="small-box bg-light col-md-4" style="padding: 3%;">
                    <div class="inner">
                        <h3>Add Leave</h3>
                    </div>
                    <div class="icon">
                        <i class="fas fa-plus"></i>
                    </div>


                    <div class="row justify-content-start">
                        <div class="col-md-8 ">
                            <label class="description-header">Leave Balance: </label>
                            <span
                                class="badge rounded-pill bg-info"><?=floor($remainLeave/8)." day " .$remainLeave% 8 ." hour"?></span>
                        </div>
                        <!-- /.description-block -->
                    </div>

                    <?php
                if(($_SESSION['rolename'] == "Admin"))
                {?>
                    <div class="form-group row">

                        <!-- <label class="description-header">Gün</label> -->
                        <div class="col-sm-6">
                            <input id="addInput" type="number" class="form-control form-control-sm" placeholder="gün">
                        </div>

                        <button type="button" class="btn btn-outline-primary btn-sm addbtn">Add</button>
                    </div>

                    <?php } ?>



                </div>

            </div>

        </div>
        <!-- /.row -->
        <div class="row justify-content-center">


            <!-- DONUT CHART -->
            <div class="card card-danger col-md-9">
                <div class="card-header">
                    <h3 class="card-title">Leave Balance Chart</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="donutChart"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>




        <div class="row justify-content-center">
            <!-- TO DO List  daily-->
            <div class="card col-md-9">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="ion ion-clipboard mr-1"></i>
                        Leaves Log
                    </h3>


                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <ul class="todo-list" data-widget="todo-list">


                        <?php 
                                $usedLeavesQuery2 = $baglanti->query("SELECT * FROM LeaveRequest where admin_id=".$_GET['id']);
                                //  $query = "SELECT * FROM LeaveRequest where admin_id=".$_GET['id'];
                                //  echo $query;

                         
                            include ('functions/getUserName.php'); // this function get approverId return back to approver name
                            include ('functions/getColor.php'); // this function return color according to status
                            while($result2 =$usedLeavesQuery2->fetch(PDO::FETCH_ASSOC)){
                                $date=date_create($result2["edited_date"]); // lets get the edited_date column from database
                                $newDate = date_format($date,"d.m.Y H:i"); // and format it ?>
                            
                        <li>

                            <!-- ATTENTION this input number and order is important because in js below  "$('.evaulateButton').on('click', function() {)"
                            I used these inputs to fetch data  -->

                            <input type="hidden"  value="<?=$result2['id']?>">
                            <input type="hidden"  value="<?=$result2['approver_description']?>">
                            <input type="hidden"  value="<?=getUserName($result2['approver_id'])?>">
                            <input type="hidden"  value="<?=$newDate?>"> 

                            <!-- let get the personal id for returning the personal profile page -->
                            <input type="hidden"  value="<?=$result2['admin_id']?>">  


                            <?php if ($result2['oneOrMulti']== "Daily"){ // daily
                                $start_date=date_create($result2["start_date"]); // lets get the start_date column from database
                                $formated_startDate = date_format($start_date,"d.m.Y H:i"); // and format it ?>
                                
                            <div>
                                <span class="text"><?= $formated_startDate ?></span>
                                <small class="badge badge-info"><i class="far fa-clock"></i> <?= $result2['hour'] ?>
                                    hour</small>
                                <small class="badge badge-primary" data-toggle="tooltip" data-placement="top" title="<?= $result2['explanation'] ?>"><?= $result2['reason'] ?></small>
                                <small id="leaveStatus<?=$result2['id']?>" class="badge badge-<?=getColor($result2['status_'])?>" data-placement="top" title="<?= $result2['approver_description'] ?>"><?= $result2['status_']?></small>

                                <?php if ($_SESSION['rolename'] == "Admin" ){  // this checks the authorization?>
                                <button class="btn btn-success btn-sm float-right evaulateButton" aria-hidden="true"><i
                                        class="fas fa-pencil"></i>&nbsp; Evaulate</button>
                                <?php }   ?>
                            </div>
                            <?php }else{ //more than one day 
                                $start_date=date_create($result2["start_date"]); // lets get the start_date column from database
                                $formated_startDate = date_format($start_date,"d.m.Y H:i"); // and format it 
                                
                                $end_date=date_create($result2["end_date"]); // lets get the end_date column from database
                                $formated_endDate = date_format($end_date,"d.m.Y"); // and format it?>

                                
                            <div>
                                <span class="text"><?= $formated_startDate ."- ".$formated_endDate?></span>
                                <small class="badge badge-info"><i class="far fa-clock"></i> <?= $result2['hour']/8 ?>
                                    day</small>
                                <!-- <small class="badge badge-info"><i class="far fa-clock"></i> <?=$remainLeave/8 ." gün " .$remainLeave% 8 ." saat"?></small> -->
                                <small class="badge badge-primary" data-toggle="tooltip" data-placement="top" title="<?= $result2['explanation'] ?>"><?= $result2['reason'] ?></small>
                                <small id="leaveStatus<?=$result2['id']?>" class="badge badge-<?=getColor($result2['status_'])?>" data-placement="top" title="<?= $result2['approver_description'] ?>" ><?= $result2['status_']?></small>

                                <?php if ($_SESSION['rolename'] == "Admin" ){  // this checks the authorization?>
                                <button class="btn btn-success btn-sm float-right evaulateButton" aria-hidden="true"><i
                                        class="fas fa-pencil"></i>&nbsp; Evaulate</button>
                                <?php }   ?>
                            </div>
                            <?php } ?>
                        </li>
                        <?php  }?>




                    </ul>
                </div>
                <!-- /.card-body -->

            </div>


        </div>


        <!-- add POP UP FORM (Bootstrap MODAL) -->
        <div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Leave Add</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>


                    <div class="modal-body">

                        <form action="admin_profile_detail.php" method="post" enctype="multipart/form-data">
                            <!-- <h4 style="margin-bottom: 2%;">Yeni Kullanıcı</h4> -->

                            <!-- <i class="fas fa-regular fa-user-plus"></i> -->
                            <input type="hidden" name="personal_id" value="<?=$_GET['id']?>">

                            <!-- admin or ik authorized -->
                            <input type="hidden" name="admin_id" value="<?=$_SESSION['adminId']?>">


                            <div>
                                <div class="form-group">
                                    <label>User Name</label>
                                    <input id="usernameModal" name="username" type="text" class="form-control" readonly>
                                </div>
                            </div>

                            <div>
                                <div class="form-group">
                                    <label>Amount</label>
                                    <input id="quantityModal" name="quantity" type="number" class="form-control">
                                </div>
                            </div>

                            <div>
                                <div class="form-group">
                                    <label>Leave Type</label>
                                    <input id="typeModal" name="type" type="text" class="form-control" value="Holiday"
                                        readonly>
                                </div>
                            </div>

                            <div>
                                <div class="form-group">
                                    <label>Comment</label>
                                    <textarea id="descriptiondModal" name="description" class="form-control" rows="3"
                                        placeholder="..."></textarea>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="submit" class="btn btn-info">Save

                                    </button>
                                </div>
                            </div>


                        </form>

                    </div>
                </div>
            </div>
            <!-- end of edit -->


            <!-- /.card -->
            <!-- /.container-fluid -->



        </div>

        <!-- evaulate POP UP FORM (Bootstrap MODAL) -->
        <div class="modal fade" id="evaulatemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Evaulate</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>


                    <div class="modal-body">

                        <form action="admin_profile_detail_evaulate.php" method="post" enctype="multipart/form-data">
                            <!-- <h4 style="margin-bottom: 2%;">Yeni Kullanıcı</h4> -->

                            <!-- <i class="fas fa-regular fa-user-plus"></i> -->
                            <!-- userid -->
                            <input type="hidden" id="leaveIdModal" name="leaveIdModal">

                            <!-- I will user personalIdon admin_profile_detail_evaulate page to return selected person profile -->
                            <input type="hidden" id="personalIdModal" name="personalIdModal"> 

                            <div>

                                <label class="my-1 mr-2">Status</label>
                                <select class="custom-select my-1 mr-sm-2" id="statusModalEvaulate" name="statusModal" id="">

                                    <option value="Pending">Pending</option>
                                    <option value="Approved">Approve</option>
                                    <option value="Rejected">Reject</option>
                                    <option value="Completed">Sign as Completed</option>
                                </select>

                            </div>


                            <div>
                                <div class="form-group">
                                    <label>Comment</label>
                                    <textarea id="commentModalEvaulate" name="comment" class="form-control" rows="3"
                                        placeholder="..."></textarea>
                                </div>

                                <div id="AdditionalInfoModal">
                                <dt>Last Update date:</dt>
                                <dd id="infoModal"></dd>
                                 </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="submit" class="btn btn-info">Save

                                    </button>
                                </div>
                            </div>





                        </form>

                    </div>
                </div>
            </div>

        </div>


    </section>
    <!-- /.content -->


</div>




<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap Switch -->
<script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>


<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>



<script>
$(document).ready(function() {

    $(function() {

        $('[data-toggle="tooltip"]').tooltip();

        //-------------
        //- DONUT CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData = {
            labels: [
                'Used Hour',
                'Unused Hour',
            ],
            datasets: [{
                data: [<?=$usedLeave?>, <?=$remainLeave?>],
                backgroundColor: ['#f56954', '#00a65a'],
            }]
        }
        var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        })







    })

    $(document).on('input', '#addInput', function() {

        var value = $("#addInput").val();
        // alert(value);
        $("#quantityModal").val(value);
    })



    $('.addbtn').on('click', function() {
        $('#addmodal').modal('show');
        $('#usernameModal').val($('#profileName').text());
    });


    // evaulate button
    $('.evaulateButton').on('click', function() {


        // buradayım
        $('#evaulatemodal').modal('show');
       
        // lets get the id and description of leave  
        $li = $(this).closest('li');
        var data = $li.children("input").map(function() {
            return $(this).val();
        }).get();;
        var leaveId = data[0]; // id

        var description = data[1]; // description

        var lastApproverName = data[2]; // this get the last approvername from hidden input

        var lastUpdateDate = data[3]; // this gate the last updated date 

        var personalId = data[4];

        if (lastApproverName == '') // this means noone has approved leave yet. Thus I cannot give additional information
        { // hide the the information 
            $('#AdditionalInfoModal').hide();
        }else{ // the leave is aprroved/rejected by any of admins. Give this additional information to user
            // var test = lastUpdateDate + " by " + lastApproverName;
            // console.log(test);  
           $('#infoModal').text(lastUpdateDate + " by " + lastApproverName);
           $('#AdditionalInfoModal').show();
        }

        // Assing leaveId to hidden input inside evaulate modal
        $('#leaveIdModal').val(leaveId);

        // lets get the status value from page and assign it onto modal
        var leaveStatusId = "#leaveStatus" +  leaveId;
        // console.log($(leaveStatusId).text());
        $("#statusModalEvaulate").val($(leaveStatusId).text());
        // console.log($(leaveStatusId).val());     

        // assing description to modal comment area
        $('#commentModalEvaulate').val(description);

        $('#personalIdModal').val(personalId);
        
    });

});
</script>

<?php 
}else{
    echo("hata olustu");
    
} ?>