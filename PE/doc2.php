<?php require_once('config.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>How to Export HTML to Word Document with JavaScript | jQuerypost.com | jQuery Plugin</title>

</head>
<style type="text/css">
#source-html {
    border: 2px solid;
    max-width: 300px;
    margin: 0px auto;
    padding: 10px;
}

.content-footer {
    text-align: center;
    margin: 10px 0px;
}

.content-footer button {
    padding: 10px;
}
</style>

<body>
    <div class="source-html-outer">
        <div id="source-html">

            <p>
            <form action="index.php"><span id="hike" class="badge badge-danger">
                    Hike %
                    <?php echo $hike; ?>
                </span>

                here
                <br>
            </form>

            </p>
        </div>
        <div class="content-footer">
            <button id="btn-export" onclick="exportHTML();">Export to word doc</button>
        </div>
    </div>

    <script>
    function exportHTML() {
        var header = "<html xmlns:o='urn:schemas-microsoft-com:office:office' " +
            "xmlns:w='urn:schemas-microsoft-com:office:word' " +
            "xmlns='http://www.w3.org/TR/REC-html40'>" +
            "<head><meta charset='utf-8'><title>Export HTML to Word Document with JavaScript</title></head><body>";
        var footer = "</body></html>";
        var sourceHTML = header + document.getElementById("source-html").innerHTML + footer;

        var source = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(sourceHTML);
        var fileDownload = document.createElement("a");
        document.body.appendChild(fileDownload);
        fileDownload.href = source;
        fileDownload.download = 'document.doc';
        fileDownload.click();
        document.body.removeChild(fileDownload);
    }
    </script>
</body>

</html>