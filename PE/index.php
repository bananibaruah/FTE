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
        var cb = 0;
        var hr = 0;
        var ca = 0;
        var sb = 0;
        var ta = 0;
        var pf = 0;
        var tb = 0;
        var t = 0;
        var e = 0;
        var fta = 0;
        var ft = 0;
        var oldctc = 0;
        var bonus = 0;
        var lta = 0;
        var mcr = 0;
        var ra = 0;
        var esic = 0;
        var gratuity = 0;
        var vp = 0;
        var vp1 = 0;
        var strb = 0;
        var si = 0;
        var rba = 0;
        var Total_II = 0;
        var hike = 0;
        var check = 0;


        $("#ctc").on("keyup", function() {
            var ctc = $("#ctc").val();

            cb = (40 / 100) * ctc;
            $("#basic").val(cb);

            hr = ((cb / 2));
            $("#hra").val((hr));

            ca = ((1600 * 12));
            $("#Conveyance_Allowance").val((ca));

            sb = ((3214 * 12));
            $("#Statutory_Bonus").val((sb));

            ta = ((cb + hr + bonus + ca + sb + lta + mcr + ra));
            $("#A_Total").val((ta));

            pf = (12 / 100) * cb;
            $("#PF").val(pf);

            tb = ((pf + 0));
            $("#Total_B").val(tb);

            t = ((ta + tb));
            $("#LTotal").val(t);

            e = (ctc - t);
            $("#Executive_Allowance").val(e);

            fta = ((cb + hr + bonus + ca + sb + e + lta + mcr + ra));
            $("#Total_A").val(fta);

            ft = ((fta + tb))
            $("#TOTAL").val((ft))

            hike = (ctc - oldctc)
            $("#HIKE").val((hike))

            check = (oldctc * 1.8)
            $("#check").val((check))

            ra = (ctc - check)
            $("#ra").val((ra))

            gratuity = (basic / 12)
            $("#gratuity").val((gratuity))





        });


        $("hra").focus(function() {

            var basic = $("#basic").val();

            alert(basic);

            cb = basic / 2;
            $("#hra").val(cb);

            alert(cb);

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
                                <label="">CODE</label>
                                    <input type="text" class="form-control" id="Code" name="Code" placeholder="Code" />
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
                                            <label="">State</label>
                                                <input type="text" class="form-control" id="state" name="state"
                                                    placeholder="State" />
                                                <br>

                                                <label="">End Date</label>
                                                    <input type="date" class="form-control" id="ed" name="ed"
                                                        placeholder="End Date" />
                                                    <br>
                                                    <label="">DOJ</label>
                                                        <input type="date" class="form-control" id="doj" name="doj"
                                                            placeholder="DOJ" />
                                                        <br>
                                                        <label="">OLD CTC</label>
                                                            <input type="text" class="form-control" id="oldctc"
                                                                name="oldctc" placeholder="OLD CTC" />
                                                            <br>
                                                            <label="">BASIC PERCENTAGE</label>
                                                                <input type="text" class="form-control" id="basicp"
                                                                    name="basicp" placeholder="basicp" />
                                                                <br>
                                                                <label="">BASIC</label>
                                                                    <input type="text" class="form-control" id="basic"
                                                                        name="basic" placeholder="basic" />
                                                                    <br>


                                                                    <label="">HRA</label>
                                                                        <input type="text" class="form-control" id="hra"
                                                                            name="hra" placeholder="hra"
                                                                            onfocus="calhra()" />
                                                                        <br>


                                                                        <label="">CONVEYANCE ALLOWANCE</label>
                                                                            <input type="text" class="form-control"
                                                                                id="Conveyance_Allowance"
                                                                                name="Conveyance_Allowance"
                                                                                placeholder="Conveyance_Allowance" />
                                                                            <br>
                                                                            <label="">STATUTORY BONUS</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="Statutory_Bonus"
                                                                                    name="Statutory_Bonus"
                                                                                    placeholder="Statutory_Bonus" />
                                                                                <br>
                                                                                <label="">MOBILE CHARGES
                                                                                    REIMBURSEMENT</label>
                                                                                    <input type="text"
                                                                                        class="form-control" id="mcr"
                                                                                        name="mcr"
                                                                                        placeholder="MOBILE CHARGES REIMBURSEMENT" />

                                                                                    <br>

                                                                                    <label="">TOTAL A</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="Total_A" name="Total_A"
                                                                                            placeholder="Total_A" />

                                                                                        <br>
                                                                                        <label="">ESIC</label>
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                id="esic" name="esic"
                                                                                                placeholder="ESIC" />

                                                                                            <br>
                                                                                            <label="">TOTAL B</label>
                                                                                                <input type="text"
                                                                                                    class="form-control"
                                                                                                    id="Total_B"
                                                                                                    name="Total_B"
                                                                                                    placeholder="Total_B"
                                                                                                    onfocus="calhra()" />
                                                                                                <br>
                                                                                                <label="">VARIABLE
                                                                                                    PAY</label>
                                                                                                    <input type="text"
                                                                                                        class="form-control"
                                                                                                        id="vp"
                                                                                                        name="vp"
                                                                                                        placeholder="VARIABLE  PAY"
                                                                                                        onfocus="calhra()" />
                                                                                                    <br>
                                                                                                    <label="">SALES
                                                                                                        INCENTIVE</label>
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            class="form-control"
                                                                                                            id="si"
                                                                                                            name="si"
                                                                                                            placeholder="SALES INCENTIVE"
                                                                                                            onfocus="calhra()" />
                                                                                                        <br>
                                                                                                        <label="">TOTAL
                                                                                                            OF
                                                                                                            PART
                                                                                                            II</label>
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                class="form-control"
                                                                                                                id="Total_II"
                                                                                                                name="Total_II"
                                                                                                                placeholder="TOTAL OF PART II"
                                                                                                                onfocus="calhra()" />
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
                                                    <label="">GRADE</label>
                                                        <input type="text" class="form-control" id="grade" name="grade"
                                                            placeholder="grade" />
                                                        <br>
                                                        <label="">TARGETED CTC</label>
                                                            <input type="text" class="form-control" id="ctc" name="ctc"
                                                                placeholder="CTC" />
                                                            <br>
                                                            <label="">VARIABLE PAY PERCENATGE</label>
                                                                <input type="text" class="form-control" id="vpp1"
                                                                    name="vpp1" placeholder="VARIABLE PAY" />

                                                                <br>
                                                                <label="">VARIABLE PAY</label>
                                                                    <input type="text" class="form-control" id="vp1"
                                                                        name="vp1" placeholder="VARIABLE PAY" />

                                                                    <br>


                                                                    <label="">BONUS</label>
                                                                        <input type="text" class="form-control"
                                                                            id="bonus" name="bonus"
                                                                            placeholder="bonus" />
                                                                        <br>
                                                                        <label="">LTA</label>
                                                                            <input type="text" class="form-control"
                                                                                id="lta" name="lta" placeholder="LTA" />
                                                                            <br>

                                                                            <label="">EXECUTIVE ALLOWANCE</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="Executive_Allowance"
                                                                                    name="Executive_Allowance"
                                                                                    placeholder="Executive_Allowance" />

                                                                                <br>
                                                                                <label="">RETENTION ALLOWANCE</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="Retention_Allowance"
                                                                                        name="Retention_Allowance"
                                                                                        placeholder="Retention Allowance" />

                                                                                    <br>
                                                                                    <label="">PF</label>
                                                                                        <input type="text"
                                                                                            class="form-control" id="pf"
                                                                                            name="pf"
                                                                                            placeholder="PF" />

                                                                                        <br>
                                                                                        <label="">GRATUITY</label>
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                id="Gratuity"
                                                                                                name="Gratuity"
                                                                                                placeholder="Gratuity" />

                                                                                            <br>
                                                                                            <label="">TOTAL OF PART
                                                                                                I(A+B)</label>
                                                                                                <input type="text"
                                                                                                    class="form-control"
                                                                                                    id="Total_A_B"
                                                                                                    name="Total_A_B"
                                                                                                    placeholder="Total A+B" />

                                                                                                <br>

                                                                                                <label="">SHORT TERM
                                                                                                    RETENTION
                                                                                                    BONUS</label>
                                                                                                    <input type="text"
                                                                                                        class="form-control"
                                                                                                        id="strb"
                                                                                                        name="strb"
                                                                                                        placeholder="SHORT TERM RETENTION BONUS" />
                                                                                                    <br>
                                                                                                    <label="">RETENTION
                                                                                                        BONUS/ALLOWANCE</label>
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            class="form-control"
                                                                                                            id="rba"
                                                                                                            name="rba"
                                                                                                            placeholder="RETENTION BONUS/ALLOWANCE" />
                                                                                                        <br>
                                                                                                        <label="">
                                                                                                            COST TO
                                                                                                            COMPANY
                                                                                                            (PART I+
                                                                                                            PART
                                                                                                            II)</label>
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