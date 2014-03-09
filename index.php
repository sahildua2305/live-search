<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>live search using jquery ajax</title>
<script type="text/javascript" src="jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript">
$(document).ready(function()
{
  $("#keywords").keyup(function()
  {
    var kw = $("#keywords").val();
	if(kw != '')  
	 {
	  $.ajax
	  ({
	     type: "POST",
		 url: "search.php",
		 data: "kw="+ kw,
		 success: function(option)
		 {
		   $("#results").html(option);
		 }
	  });
	 }
	 else
	 {
	   $("#results").html("");
	 }
	return false;
  });
  
   $(".overlay").click(function()
   {
     $(".overlay").css('display','none');
	 $("#results").css('display','none');
   });
   $("#keywords").focus(function()
   {
     $(".overlay").css('display','block');
     $("#results").css('display','block');
   });
});


</script>
</head>
<body>
<div class="ajax_body">
  <div id="inputbox">
    <input type="text" id="keywords" name="keywords" value="" placeholder="Type Your Query..."/>
  </div>
</div>
<div id="results"></div>
<div class="overlay"></div>
</body>
</html>
