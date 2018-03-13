<?php
session_start();

if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
	header ("Location: index.php?msg=Password");
}

$receptor=$_GET["receptor"];
$emisor=$_GET["emisor"];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../favicon.ico">

    <title>Chat</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/animate.css">
    <!-- Bootstrap CSS
    <link href="css/estilo.css" rel="stylesheet"> -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<body>
    &nbsp;
    <div style="border-right: lightslategray thin solid; border-top: lightslategray thin solid;
        border-left: lightslategray thin solid; width: 500px; border-bottom: lightslategray thin solid;
        height: 500px">
        <table style="width:100%; height:100%">
            <tr>
                <td colspan="2" style="font-weight: bold; font-size: 16pt; color: blue; font-family: verdana, arial;
                    text-align: center">
                    Chat</td>
            </tr>
            <tr>
                <td colspan="2" style="font-weight: bold; font-size: 16pt; color: blue; font-family: verdana, arial;
                    text-align: left">
                    <table style="font-size: 12pt; color: black; font-family: Verdana, Arial">
                        <tr>
                            <td style="width: 100px">
                                Emisor(Tu):</td>
                            <td style="width: 100px"><input id="txtemisor" readonly style="width: 150px" type="text" name="emisor" value="<?php echo $emisor ?>"/></td>
                        </tr>
                         <tr>
                            <td style="width: 100px">
                                Receptor:</td>
                            <td style="width: 100px"><input id="txtreceptor" readonly style="width: 150px" type="text" name="receptor" value="<?php echo $receptor ?>"/>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: middle;" valign="middle" colspan="2">
                    <div style="width: 480px; height: 400px; border-right: darkslategray thin solid; border-top: darkslategray thin solid; font-size: 10pt; border-left: darkslategray thin solid; border-bottom: darkslategray thin solid; font-family: verdana, arial; overflow:scroll; text-align: left;" id="DIV_CHAT">
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 310px">
                    <input id="txtmsg" style="width: 350px" type="text" name="msg" /></td>
                <td style="width: 85px">
                    <input id="Submit2" style="font-family: verdana, arial" type="button" value="Send" onclick="set_chat_msg()"/></td>
            </tr>
            <tr>
                <td colspan="1" style="font-family: verdana, arial; text-align: center; width: 350px;">
                    </td>
                <td colspan="1" style="width: 85px; font-family: verdana, arial; text-align: center">
                </td>
            </tr>
        </table>
    </div>
    
<script type="text/javascript">

var t = setInterval(function(){get_chat_msg()},5000);


//
// General Ajax Call
//
      
var oxmlHttp;
var oxmlHttpSend;
function get_chat_msg()
{

    if(typeof XMLHttpRequest != "undefined")
    {
        oxmlHttp = new XMLHttpRequest();
    }
    else if (window.ActiveXObject)
    {
       oxmlHttp = new ActiveXObject("Microsoft.XMLHttp");
    }
    if(oxmlHttp == null)
    {
        alert("Browser does not support XML Http Request");
       return;
    }
    
    
    oxmlHttp.onreadystatechange = get_chat_msg_result;
    oxmlHttp.open("GET","chat_recv_ajax.php",true);
    oxmlHttp.send(null);
}
     
function get_chat_msg_result()
{
    if(oxmlHttp.readyState==4 || oxmlHttp.readyState=="complete")
    {
        if (document.getElementById("DIV_CHAT") != null)
        {
            document.getElementById("DIV_CHAT").innerHTML =  oxmlHttp.responseText;
            oxmlHttp = null;
        }
        var scrollDiv = document.getElementById("DIV_CHAT");
        scrollDiv.scrollTop = scrollDiv.scrollHeight;
    }
}

      
function set_chat_msg()
{

    if(typeof XMLHttpRequest != "undefined")
    {
        oxmlHttpSend = new XMLHttpRequest();
    }
    else if (window.ActiveXObject)
    {
       oxmlHttpSend = new ActiveXObject("Microsoft.XMLHttp");
    }
    if(oxmlHttpSend == null)
    {
       alert("Browser does not support XML Http Request");
       return;
    }
    
    var url = "chat_send_ajax.php";
    var stremisor="noname";
    var strreceptor="noname";
    var strmsg="";
    
    
    if (document.getElementById("txtemisor") != null)
    {
        stremisor = document.getElementById("txtemisor").value;
        document.getElementById("txtemisor").readOnly=true;
    }
    
    if (document.getElementById("txtreceptor") != null)
    {
        strreceptor = document.getElementById("txtreceptor").value;
        document.getElementById("txtreceptor").readOnly=true;
    }
    
    
    if (document.getElementById("txtmsg") != null)
    {
        strmsg = document.getElementById("txtmsg").value;
        document.getElementById("txtmsg").value = "";
    }
    
    url += "?emisor=" + stremisor + "&receptor=" + strreceptor+ "&msg=" + strmsg;
    oxmlHttpSend.open("GET",url,true);
    oxmlHttpSend.send(null);
}

</script>


</body>
</html>
