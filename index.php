<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<link rel="shortcut icon" type="image/png" href="files/tn.png">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TN Reporting</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="files/bootstrap.css" rel="stylesheet">
     <!-- FONTAWESOME STYLES-->
    <link href="files/font-awesome.css" rel="stylesheet">
        <!-- CUSTOM STYLES-->
    <link href="files/custom.css" rel="stylesheet">
     <!-- GOOGLE FONTS-->
   <link href="files/css.css" rel="stylesheet" type="text/css">

	<!-- /. Datepicker  -->
    <link href="datepicker/bootstrap.css" rel="stylesheet">
    <link href="datepicker/datepicker.css" rel="stylesheet">
    <link href="datepicker/prettify.css" rel="stylesheet">

    	<!-- go down style -->
    	<link href="files/go_down_style.css" rel="stylesheet">

	<!-- /. SKIP  -->
	<script>
	function skip(el)
	{
		var table = el.getAttribute("table")
		var column = el.getAttribute("column")
		var date = el.getAttribute("date")

		var theUrl = "php/script_for_update_skip.php?table="+table+"&column="+column+"&date="+date;
    		var xmlHttp = null;
    		xmlHttp = new XMLHttpRequest();
    		xmlHttp.open( "GET", theUrl, false );
    		xmlHttp.send( null );

		date = document.getElementById("dp1").value;

		theUrl = "php/script_for_menu.php?date="+date;
    		xmlHttp.open( "GET", theUrl, false );
    		xmlHttp.send( null );
		document.getElementById("main-menu").innerHTML = xmlHttp.responseText;

		theUrl = "php/script_for_table.php?table="+table+"&date="+date;
    		xmlHttp.open( "GET", theUrl, false );
    		xmlHttp.send( null );
		document.getElementById("table").innerHTML = xmlHttp.responseText;
	}
	</script>

	<!-- /. MENU  -->
	<script>
	function menu(el)
	{
		var els = document.getElementsByClassName("active-menu");
		for(var i=0;i<els.length;i++){
			els[i].setAttribute("class", "");}
		el.setAttribute("class", "active-menu");

		var table = el.getAttribute("table")
		var date = document.getElementById("dp1").value;
    		
		var xmlHttp = null;
    		xmlHttp = new XMLHttpRequest();
   
		theUrl = "php/script_for_table.php?table="+table+"&date="+date;
    		xmlHttp.open( "GET", theUrl, false );
    		xmlHttp.send( null );
		document.getElementById("table").innerHTML = xmlHttp.responseText;

		theUrl = "php/script_for_menu.php?date="+date;
    		xmlHttp.open( "GET", theUrl, false );
    		xmlHttp.send( null );
		document.getElementById("main-menu").innerHTML = xmlHttp.responseText;
		$('*[table="'+table+'"]').addClass("active-menu");
	}
	</script>

	<!-- /. GET  -->
	<script>
	function get()
	{
		var table = $(".active-menu").attr('table');
		var date = document.getElementById("dp1").value;
    		
		var xmlHttp = null;
    		xmlHttp = new XMLHttpRequest();
   
		theUrl = "php/script_for_table.php?table="+table+"&date="+date;
    		xmlHttp.open( "GET", theUrl, false );
    		xmlHttp.send( null );
		document.getElementById("table").innerHTML = xmlHttp.responseText;

		theUrl = "php/script_for_menu.php?date="+date;
    		xmlHttp.open( "GET", theUrl, false );
    		xmlHttp.send( null );
		document.getElementById("main-menu").innerHTML = xmlHttp.responseText;
		$('*[table="'+table+'"]').addClass("active-menu");
	}
	</script>


</head>

<body>

	<!-- go down divs -->
	<div class="go-up" title="up" id='ToTop'>&uarr;</div>
	<div class="go-down" title="down" id='OnBottom'>&darr;</div>

    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">

             <div><div class="navbar-brand" href="#">WC Reporting</div>
		<img src="files/tn.png" style="width: 60px; height: 60px;"></div>

            </div>

 <!-- /. Datepicker  -->
 <div style="color: white; padding: 15px 110px 5px 50px; float: right; font-size: 16px;"> 
 Date : 
 <input type="text" class="span2" value="" id="dp1" style="width: 100px; margin-bottom: 0px;"> 
 <div onclick="get(this)" href="#" class="btn btn-danger square-btn-adjust">Get</div>
 </div>
     </nav>   
		
           <!-- /. NAV TOP  -->
            <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">

		<!-- /. MENU  -->
                <ul class="nav" id="main-menu">	
                </ul>

               <br><br>

            </div>
        </nav>
		
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
  
       <!-- /. BUG  -->
	<div id="table"> 
		<h5>Welcome to qa reporting... </h5> 
		<img style="-webkit-user-select: none" src="files/o85Y4qV.gif"> 
	</div>

			</div>
			
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="files/jquery-1.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="files/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="files/jquery.js"></script>

<!-- /. Datepicker  -->
<script>
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth()+1; //January is 0!
	if (mm<10){mm = "0"+mm;}
	var yyyy = today.getFullYear();
	document.getElementById('dp1').value = yyyy+"-"+mm+"-"+dd;
</script>


<!-- /. MENU  -->
<script>
 var date = $('#dp1').val();
 var response = '';
 $.ajax({ type: "GET",   
        url:"php/script_for_menu.php?date="+date,
        async: false,
        success : function(text)
           {
            response = text;
           }
  });
 $("#main-menu").html(response);
</script>

<!-- /. Datepicker  -->
<script src="datepicker/prettify.js"></script>
<script src="datepicker/jquery.js"></script>
<script src="datepicker/bootstrap-datepicker.js"></script>
<script>
	if (top.location != location) {
    top.location.href = document.location.href ;
  }
		$(function(){
			window.prettyPrint && prettyPrint();
			$('#dp1').datepicker({
				format: 'yyyy-mm-dd'
			});

        // disabling dates
        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

        var checkin = $('#dpd1').datepicker({
          onRender: function(date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function(ev) {
          if (ev.date.valueOf() > checkout.date.valueOf()) {
            var newDate = new Date(ev.date)
            newDate.setDate(newDate.getDate() + 1);
            checkout.setValue(newDate);
          }
          checkin.hide();
    
        }).data('datepicker');
        var checkout = $('#dpd2').datepicker({
          onRender: function(date) {
            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function(ev) {
          checkout.hide();
        }).data('datepicker');
		});
</script>

	<!-- go down script -->
	<script type="text/javascript">
	$(function(){
		if ($(window).scrollTop()>="250") $("#ToTop").fadeIn("slow")
		$(window).scroll(function(){
  			if ($(window).scrollTop()<="250") $("#ToTop").fadeOut("slow")
  			else $("#ToTop").fadeIn("slow")
			});
		if ($(window).scrollTop()<=$(document).height()-"999") $("#OnBottom").fadeIn("slow")
		$(window).scroll(function(){
  			if ($(window).scrollTop()>=$(document).height()-"999") $("#OnBottom").fadeOut("slow")
  			else $("#OnBottom").fadeIn("slow")
			});
	$("#ToTop").click(function(){$("html,body").animate({scrollTop:0},"slow")})
	$("#OnBottom").click(function(){$("html,body").animate({scrollTop:$(document).height()},"slow")})
	});
	</script>

</body></html>