<?php require_once('config.php');
?>
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
    var x = 0,
        y = 0;
    var y1 = 0;
    var hr1 = 0;
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
        sbb = 0,
        hike = 0,
        total_grade = 0,
        incentive, gross,
        total_state = 0,
        lta1 = 0,
        aa1 = 0,
        vr1 = 0,
        mcr1 = 0,
        dr1 = 0,
        old_check = 0;
    oc1 = 0;
    ctotal = 0;
    var w = 0;
    var w1 = 0;
    var tb3 = 0;
    var mra = 0;
    var flag = 0,
        eflag = 0,
        yflag = 0;
    rechange_e = 0, rechange_y = 0;



    $(document).ready(function() {

        $("#Retention_Allowance").on("keyup", function() {
            mra = $("#Retention_Allowance").val();
            flag = 1;
            basic_pay_ch();
        });
        if (y < 21000) {
            $("#state").on("change", function() {
                var state = $("#state").val();
                var ctc = $("#ctc").val();
                var state_val = 0;
                var sbb = 0;
                total_state = 0;
                if (ctc != "") {
                    $.ajax({
                        type: "POST",
                        url: "state_check.php",
                        data: "a=" + state,
                        success: function(data) {
                            if (data != "not found") {
                                state_val = parseInt(data);
                                var dy = 0,
                                    dy1 = 0;
                                dy = Math.floor((ctc * (x / 100)) / 12);
                                dy1 = dy * 0.01;
                                y = parseInt(Math.floor(dy1) + "00");
                                if (y < 21000) {
                                    sbb = Math.round(y * (20 / 100));

                                    if (sbb > state_val) {
                                        total_state = (sbb);
                                        $('#Statutory_Bonus').val(total_state * 12);
                                    } else {
                                        total_state = state_val;
                                        $('#Statutory_Bonus').val(total_state * 12);
                                    }
                                } else {
                                    alert(data);
                                }
                            }
                            basic_pay_ch();
                        },
                    });
                } else {

                }
            });

        } else {
            total_state = 0;
        }


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
                        $('#lta').val(str[0] * 12);

                        $('#vr').val(str[1] * 12);

                        $('#Food_Allowance').val(str[2] * 12);

                        $('#m_c_r').val(str[3] * 12);

                        $('#Attire_Allowance').val(str[4] * 12);

                        $('#driver_reimbursement').val(str[5] * 12);

                        total_grade = Math.round(parseInt(str[0]) +
                            parseInt(str[1]) +
                            parseInt(str[2]) +
                            parseInt(str[3]) +
                            parseInt(str[4]) +
                            parseInt(str[5])
                        );

                    } else {
                        alert(data);
                    }

                },
            });


        });


        $("#vpp1").on("keyup", function() {
            var z = $("#vpp1").val();
            var ctc = $("#ctc").val();
            var wf = 0;
            if (ctc != "") {
                if (z >= 5 && z <= 50) {
                    $("#al2").css('display', 'none');
                    w1 = ctc * (z / 100);
                    w = w1 / 12;
                    wf = w * 12;
                    $('#Variable_Pay').val(wf);
                    $('#Total_II').val(wf);

                } else {
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
            old_check = (oc1 * 1.8);
            if (hike >= 81) {
                var dra = 0,
                    dra1 = 0;
                dra = Math.floor((ctc - old_check) / 12);
                dra1 = dra * 0.01;
                ra = parseInt(Math.floor(dra1) + "00");

            } else {
                ra = 0;
            }

        });

        $("#basicp").on("keyup", function() {
            basic_pay_ch();

        });

        $("#ctc").on("keyup", function() {
            var ctc = $("#ctc").val();
        });


        $("hra").focus(function() {

            var basic = $("#basic").val();

            y = basic / 2;
            $("#hra").val(y);
        });

        $("#Executive_Allowance").on('change', function() {
            rechange_e = $("#Executive_Allowance").val();
            rechange_e = (rechange_e / 12);
            eflag = 1;
            basic_pay_ch();
        });
        $("#basic").on('change', function() {
            rechange_y = $("#basic").val();
            rechange_y = (rechange_y / 12);
            yflag = 1;
            basic_pay_ch();
        });

    });

    //Retention_Allowance
    function basic_pay_ch() {
        $(document).ready(function() {
            x = $("#basicp").val();
            var ctc = $("#ctc").val(); //ctc
            // oc1 = $("#oldctc").val(); //old ctc
            // $("#hike").html(hike, "%");
            if (ctc != "") {
                if (x >= 5 && x <= 50) {
                    $("#al1").css('display', 'none');
                    var dy = 0,
                        dy1 = 0;
                    dy = Math.floor((ctc * (x / 100)) / 12);
                    dy1 = dy * 0.01;
                    y = parseInt(Math.floor(dy1) + "00");

                    if (yflag == 0) {
                        hr = y / 2;
                    }
                    if (yflag == 1) {
                        y = rechange_y;
                        hr = y / 2;
                    }


                    ca = 1600;
                    if (y < 21000) {

                        if (flag == 0) {
                            ta1 = y + hr + ca + total_state;
                        }
                        if (flag == 1) {
                            ra = parseInt(mra);
                            var ct = 0,
                                ct1 = 0;
                            ct = Math.floor(ra / 12);

                            ta1 = y + hr + ca + total_state;
                        }
                    } else {
                        if (flag == 0) {
                            ta1 = y + hr + ca;
                        }
                        if (flag == 1) {
                            ra = parseInt(mra);
                            var ct = 0,
                                ct1 = 0;
                            ct = Math.floor(ra / 12);

                            ta1 = y + hr + ca;
                        }
                    }



                    var y_12 = y;
                    var total_y_12 = 0;
                    var pf = 0;
                    var pf1 = 0;
                    var y_121 = 0;
                    if (y_12 > 15000) {
                        total_y_12 = y_12 * (12 / 100);
                        pf = total_y_12 * 12;
                        pf1 = pf;
                        pf = pf1;
                        $("#PF").val(Math.round(pf));

                    } else {
                        y_121 = ta1 - hr;
                        if (y_121 > 15000) {
                            y_12 = 1800;
                            total_y_12 = y_12;
                            pf = total_y_12 * 12;
                            pf1 = pf;
                            pf = pf1;
                            $("#PF").val(Math.round(pf));
                        } else {
                            total_y_12 = y_121 * (12 / 100);
                            pf = total_y_12 * 12;
                            pf1 = pf;
                            pf = pf1;
                            $("#PF").val(Math.round(pf));


                        }

                    }

                    // gt = (y / 12);

                    var e_12_1 = 0;
                    var esic_1 = 0;
                    var total_esic_1 = 0;
                    var e_12_1 = (ta1 - ca);
                    esic12 = e_12_1;
                    if (esic12 <= 21000) {
                        total_esic_1 = e_12_1 * (3.25 / 100);
                        $("#ESIC").val(Math.round(total_esic_1));
                    } else {
                        total_esic_1 = 0;
                        $("#ESIC").val(Math.round(total_esic_1));
                    }


                    tb12_1 = pf + total_esic_1;
                    tb1_1 = tb12_1 / 12;



                    valtab_1 = 0;
                    valtab1_1 = 0;
                    valtab_1 = ta1 + tb1_1;
                    valtab1_1 = valtab_1;

                    var e1old_1 = 0;
                    var eold_1 = 0;
                    e1_1 = ctc - valtab1_1;
                    ctc3_1 = ctc / 12;
                    e1old_1 = ctc3_1 - valtab1_1;
                    e_1 = e1old_1;
                    console.log("e1lod : " + e1old_1);

                    // // alert(e);
                    if (e_1 < 0) {
                        alert("Executive Allowance Value in Minus");
                        if (flag == 0) {
                            eold_1 = e_1;
                            $("#Old_Executive_Allowance").val(eold_1);
                            $("#OEAV").html(Math.round(eold_1));

                            e_1 = 0;
                        }
                    }
                    if (e_1 < 0) {
                        ta2 = ta1;
                    }
                    if (eflag == 1) {
                        e_1 = rechange_e;
                        ta2_1 = ta1 + e_1;
                    } else {
                        ta2_1 = ta1 + e_1;
                        console.log(e_1);
                    }

                    ta2_3 = y + hr + ca + total_state + e_1;
                    var e_12 = 0;
                    var esic = 0;
                    var total_esic = 0;
                    var e_12 = (ta2_3 - ca);
                    esic = e_12;
                    if (esic <= 21000) {
                        total_esic = ((e_12 * (3.25 / 100)) * 12);
                        $("#ESIC").val(Math.round(total_esic));
                    } else {
                        total_esic = 0;
                        $("#ESIC").val(Math.round(total_esic * 12));
                    }


                    tb12 = pf + total_esic;
                    tb1 = tb12 / 12;



                    valtab = 0;
                    valtab1 = 0;
                    valtab = ta1 + tb1;
                    valtab1 = valtab;

                    var e1old = 0;
                    var eold = 0;
                    e1 = ctc - valtab1;
                    ctc3 = ctc / 12;
                    e1old = ctc3 - valtab1;
                    e = e1old;
                    console.log("e1lod : " + e1old);

                    // // alert(e);
                    if (e < 0) {
                        alert("Executive Allowance Value in Minus");
                        if (flag == 0) {
                            eold = e;
                            $("#Old_Executive_Allowance").val(eold);
                            $("#OEAV").html(Math.round(eold));

                            e = 0;
                        }
                    }
                    if (e < 0) {
                        ta2 = ta1;
                    }
                    if (eflag == 1) {
                        e = rechange_e;
                        ta2 = ta1 + e;
                    } else {
                        ta2 = ta1 + e;
                        console.log(e);
                    }


                    tb2 = tb12 / 12;

                    total2 = ta2 + tb2;

                    ctotal = total2;

                    $("#basic").val(y * 12);
                    $("#hra").val(hr * 12);
                    $("#Conveyance_Allowance")
                        .val(ca * 12);
                    if (y < 21000) {
                        total_state = 0;
                    } else {
                        $("#Statutory_Bonus").val(total_state * 12);
                    }

                    // $("#gratuity")
                    //     .val(Math.round(gt * 12));
                    $("#Total_B").val(Math.round(tb2 * 12));
                    $("#Executive_Allowance").val(Math.round(e * 12));
                    //$("#Retention_Allowance").val(ra * 12);
                    $("#Total_A").val(Math.round(ta2 * 12));
                    $("#LTotal").val(Math.round(total2 * 12));
                    $("#TOTAL").val(Math.round(ctotal * 12));
                    // $("#Old_Retention_Allowance").val(ra * 12);


                } else {
                    $("#basic").val('0');
                    $("#al1").css('display', 'inline-block');
                }
            } else {
                alert('enter ctc first..');
            }
        });
    }
    </script>
