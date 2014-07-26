<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
</script>
<script>
var urlres;
$(document).ready(function()
{
    $("#url").focusout(function()
    {
		//alert('adsa');
        //Check if usernane if available
        $.post("chk_url.php", {url:  $("#url").val()}, function(data)
        {

            	if(data  =='false')
            	{
					urlres=false;	
                }
                else
                {
                    urlres=true;
                }
            });
			alert(urlres);
            return false;
        });
    });
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<form action="">
<input name="url" type="text" id="url" />
</form>

</body>
</html>
