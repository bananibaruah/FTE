<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CTC Calculator</title>
    <link rel="stylesheet" href="css\bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
    function calhra() {

        console.log("hi");

        var basic = document.getElementById("basic").value;
        var basicint = parseInt(basic, 10);

        var hra = document.getElementById("hra").value;
        var hraint = parseInt(hra, 10);

        hraint = basicint / 2;
        console.log("hraint", hraint);
        document.getElementById('hra').value = hraint;



    }
    </script>
    <script>
    $(document).ready(function() {
        var y = 0;
        var hr = 0;
        var ca = 0;
        var sb = 0;
        var fa = 0;
        var mcr = 0;
        var aa = 0,
            vt = 0,
            de = 0,
            ra = 0,
            ta1 = 0,
            ta2 = 0,
            pf = 0,
            esic = 0,
            g = 0,
            gt = 0,
            tb1 = 0,
            tb2 = 0,
            ot = 0,
            total_esic = 0;
        var e = 0,
            fta = 0,
            tab = 0,
            ttwo = 0,
            total1 = 0,
            total2 = 0,
            hike = 0,
            total_grade = 0,
            incentive, gross,
            total_state = 0,
            old_check = 0;
        oc1 = 0;
        $("#state").on("change", function() {
            var state = $("#state").val();
            var ctc = $("#ctc").val();
            if (ctc != "") {
                $.ajax({
                    type: "POST",
                    url: "state_check.php",
                    data: "a=" + state,
                    success: function(data) {
                        if (data != "not found") {
                            if (y >= 21000) {
                                $('#Statutory_Bonus').val('0');
                                total_state = 0;
                            } else {
                                $('#Statutory_Bonus').val(data);
                                total_state = data;
                            }
                        } else {
                            alert(data);
                        }
                    },
                });
            } else {

            }
        });
        $("#grade").on("change", function() {
            var grade = $("#grade").val();

            $.ajax({
                type: "POST",
                url: "grade_check.php",
                data: "a=" + grade,
                success: function(data) {
                    if (data != "not found") {
                        //lta
                        const str = data.split("_");
                        $('#lta').val(str[0]);
                        $('#vr').val(str[1]);
                        $('#Food_Allowance').val(str[2]);
                        $('#m_c_r').val(str[3]);
                        $('#Attire_Allowance').val(str[4]);
                        $('#dr').val(str[5]);
                        total_grade = Math.round(parseInt(str[0]) +
                            parseInt(str[1]) +
                            parseInt(str[2]) +
                            parseInt(str[3]) +
                            parseInt(str[4]) +
                            parseInt(str[5])
                        );
                        //alert(str[0]);

                    } else {
                        alert(data);
                    }

                },
            });
        });


        $("#vpp1").on("keyup", function() {
            var z = $("#vpp1").val();
            var ctc = $("#ctc").val();
            var w = 0;
            if (ctc != "") {
                if (z >= 5 && z <= 50) {
                    $("#al2").css('display', 'none');
                    w = (ctc * (z / 100));
                    $('#Variable_Pay').val(w);
                    $('#Total_II').val(w);
                    Incentive = Math.round(ctc * z / 100);

                } else {
                    //alert('enter value between 5 to 50 ');
                    $("#Variable_Pay").val('0');
                    $('#Total_II').val('0');
                    $("#al2").css('display', 'inline-block');
                }

            } else {
                alert('enter ctc first..');
            }

        });
        $("#oldctc").on("change", function() {
            oc1 = $("#oldctc").val();
            var ctc = $("#ctc").val();
            hike = Math.round((ctc / oc1 - 1) * 100);
            old_check = oc1 * 1.8;
            if (hike >= 81) {
                ra = Math.round(ctc - old_check);
            } else {
                ra = 0;
            }
            //alert(hike);

        });
        $("#basicp").on("keyup", function() {
            var x = $("#basicp").val();
            var ctc = $("#ctc").val();
            oc1 = $("#oldctc").val();
            if (ctc != "") {
                if (x >= 5 && x <= 50) {
                    $("#al1").css('display', 'none');
                    y = Math.round((ctc * (x / 100)));
                    hr = Math.round(y / 2);
                    ca = Math.round(1600 * 12);

                    gross = ctc / 12;

                    ta1 = Math.round(y + hr + ca + total_grade + total_state); // total half part
                    if (y <= 15000) {
                        $("#PF").val('1800');
                        pf = 1800;
                    } else {
                        pf = Math.round((12 / 100) * y);
                        $("#PF").val(pf);
                    }
                    gt = Math.round(y / 12);
                    //gt = (g / 12);

                    tg = (gross + incentive + y + hr + ra + pf + gt)

                    tb1 = pf + gt;
                    total1 = (ta1 + tb1);
                    //alert(total1);
                    e = ctc - total1;
                    //alert(e);
                    ta2 = (ta1 + e);
                    esic = Math.round(ta1 / 12);
                    if (esic >= 21000) {
                        $("#ESIC").val('0');
                        total_esic = 0;
                    } else {
                        total_esic = Math.round(ta2 - ca * (3.25 / 100));
                        $("#ESIC").val(total_esic);
                    }
                    tb2 = (tb1 + total_esic);
                    total2 = ta2 + tb2;



                    // ot = (ta + tb);
                    // e = (ctc - ot);
                    // fta = (ot + e);
                    // tab = (fta + tb);
                    // ttwo = (ttwo);
                    // total = (tab + ttwo);
                    $("#basic").val(y);
                    $("#hra").val(hr);
                    $("#Conveyance_Allowance").val(ca);
                    $("#Statutory_Bonus").val(total_state);
                    $("#gratuity").val(Math.round(gt));
                    $("#Total_B").val(tb2);
                    $("#Executive_Allowance").val(e);
                    $("#Retention_Allowance").val(ra);
                    $("#Total_A").val(ta2);
                    $("#LTotal").val(total2);

                    // $("#Total_II").val(ttwo);
                    // $("#Total").val(total);

                } else {
                    //alert('enter value between 5 to 50 ');
                    $("#basic").val('0');
                    $("#al1").css('display', 'inline-block');
                }
            } else {
                alert('enter ctc first..');
            }

        });
        $("#ctc").on("keyup", function() {
            var ctc = $("#ctc").val();

            // y = (40 / 100) * ctc;
            // $("#basic").val(y);


        });


        $("hra").focus(function() {

            var basic = $("#basic").val();

            alert(basic);

            y = basic / 2;
            $("#hra").val(y);

            alert(y);

        });

    });
    </script>
