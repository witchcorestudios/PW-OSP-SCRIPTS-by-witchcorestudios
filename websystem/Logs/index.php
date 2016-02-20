<!DOCTYPE html>
<head>

<style>
<center>
table
{
    padding: 5px 5px 0px 5px;
    text-decoration:none;
}
 
a
{
    text-decoration:none;
}
 
h3
{
    padding: 5px 0px 5px 0px;
    color:#000;
}
 
tr
{
    height: 20px;
}
 
/*
    make elements with this class appear like a link
    we need to request the filename that these elements contain with ajax, so we _dont_ want a real link.
*/
.fileLink
{
    color: blue;
    cursor: pointer;
}
 
.fileLink:hover
{
    text-decoration: underline;
}
 
/* rule for the name of the file currently being edited */
#editingFilename
{
    color: #f90;   /* CP-orange text */
    font-weight: bold;
}
</center>
</style>
 
<script>
 
function requestUrlWithAjax(url)
{
    var xmlhttp;
 
    //1. create the xmlhttp object
 
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
 
    //2. assign the handler for the onchange event of the object
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            // we arrive here when we have successfully retrieved  the url we asked for
            //1. Set the response text to the text area's value
            document.getElementById('ajaxResultTarget').value = xmlhttp.responseText;

            //2. copy the name of the file retrieved directly above the text-area
            document.getElementById('editingFilename').innerHTML = url;

            //3. set the filename to the hidden input - see line 199
//          document.getElementById('frmFileName').value = url;

 
            //4. scroll the document down to editingFilename - just above the text-area
            var xPos, yPos, tgtElem;
            tgtElem = document.getElementById('editingFilename');
            xPos = 0;
            yPos = tgtElem.offsetTop;
            window.scrollTo(xPos, yPos);
        }
    }
 
    //3. specify a GET request for the indicated filename,
    //   set asynchronous to true (dont wait for the send method to complete before continuing)
    xmlhttp.open("GET",url,true);
 
    //4. make the request
    xmlhttp.send();
}
 
</script>
 

</head>
 
<body>
<link rel="stylesheet" type="text/css" href="astyle.css">
<center>
<!--code show file cua thu muc-->
 
        <?php echo "<h2>LIST OF FILES</h2>";
        // directory
        $dir = "";
 
        // Opens directory
        $myDirectory=opendir(".");
 
        // Gets each entry
        while($entryName=readdir($myDirectory))
        {
            $dirArray[]=$entryName;
        }
 
        // Finds extensions of files
        function findexts ($filename)
        {
            $filename=strtolower($filename);//chuyen sang chu thuong
            $exts=split("[/\\.]", $filename);//cat chuoi
            $n=count($exts)-1;
            $exts=$exts[$n];
            return $exts;
        }
 
        // Closes directory
        closedir($myDirectory);
 
        // Counts elements in array
        $indexCount=count($dirArray);
 
        // Sorts files
        sort($dirArray);
 
        // Print list content directory
        print("<table border='1' cellpadding='5' cellspacing='0' class='whitelinks'>\n");
        print("<tr><th>Name</th><th>Type</th><th>Size</th><th>Date Modified</th></tr>\n");
        // Loops through the array of files
        for($index=0; $index < $indexCount; $index++)
        {
            if (substr("$dirArray[$index]", 0, 1) != ".")
            {
                //File name
                $name=$dirArray[$index];
                $namehref=$dirArray[$index];
 
                // Gets File Extensions
                $extn=findexts($dirArray[$index]);
 
                // File type
                switch ($extn)
                {
                    case "png": $extn="PNG Image"; break;
                    case "jpg": $extn="JPEG Image"; break;
                    case "bmp": $extn="BITMAP Image"; break;
                    case "gif": $extn="GIF Image"; break;
                    case "ico": $extn="Windows Icon"; break;
                    case "txt": $extn="Text File"; break;
                    case "log": $extn="Log File"; break;
                    case "htm": $extn="HTML File"; break;
                    case "php": $extn="PHP Script"; break;
                    case "js": $extn="Javascript"; break;
                    case "css": $extn="Stylesheet"; break;
                    case "pdf": $extn="PDF Document"; break;
                    case "zip": $extn="ZIP Archive"; break;
                    case "docx": $extn="Microsoft Word Document"; break;
                    case "mp3": $extn="MP# Format Sound"; break;
                    default: $extn=strtoupper($extn)." File"; break;
                }
 
                // Gets file size
                $size=number_format(filesize($dirArray[$index]))."&nbsp"."KB";
 
                // Gets Date Modified Data
                $modtime=date("M j Y g:i A", filemtime($dirArray[$index]));
                $timekey=date("YmdHis", filemtime($dirArray[$index]));
 
                print("
                <tr>
                <td class='fileLink' onclick='requestUrlWithAjax(this.innerHTML)'>$name</td>
                <td>$extn</td>
                <td>$size</td>
                <td>$modtime</td>
                </tr>");
            }
        }
        print("</table>\n");
?>
<br>
        <span>Current File: </span><span id='editingFilename'></span><br>
        <form name="form" method="get" width="1200px" action="">
<!--        <input type='hidden' name='fileName' id='frmFileName' readonly /> -->
        <textarea id='ajaxResultTarget' name="read_file" cols="110" rows="35" wrap="off">
        </textarea>
        </form>
</center>
</body>
</html>