</head>
<br><br>


<body>
    <form method="post" action="create_tcpdf.php">
        <!---->
        <div class="container">
            <div class="card" style=background-color:#BFD7ED>
                <div class="card-body">
                    <div style="text-align: center;"><b>FTE</b>
                        <!-- <select id="offer_select"> -->
                        <!-- <option>Choose Offer Letter</option> -->
                        <!-- <option value="blue"><a href="">FTE</a></option> -->
                        <!-- <option value="red" selected><a href="">PE E10 to S10</a></option>
                            <option value="red" selected><a href="">PE (M10 & Above)</a></option>
                            
                            <option value="yellow"><a href="">CAMPUS</a></option>
                            <option value="yellow"><a href="">OFF CAMPUS</a></option> -->
                        <!-- </select> -->
                    </div>
                    <br />
                    <div class="green box">
                        <div class="row">

                            <div class="col-lg-6">
                                <label=""><b>Reference number of offer letter</b></label>
                                    <input type="text" class="form-control" id="Code" name="Code" placeholder="Code" />
                                    <br>
                                    <label="">Address Line 1</label>
                                        <input type="text" class="form-control" id="Ad1" name="Ad1"
                                            placeholder="Address Line 1" />
                                        <br>
                                        <label="">Address Line 3</label>
                                            <input type="text" class="form-control" id="Ad3" name="Ad3"
                                                placeholder="Address Line 3" />
                                            <br>
                                            <label="">Work Location</label>
                                                <input type="text" class="form-control" id="aloc" name="aloc"
                                                    placeholder="Annexure Location" />
                                                <br>
                                                <label="">Offer date</label>
                                                    <input type="date" class="form-control" id="doj" name="doj"
                                                        placeholder="DOJ" />
                                                    <br>

                                                    <label="">End Date</label>
                                                        <input type="date" class="form-control" id="ed" name="ed"
                                                            placeholder="End Date" />
                                                        <br>


                                                        <label="">Working End Day</label>
                                                            <input type="text" class="form-control" id="wed" name="wed"
                                                                placeholder="Working End Day" />
                                                            <br>


                                                            <!-- <label=""><b>OLD CTC</b></label>
                                                        <span id="hike" name="hike" class="badge badge-danger">
                                                            Hike % </span>


                                                        <input type="text" class="form-control" id="oldctc"
                                                            name="oldctc" placeholder="OLD CTC" />
                                                        <br> -->




                                                            <label=""><b>TARGETED CTC</b></label>
                                                                <input type="text" class="form-control" id="ctc"
                                                                    name="ctc" placeholder="CTC" />
                                                                <br>
                                                                <label=""><b>State</b></label>

                                                                    <select id="state" name="state"
                                                                        class="custom-select">
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
                                                                    <br><br>

                                                                    <label="">BASIC</label>
                                                                        <input type="text" class="form-control"
                                                                            id="basic" name="basic"
                                                                            placeholder="basic" />
                                                                        <br>




                                                                        <label="">CONVEYANCE ALLOWANCE</label>
                                                                            <input type="text" class="form-control"
                                                                                id="Conveyance_Allowance"
                                                                                name="Conveyance_Allowance"
                                                                                placeholder="Conveyance_Allowance" />

                                                                            <!-- <label="">LTA</label>
                                                                        <input type="text" class="form-control" id="lta"
                                                                            name="lta" placeholder="LTA" />
                                                                        <br> -->

                                                                            <!-- <label="">EXECUTIVE
                                                                                ALLOWANCE OLD VALUE</label>


                                                                                <input type="text" class="form-control"
                                                                                    id="Old_Executive_Allowance"
                                                                                    name="Old_Executive_Allowance"
                                                                                    placeholder="Old_Executive_Allowance" /> -->




                                                                            <!-- <br> -->

                                                                            <!-- <label="">FOOD
                                                                            ALLOWANCE</label>
                                                                            <input type="text" class="form-control"
                                                                                id="Food_Allowance"
                                                                                name="Food_Allowance"
                                                                                placeholder="Food Allowance" />

                                                                            <br> -->

                                                                            <!-- 
                                                                            <label="">ATTIRE
                                                                                ALLOWANCE</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="Attire_Allowance"
                                                                                    name="Attire_Allowance"
                                                                                    placeholder="Attire Allowance" />
                                                                                <br>
                                                                                <label="">
                                                                                    DRIVER
                                                                                    REIMBURSEMENT</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="driver_reimbursement"
                                                                                        name="driver_reimbursement"
                                                                                        placeholder="DRIVER REIMBURSEMENT" /> -->

                                                                            <br>
                                                                            <label="">EXECUTIVE
                                                                                ALLOWANCE</label>
                                                                                <span id="OEAV"
                                                                                    class="badge badge-danger">
                                                                                    Old Value : 0</span>
                                                                                <input type="text" class="form-control"
                                                                                    id="Executive_Allowance"
                                                                                    name="Executive_Allowance"
                                                                                    placeholder="Executive_Allowance" />

                                                                                <br>


                                                                                <!-- <label="">MOBILE
                                                                                CHARGES
                                                                                REIMBURSEMENT</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="m_c_r" name="m_c_r"
                                                                                    placeholder="MOBILE CHARGES REIMBURSEMENT" />

                                                                                <br> -->

                                                                                <!-- <label="">
                                                                                    VEHICLE
                                                                                    REIMBURSEMENT</label>
                                                                                    <input type="text"
                                                                                        class="form-control" id="vr"
                                                                                        name="vr"
                                                                                        placeholder="VEHICLE REIMBURSEMENT" />

                                                                                    <div class="Retention_Allowance">
                                                                                        <br>
                                                                                        <label class="">
                                                                                            RETENTION
                                                                                            ALLOWANCE</label>
                                                                                        <span id="ORAV"
                                                                                            class="badge badge-danger">
                                                                                            Old Value : 0</span>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="Retention_Allowance"
                                                                                            name="Retention_Allowance"
                                                                                            placeholder="Retention Allowance" />
                                                                                    </div>
                                                                                    <br> -->



                                                                                <label="">
                                                                                    PF</label>
                                                                                    <input type="text"
                                                                                        class="form-control" id="PF"
                                                                                        name="PF" placeholder="PF" />

                                                                                    <br>


                                                                                    <!-- <div class="row">
                                                                                                    <div
                                                                                                        class="col-lg-6">
                                                                                                        <label="">
                                                                                                            VARIABLE
                                                                                                            COMPONENTS*</label>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="col-lg-6">
                                                                                                        <select
                                                                                                            name="vp"
                                                                                                            id="vp"
                                                                                                            class="custom-select"
                                                                                                            style="border:none;background-color:transparent;margin-top:-10px !important">

                                                                                                            <option
                                                                                                                selected>
                                                                                                                <b>Select
                                                                                                                    One</b>
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="Variable Pay * ">
                                                                                                                Variable
                                                                                                                Pay
                                                                                                                *
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="Short Term Retention Bonus ** ">
                                                                                                                Short
                                                                                                                Term
                                                                                                                Retention
                                                                                                                Bonus
                                                                                                                **
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="Sales Incentive *** ">
                                                                                                                Sales
                                                                                                                Incentive
                                                                                                                ***
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="Business Incentive *** ">
                                                                                                                Business
                                                                                                                Incentive
                                                                                                                ***
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="Retention Bonus / Allowance #">
                                                                                                                Retention
                                                                                                                Bonus
                                                                                                                /
                                                                                                                Allowance
                                                                                                                #
                                                                                                            </option>


                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>


                                                                                                <input type="text"
                                                                                                    class="form-control"
                                                                                                    id="Variable_Pay"
                                                                                                    name="Variable_Pay"
                                                                                                    placeholder="VARIABLE  PAY" /> -->



                                                                                    <!-- 

                                                                                                <b>Retention
                                                                                                    Bonus</b></label>
                                                                                                <input type="text"
                                                                                                    class="form-control"
                                                                                                    id="RB" name="RB"
                                                                                                    placeholder="RB" />
                                                                                                <br> -->
                                                                                    <label="">
                                                                                        <b>TOTAL
                                                                                            B</b></label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="Total_B" name="Total_B"
                                                                                            placeholder="Total_B" />
                                                                                        <br>



                                                                                        <label><b>COST
                                                                                                TO
                                                                                                COMPANY
                                                                                                (PART
                                                                                                I
                                                                                                +
                                                                                                PART
                                                                                                II)</b>
                                                                                        </label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="TOTAL" name="TOTAL"
                                                                                            placeholder=" COST TO COMPANY (PART I+ PART II" />
                                                                                        <br>






                            </div>


                            <div class="col-lg-6">

                                <label="">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" />
                                    <br>
                                    <label="">Address Line2</label>
                                        <input type="text" class="form-control" id="Ad2" name="Ad2"
                                            placeholder="Address Line 2" />
                                        <br>
                                        <label="">City</label>
                                            <input type="text" class="form-control" id="City" name="City"
                                                placeholder="City" />
                                            <br>
                                            <label="">Pincode</label>
                                                <input type="text" class="form-control" id="Pincode" name="Pincode"
                                                    placeholder="Pincode" />
                                                <br>

                                                <label="">Start Date</label>
                                                    <input type="date" class="form-control" id="Sd" name="Sd"
                                                        placeholder="Start Date" />
                                                    <br>


                                                    <label="">Working Start Day</label>
                                                        <input type="text" class="form-control" id="wsd" name="wsd"
                                                            placeholder="Working Start Day" />
                                                        <br>
                                                        <label="">Position</label>
                                                            <input type="text" class="form-control" id="Position"
                                                                name="Position" placeholder="Position" />
                                                            <br>
                                                            <label=""><b>BASIC PERCENTAGE <small id="al1"
                                                                        style="display:none;"
                                                                        class="badge badge-danger"> (
                                                                        Enter %
                                                                        between 5
                                                                        to 50 )
                                                                    </small></b></label>
                                                                <input type="number" class="form-control" id="basicp"
                                                                    name="basicp" placeholder="basicp" />
                                                                <br>

                                                                <label=""><b>GRADE</b></label>

                                                                    <input type="text" class="form-control" id="grade"
                                                                        name="grade" placeholder="F00" />

                                                                    <br>


                                                                    <!-- <label=""><b>VARIABLE
                                                                PAY
                                                                PERCENATGE<small id="al2" style="display:none;"
                                                                    class="badge badge-danger">
                                                                    ( Enter %
                                                                    between 5
                                                                    to 50 )
                                                                </small></b></label>
                                                            <input type="number" class="form-control" id="vpp1"
                                                                name="vpp1" placeholder="VARIABLE PAY" />



                                                            <br>  -->
                                                                    <label="">HRA</label>
                                                                        <input type="text" class="form-control" id="hra"
                                                                            name="hra" placeholder="hra" />
                                                                        <br>
                                                                        <label="">STATUTORY
                                                                            BONUS</label>
                                                                            <input type="text" class="form-control"
                                                                                id="Statutory_Bonus"
                                                                                name="Statutory_Bonus"
                                                                                placeholder="Statutory_Bonus" />
                                                                            <br>
                                                                            <label="">
                                                                                <b>TOTAL
                                                                                    A</b></label>
                                                                                <input type="text" class="form-control"
                                                                                    id="Total_A" name="Total_A"
                                                                                    placeholder="Total_A" />

                                                                                <br>



                                                                                <!-- <label="">
                                                                                            GRATUITY</label>
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                id="gratuity"
                                                                                                name="gratuity"
                                                                                                placeholder="Gratuity" />

                                                                                            <br> -->

                                                                                <div>
                                                                                    <label="">
                                                                                        ESIC</label>

                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="ESIC" name="ESIC"
                                                                                            placeholder="ESIC" />
                                                                                </div>


                                                                                <br>


                                                                                <!-- <label="">
                                                                                                    <b>STRB</b></label>
                                                                                                    <input type="text"
                                                                                                        class="form-control"
                                                                                                        id="STRB"
                                                                                                        name="STRB"
                                                                                                        placeholder="STRB" />
                                                                                                    <br> -->
                                                                                <!-- <label="">
                                                                                                        <b>TOTAL
                                                                                                            OF
                                                                                                            PART
                                                                                                            II</b>
                                                                                                        </label>
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            class="form-control"
                                                                                                            id="Total_II"
                                                                                                            name="Total_II"
                                                                                                            placeholder="TOTAL OF PART II" />
                                                                                                        <br> -->
                                                                                <label="">
                                                                                    <b>TOTAL
                                                                                        OF
                                                                                        PART
                                                                                        I(A+B)</b></label>
                                                                                    <input type="text"
                                                                                        class="form-control" id="LTotal"
                                                                                        name="LTotal"
                                                                                        placeholder="Total A+B" />

                                                                                    <br>

                                                                                    <br><br>
                                                                                    <script type="text/javascript">
                                                                                    function ShowHideDiv() {
                                                                                        var chkYes =
                                                                                            document
                                                                                            .getElementById(
                                                                                                "chkYes"
                                                                                            );
                                                                                        var jbamount =
                                                                                            document
                                                                                            .getElementById(
                                                                                                "jbamount"
                                                                                            );
                                                                                        jbamount
                                                                                            .style
                                                                                            .display =
                                                                                            chkYes
                                                                                            .checked ?
                                                                                            "block" :
                                                                                            "none";
                                                                                    }
                                                                                    </script>

                                                                                    <span>Joining
                                                                                        Bonus</span>
                                                                                    <label for="chkYes">
                                                                                        <input type="radio" id="chkYes"
                                                                                            name="chkPassPort"
                                                                                            value="yes"
                                                                                            onclick="ShowHideDiv()" />
                                                                                        Yes
                                                                                    </label>
                                                                                    <label for="chkNo">
                                                                                        <input type="radio" id="chkNo"
                                                                                            name="chkPassPort"
                                                                                            value="no"
                                                                                            onclick="ShowHideDiv()" />
                                                                                        No
                                                                                    </label>
                                                                                    <hr />
                                                                                    <div id="jbamount"
                                                                                        style="display: none">
                                                                                        Joining
                                                                                        Bonus :
                                                                                        <input type="text"
                                                                                            name="jbamount"
                                                                                            id="jbamount" />
                                                                                    </div>

                                                                                    <br>







                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6"><input type="submit" name="submit" value="Export to PDF"></div>
                            <!-- <div class="col-lg-6"><a href="doc2.php">Export to Word</a></div> -->

                        </div>

                    </div>


                </div>
            </div>
        </div>
        </div>
    </form><br><br>

    <!-- <form method="post" action="doc2.php"><a href="doc2.php">Preview</a></form> -->

</body>

</html>