</head>
<br><br>

<body>
    <form method="post" action="create_tcpdf.php">
        <div class="container">
            <div class="card" style=background-color:#BFD7ED>
                <div class="card-body">
                    <div style="text-align: center;">
                        <select id="offer_select">
                            <option>Choose Offer Letter</option>
                            <option value="red" selected><a href="">PE</a></option>
                            <!-- <option value="red" selected><a href="">PE (M10 & Above)</a></option>
                            <option value="blue"><a href="">FTE-ESIC</a></option>
                            <option value="green"><a href="index.php">FTE WITHOUT ESIC</a></option>
                            <option value="yellow"><a href="">CAMPUS</a></option>
                            <option value="yellow"><a href="">FRESHER BOND</a></option> -->
                        </select>
                    </div>
                    <br />
                    <div class="green box">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- <label=""><b>CODE</b></label>
                                    <input type="text" class="form-control" id="Code" name="Code" placeholder="Code" />
                                    <br> -->
                            </div>
                            <div class="col-lg-6">
                                <label=""><b>CODE</b></label>
                                    <input type="text" class="form-control" id="Code" name="Code" placeholder="Code" />
                                    <br>

                                    <label="">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Name" />
                                        <br>
                                        <label="">Address Line2</label>
                                            <input type="text" class="form-control" id="Ad2" name="Ad2"
                                                placeholder="Address Line 2" />
                                            <br>
                                            <label="">City</label>
                                                <input type="text" class="form-control" id="City" name="City"
                                                    placeholder="City" />
                                                <br>
                                                <label=""><b>State</b></label>

                                                    <select id="state" name="state" class="custom-select">
                                                        <option selected>Select State</option>
                                                        <?php
$g_sql = "SELECT DISTINCT COL_1 FROm stat";
$g_result = $link->query($g_sql);
if ($g_result->num_rows > 0) {
    while ($g_row = $g_result->fetch_assoc()) {
        echo "<option value='" . $g_row['COL_1'] . "'>" . $g_row['COL_1'] . "</option>";
    }
}

