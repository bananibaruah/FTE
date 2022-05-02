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
    $(document).ready(function() {
        var y = 0;
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
            if (hike <= 81) {
                ra = (ctc - old_check) / 12;
            } else {
                ra = 0;
            }

        });
        $("#basicp").on("keyup", function() {
            var x = $("#basicp").val();
            var ctc = $("#ctc").val(); //ctc
            oc1 = $("#oldctc").val(); //old ctc
            if (ctc != "") {
                if (x >= 5 && x <= 50) {
                    $("#al1").css('display', 'none');
                    y = (ctc * (x / 100)) / 12;

                    hr = y / 2;

                    ca = 1600;

                    ta1 = y + hr + ca + total_state + total_grade;

                    var y_12 = y / 12;
                    var total_y_12 = 0;
                    var pf = 0;
                    var pf1 = 0;
                    if (y_12 <= 15000) {
                        total_y_12 = y_12 * (12 / 100);
                        pf = total_y_12 * 12;
                        pf1 = pf * 12;
                        $("#PF").val(pf1);

                    } else {
                        y_12 = ta1 - hr;
                        if (y_12 > 15000) {
                            y_12 = 1800;
                            total_y_12 = y_12 * 12;
                            pf = total_y_12 * 12;
                            pf1 = pf * 12;
                            $("#PF").val(pf1);
                        } else {
                            total_y_12 = y_12 * (12 / 100);
                            pf = total_y_12 * 12;
                            pf1 = pf * 12;
                            $("#PF").val(pf1);


                        }

                    }

                    gt = (y / 12);

                    var e_12 = 0;
                    var esic = 0;
                    var total_esic = 0;
                    var e_12 = ta1 / 12;
                    esic = e_12;
                    if (esic < 21000) {
                        total_esic = 0;
                        $("#ESIC").val(total_esic);
                    } else {
                        total_esic = e_121 - ca * (3.25 / 100) * 12;
                        $("#ESIC").val(total_esic);
                    }

                    tb1 = pf + gt + total_esic;


                    valtab = 0;
                    valtab1 = 0;
                    valtab = w + ta1 + tb1;
                    valtab1 = valtab * 12;


                    e1 = ctc - valtab1;
                    e = Math.round(e1 / 12); //monthly e

                    ta2 = Math.round(ta1 + e);

                    tb2 = Math.round(tb1);

                    total2 = Math.round(ta2 + tb2);

                    ctotal = Math.round(w + total2);



                    $("#basic").val(y * 12);
                    $("#hra").val(hr * 12);
                    $("#Conveyance_Allowance")
                        .val(ca * 12);
                    $("#Statutory_Bonus").val(total_state * 12);
                    $("#gratuity")
                        .val(Math.round(gt * 12));
                    $("#Total_B").val(tb2 * 12);
                    $(
                        "#Executive_Allowance").val(e * 12);
                    $("#Retention_Allowance").val(ra *
                        12);
                    $("#Total_A").val(ta2 * 12);
                    $("#LTotal").val(total2 * 12);
                    $("#TOTAL").val(ctotal * 12);


                } else {
                    $("#basic").val('0');
                    $("#al1").css('display', 'inline-block');
                }
            } else {
                alert('enter ctc first..');
            }

        });
        $("#ctc").on("keyup", function() {
            var ctc = $("#ctc").val();




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

                            <div class="col-lg-6">
                                <label=""><b>CODE</b></label>
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
                                            <label="">Pincode</label>
                                                <input type="text" class="form-control" id="Pincode" name="Pincode"
                                                    placeholder="Pincode" />
                                                <br>
                                                <label="">Start Date</label>
                                                    <input type="date" class="form-control" id="Sd" name="Sd"
                                                        placeholder="Start Date" />
                                                    <br>


                                                    <label=""><b>TARGETED CTC</b></label>
                                                        <input type="text" class="form-control" id="ctc" name="ctc"
                                                            placeholder="CTC" />
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
                                                            <br><br>

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

                                                                <label="">BASIC</label>
                                                                    <input type="text" class="form-control" id="basic"
                                                                        name="basic" placeholder="basic" readonly />
                                                                    <br>




                                                                    <label="">CONVEYANCE ALLOWANCE</label>
                                                                        <input type="text" class="form-control"
                                                                            id="Conveyance_Allowance"
                                                                            name="Conveyance_Allowance"
                                                                            placeholder="Conveyance_Allowance" />
                                                                        <br>

                                                                        <label="">LTA</label>
                                                                            <input type="text" class="form-control"
                                                                                id="lta" name="lta" placeholder="LTA" />
                                                                            <br>



                                                                            <label="">FOOD
                                                                                ALLOWANCE</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="Food_Allowance"
                                                                                    name="Food_Allowance"
                                                                                    placeholder="Food Allowance" />

                                                                                <br>


                                                                                <label="">ATTIRE
                                                                                    ALLOWANCE</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
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
                                                                                            placeholder="DRIVER REIMBURSEMENT" />

                                                                                        <br>
                                                                                        <label="">
                                                                                            <b>TOTAL
                                                                                                A</b></label>
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                id="Total_A"
                                                                                                name="Total_A"
                                                                                                placeholder="Total_A" />

                                                                                            <br>
                                                                                            <label="">
                                                                                                ESIC</label>
                                                                                                <input type="text"
                                                                                                    class="form-control"
                                                                                                    id="ESIC"
                                                                                                    name="ESIC"
                                                                                                    placeholder="ESIC" />

                                                                                                <br>
                                                                                                <label="">
                                                                                                    <b>TOTAL
                                                                                                        B</b></label>
                                                                                                    <input type="text"
                                                                                                        class="form-control"
                                                                                                        id="Total_B"
                                                                                                        name="Total_B"
                                                                                                        placeholder="Total_B" />
                                                                                                    <br>
                                                                                                    <div class="row">
                                                                                                        <div
                                                                                                            class="col-lg-6">
                                                                                                            <label="">
                                                                                                                VARIABLE
                                                                                                                COMPONENTS*</label>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="col-lg-6">
                                                                                                            <select
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
                                                                                                        placeholder="VARIABLE  PAY" />
                                                                                                    <br>

                                                                                                    <label="">
                                                                                                        <b>COST
                                                                                                            TO
                                                                                                            COMPANY
                                                                                                            (PART
                                                                                                            I
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


                                            <label="">DOJ</label>
                                                <input type="date" class="form-control" id="doj" name="doj"
                                                    placeholder="DOJ" />
                                                <br>



                                                <label="">Position</label>
                                                    <input type="text" class="form-control" id="Position"
                                                        name="Position" placeholder="Position" />
                                                    <br>
                                                    <label=""><b>OLD CTC</b></label>
                                                        <input type="text" class="form-control" id="oldctc"
                                                            name="oldctc" placeholder="OLD CTC" />
                                                        <br>
                                                        <label=""><b>VARIABLE
                                                                PAY
                                                                PERCENATGE<small id="al2" style="display:none;"
                                                                    class="badge badge-danger">
                                                                    ( Enter %
                                                                    between 5
                                                                    to 50 )
                                                                </small></b></label>
                                                            <input type="number" class="form-control" id="vpp1"
                                                                name="vpp1" placeholder="VARIABLE PAY" />



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
                                                                <br><br>



                                                                <label="">HRA</label>
                                                                    <input type="text" class="form-control" id="hra"
                                                                        name="hra" placeholder="hra" />
                                                                    <br>
                                                                    <label="">STATUTORY BONUS</label>
                                                                        <input type="text" class="form-control"
                                                                            id="Statutory_Bonus" name="Statutory_Bonus"
                                                                            placeholder="Statutory_Bonus" />
                                                                        <br>

                                                                        <label="">EXECUTIVE
                                                                            ALLOWANCE</label>
                                                                            <input type="text" class="form-control"
                                                                                id="Executive_Allowance"
                                                                                name="Executive_Allowance"
                                                                                placeholder="Executive_Allowance" />

                                                                            <br>
                                                                            <label="">MOBILE
                                                                                CHARGES
                                                                                REIMBURSEMENT</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="m_c_r" name="m_c_r"
                                                                                    placeholder="MOBILE CHARGES REIMBURSEMENT" />

                                                                                <br>

                                                                                <label="">
                                                                                    VEHICLE
                                                                                    REIMBURSEMENT</label>
                                                                                    <input type="text"
                                                                                        class="form-control" id="vr"
                                                                                        name="vr"
                                                                                        placeholder="VEHICLE REIMBURSEMENT" />

                                                                                    <br>

                                                                                    <label="">
                                                                                        RETENTION
                                                                                        ALLOWANCE</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="Retention_Allowance"
                                                                                            name="Retention_Allowance"
                                                                                            placeholder="Retention Allowance" />

                                                                                        <br>



                                                                                        <label="">
                                                                                            PF</label>
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                id="PF" name="PF"
                                                                                                placeholder="PF" />

                                                                                            <br>


                                                                                            <label="">
                                                                                                GRATUITY</label>
                                                                                                <input type="text"
                                                                                                    class="form-control"
                                                                                                    id="gratuity"
                                                                                                    name="gratuity"
                                                                                                    placeholder="Gratuity" />

                                                                                                <br>

                                                                                                <label="">
                                                                                                    <b>TOTAL
                                                                                                        OF
                                                                                                        PART
                                                                                                        I(A+B)</b></label>
                                                                                                    <input type="text"
                                                                                                        class="form-control"
                                                                                                        id="LTotal"
                                                                                                        name="LTotal"
                                                                                                        placeholder="Total A+B" />

                                                                                                    <br>



                                                                                                    <label="">
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