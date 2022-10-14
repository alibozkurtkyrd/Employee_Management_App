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
                    <h1>Leave Request Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Leave Request Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">

                <div class="col-md-6">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Leave Request Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="register-leave-form.php" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Select..</label>
                                    <select id="selectDay" name="oneOrMulti" class="form-control"
                                        id="exampleFormControlSelect1" onchange="myFunction()">
                                        <!-- <option>Günlük</option> -->
                                        <!-- <option>Bir Günden Fazla</option> -->
                                        <option>Daily</option>
                                        <option>More than One Day</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">İzin Nedeniniz: </label>
                                    <select class="form-control" name="reason" id="exampleFormControlSelect1">
                                        <option>Medical</option>
                                        <!-- <option>Resmi Kurum</option> -->
                                        <option>Holiday</option>
                                        <option>Family emergency</option>

                                    </select>
                                </div>


                                <!-- Date and time -->
                                <div id="daily-1" class="form-group">
                                    <label>Select Date and Time</label>
                                    <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                        <input type="text" name="daily-start_date"
                                            class="form-control datetimepicker-input"
                                            data-target="#reservationdatetime" />
                                        <div class="input-group-append" data-target="#reservationdatetime"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>


                                <!-- how many hours is requested for daily leave -->
                                <div id="daily-2" class="form-group">
                                    <label for="exampleFormControlSelect1">Daily Leave Request</label>
                                    <select class="form-control" name="hour" id="exampleFormControlSelect1">
                                        <option>1 hour</option>
                                        <option>2 hour</option>
                                        <option>3 hour</option>
                                        <option>4 hour</option>
                                        <option>5 hour</option>
                                        <option>6 hour</option>
                                        <option>7 hour</option>
                                        <option>8 hour</option>
                                    </select>
                                </div>


                                <!-- Start Date -->
                                <div id="moreStart" class="form-group">
                                    <label>Leave Start Date:</label>
                                    <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                        <input type="text" name="more-start_date"
                                            class="form-control datetimepicker-input" data-target="#reservationdate1" />
                                        <div class="input-group-append" data-target="#reservationdate1"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>


                                <!-- End Date -->
                                <div id="moreEnd" class="form-group">
                                    <label>Leave End Date:</label>
                                    <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                        <input type="text" name="more-end_date"
                                            class="form-control datetimepicker-input" data-target="#reservationdate2" />
                                        <div class="input-group-append" data-target="#reservationdate2"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Comment</label>
                                    <textarea class="form-control" name="explanation" id="exampleFormControlTextarea1"
                                        rows="3"></textarea>
                                </div>

                                <div class="form-group">
                                    <div class="float-right">
                                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->

                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- Page specific script -->
<script>
document.getElementById("moreStart").style.display = "none";
document.getElementById("moreEnd").style.display = "none";

function myFunction() {
    var result = document.getElementById("selectDay").value;

    console.log("selam test");
    console.log(result);
    if (result === "Günlük") {
        document.getElementById("moreStart").style.display = "none";
        document.getElementById("moreEnd").style.display = "none";

        document.getElementById("daily-1").style.display = "initial";
        document.getElementById("daily-2").style.display = "initial";

    } else {
        document.getElementById("daily-1").style.display = "none";
        document.getElementById("daily-2").style.display = "none";

        document.getElementById("moreStart").style.display = "initial";
        document.getElementById("moreEnd").style.display = "initial";
    }

}



$(function() {
    //Initialize Select2 Elements


    //Date picker
    $('#reservationdate1').datetimepicker({
        format: 'DD-MM-YYYY',
    });

    //Date picker
    $('#reservationdate2').datetimepicker({
        format: 'DD-MM-YYYY',


    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({

        format: 'DD-MM-YYYY HH:mm',
        icons: {
            time: 'far fa-clock'
        }
    });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,

        locale: {
            format: 'DD-MM-YYYY HH:mm'
        }
    })


    //Timepicker
    $('#timepicker').datetimepicker({
        format: 'DD-MM-YYYY',
    })

})



// $("#reservationdate2").click(function() {
//     var startDate = $("#reservationdate1").find("input").val();
//     var endDate = $("#reservationdate2").find("input").val();
//     // alert($("#reservationdate2").find("input").val());
//     // alert($("#reservationdate2").data("reservationdate2").getDate());
//     // console.log($("#reservationdate2").find("input").val());
//     // console.log(Date.parse(startDate));

//     // console.log(startDate.getFullYear());

//     // console.log(typeof startDate);
//     console.log($("#reservationdate2").getDay());
//     // console.log(startDate);
//     // if ((Date.parse(endDate) <= Date.parse(startDate))) {
//     //   alert("End date should be greater than Start date");
//     // //   document.getElementById("reservationdate2").value = "";
//     // }
//   });

// DropzoneJS Demo Code End
</script>
</body>

</html>