?>
                                                    </select>
                                                    <br>
                                                    <br>

                                                    <label="">End Date</label>
                                                        <input type="date" class="form-control" id="ed" name="ed"
                                                            placeholder="End Date" />
                                                        <br>
                                                        <label="">DOJ</label>
                                                            <input type="date" class="form-control" id="doj" name="doj"
                                                                placeholder="DOJ" />
                                                            <br>
                                                            <label=""><b>OLD CTC</b></label>
                                                                <input type="text" class="form-control" id="oldctc"
                                                                    name="oldctc" placeholder="OLD CTC" />
                                                                <br>
                                                                <label=""><b>BASIC PERCENTAGE <small id="al1"
                                                                            style="display:none;"
                                                                            class="badge badge-danger"> ( Enter %
                                                                            between 5
                                                                            to 50 )
                                                                        </small></b></label>
                                                                    <input type="number" class="form-control"
                                                                        id="basicp" name="basicp"
                                                                        placeholder="basicp" />
                                                                    <br>
                                                                    <label="">BASIC</label>
                                                                        <input type="text" class="form-control"
                                                                            id="basic" name="basic" placeholder="basic"
                                                                            readonly />
                                                                        <br>


                                                                        <label="">HRA</label>
                                                                            <input type="text" class="form-control"
                                                                                id="hra" name="hra" placeholder="hra"
                                                                                onfocus="calhra()" />
                                                                            <br>


                                                                            <label="">CONVEYANCE ALLOWANCE</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="Conveyance_Allowance"
                                                                                    name="Conveyance_Allowance"
                                                                                    placeholder="Conveyance_Allowance" />
                                                                                <br>
                                                                                <label="">STATUTORY BONUS</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="Statutory_Bonus"
                                                                                        name="Statutory_Bonus"
                                                                                        placeholder="Statutory_Bonus" />
                                                                                    <br>
                                                                                    <label="">LTA</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="lta" name="lta"
                                                                                            placeholder="LTA" />
                                                                                        <br>



                                                                                        <label="">EXECUTIVE
                                                                                            ALLOWANCE</label>
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                id="Executive_Allowance"
                                                                                                name="Executive_Allowance"
                                                                                                placeholder="Executive_Allowance" />

                                                                                            <br>
                                                                                            <label="">FOOD
                                                                                                ALLOWANCE</label>
                                                                                                <input type="text"
                                                                                                    class="form-control"
                                                                                                    id="Food_Allowance"
                                                                                                    name="Food_Allowance"
                                                                                                    placeholder="Food Allowance" />

                                                                                                <br>
                                                                                                <label="">MOBILE CHARGES
                                                                                                    REIMBURSEMENT</label>
                                                                                                    <input type="text"
                                                                                                        class="form-control"
                                                                                                        id="m_c_r"
                                                                                                        name="m_c_r"
                                                                                                        placeholder="MOBILE CHARGES REIMBURSEMENT" />

                                                                                                    <br>

                                                                                                    <label="">ATTIRE
                                                                                                        ALLOWANCE</label>
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            class="form-control"
                                                                                                            id="Attire_Allowance"
                                                                                                            name="Attire_Allowance"
                                                                                                            placeholder="Attire Allowance" />

                                                                                                        <br>
                                                                                                        <label="">
                                                                                                            VEHICLE
                                                                                                            REIMBURSEMENT</label>
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                class="form-control"
                                                                                                                id="vr"
                                                                                                                name="vr"
                                                                                                                placeholder="VEHICLE REIMBURSEMENT" />

                                                                                                            <br>






                            </div>
                            <div class="col-lg-6">
                                <label="">Address Line 1</label>
                                    <input type="text" class="form-control" id="Ad1" name="Ad1"
                                        placeholder="Address Line 1" />
                                    <br>
                                    <label="">Address Line 3</label>
                                        <input type="text" class="form-control" id="Ad3" name="Ad3"
                                            placeholder="Address Line 3" />
                                        <br>
                                        <label="">Pincode</label>
                                            <input type="text" class="form-control" id="Pincode" name="Pincode"
                                                placeholder="Pincode" />
                                            <br>
                                            <label="">Start Date</label>
                                                <input type="date" class="form-control" id="Sd" name="Sd"
                                                    placeholder="Start Date" />
                                                <br>

                                                <label="">Position</label>
                                                    <input type="text" class="form-control" id="Position"
                                                        name="Position" placeholder="Position" />
                                                    <br>
                                                    <label=""><b>GRADE</b></label>

                                                        <select id="grade" name="grade" class="custom-select">
                                                            <option selected>Select Grade</option>
                                                            <?php
$g_sql = "SELECT DISTINCT COL_1 FROm lta_list";
$g_result = $link->query($g_sql);
if ($g_result->num_rows > 0) {
    while ($g_row = $g_result->fetch_assoc()) {
        echo "<option value='" . $g_row['COL_1'] . "'>" . $g_row['COL_1'] . "</option>";
    }
}

?>
                                                        </select>
                                                        <br>
                                                        <br>
                                                        <label=""><b>TARGETED CTC</b></label>
                                                            <input type="text" class="form-control" id="ctc" name="ctc"
                                                                placeholder="CTC" />
                                                            <br>


                                                            <label="">
                                                                DRIVER
                                                                REIMBURSEMENT</label>
                                                                <input type="text" class="form-control" id="dr"
                                                                    name="dr" placeholder="DRIVER REIMBURSEMENT" />

                                                                <br>
                                                                <label="">
                                                                    RETENTION
                                                                    ALLOWANCE</label>
                                                                    <input type="text" class="form-control"
                                                                        id="Retention_Allowance"
                                                                        name="Retention_Allowance"
                                                                        placeholder="Retention Allowance" />

                                                                    <br>

                                                                    <label="">
                                                                        <b>TOTAL
                                                                            A</b></label>
                                                                        <input type="text" class="form-control"
                                                                            id="Total_A" name="Total_A"
                                                                            placeholder="Total_A" />

                                                                        <br>

                                                                        <label="">
                                                                            PF</label>
                                                                            <input type="text" class="form-control"
                                                                                id="PF" name="PF" placeholder="PF" />

                                                                            <br>

                                                                            <label="">
                                                                                ESIC</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="ESIC" name="ESIC"
                                                                                    placeholder="ESIC" />

                                                                                <br>
                                                                                <label="">GRATUITY</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="gratuity" name="gratuity"
                                                                                        placeholder="Gratuity" />

                                                                                    <br>
                                                                                    <label=""><b>TOTAL B</b></label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="Total_B" name="Total_B"
                                                                                            placeholder="Total_B"
                                                                                            onfocus="calhra()" />
                                                                                        <br>
                                                                                        <label=""><b>TOTAL OF PART
                                                                                                I(A+B)</b></label>
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                id="LTotal"
                                                                                                name="LTotal"
                                                                                                placeholder="Total A+B" />

                                                                                            <br>
                                                                                            <label=""><b>VARIABLE PAY
                                                                                                    PERCENATGE<small
                                                                                                        id="al2"
                                                                                                        style="display:none;"
                                                                                                        class="badge badge-danger">
                                                                                                        ( Enter %
                                                                                                        between 5
                                                                                                        to 50 )
                                                                                                    </small></b></label>
                                                                                                <input type="number"
                                                                                                    class="form-control"
                                                                                                    id="vpp1"
                                                                                                    name="vpp1"
                                                                                                    placeholder="VARIABLE PAY" />

                                                                                                <br>

                                                                                                <div class="row">
                                                                                                    <div
                                                                                                        class="col-lg-4">
                                                                                                        <label="">
                                                                                                            VARIABLE
                                                                                                            PAY*</label>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="col-lg-6">
                                                                                                        <select id="vp"
                                                                                                            class="custom-select"
                                                                                                            style="border:none;background-color:transparent;margin-top:-10px !important">
                                                                                                            <option
                                                                                                                selected>
                                                                                                                Variable
                                                                                                                PAY*
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="1">
                                                                                                                1
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="2">
                                                                                                                2
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="3">
                                                                                                                3
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="4">
                                                                                                                4
                                                                                                            </option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>


                                                                                                <input type="text"
                                                                                                    class="form-control"
                                                                                                    id="Variable_Pay"
                                                                                                    name="Variable_Pay"
                                                                                                    placeholder="VARIABLE  PAY"
                                                                                                    onfocus="calhra()" />
                                                                                                <br>
                                                                                                <label=""><b>TOTAL
                                                                                                        OF
                                                                                                        PART II</b>
                                                                                                    </label>
                                                                                                    <input type="text"
                                                                                                        class="form-control"
                                                                                                        id="Total_II"
                                                                                                        name="Total_II"
                                                                                                        placeholder="TOTAL OF PART II"
                                                                                                        onfocus="calhra()" />
                                                                                                    <br>
                                                                                                    <label="">
                                                                                                        <b>COST TO
                                                                                                            COMPANY
                                                                                                            (PART I
                                                                                                            +
                                                                                                            PART
                                                                                                            II)</b>
                                                                                                        </label>
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            class="form-control"
                                                                                                            id="TOTAL"
                                                                                                            name="TOTAL"
                                                                                                            placeholder=" COST TO COMPANY (PART I+ PART II" />
                                                                                                        <br>


                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary" />
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>