<?php
	include 'layouts/top.php';
  $coll = User::find_by_id($_SESSION['user_id']);
  $collector = $database->fetch_array($coll);

?>
<script>
		$(document).ready(function(){
         
                          var q=$("#search_text").val();
			
                          $.ajax({
                              type:"post",
                              url:"fetch_all_event.php",
                              data:{search:q},
                              success:function(data){
								  console.log(data);
								 // var json = JSON.parse(data);
                                 $("#result").html(data);
								/* if(json['status'] == "200"){
									 	$(".reset-btn").click();
									 }
								 */
                              }
 
                          });
 
                  
					  });
		</script>
<script>  
 $(document).ready(function(){  
      $('#search_text').keyup(function(){  
           var txt = $(this).val();  
           if(txt != '')  
           {  
                $.ajax({  
                     url:"fetch_event.php",  
                     method:"post",  
                     data:{search:txt},  
                     dataType:"text",  
                     success:function(data)  
                     {  
                          $('#result').html(data);  
                     }  
                });  
           }  
           else  
           {   $.ajax({  
                     url:"fetch_all_event.php",  
                     method:"post",  
                     data:{search:txt},  
                     dataType:"text",  
                     success:function(data)  
                     {  
                          $('#result').html(data);  
                     }  
                });                 
           }  
      });
	     
 });  
 </script>
<div class="container">
    <div class="row">
        <div class="col-md-6">
          <a class="btn btn-success" href="new_client.php"><span class="fa fa-user"></span> Event List</a>
        </div>
        <div class="col-md-6" align="right"> <form class="navbar-form navbar-left" action="fetch_event_mon.php" role="search">
                  <div class="form-group" align="right">
                    <input type="text" name="search_text" id="search_text" autofocus class="form-control" placeholder="Search For Account">
                      <select class="form-control" id="mn" name="mn">
                      <option>--</option>
                       <option>01</option>
                        <option>02</option>
                         <option>03</option>
                          <option>04</option>
                          <option>05</option>
                           <option>06</option>
                        <option>07</option>
                         <option>08</option>
                          <option>09</option>
                          <option>10</option>
                           <option>11</option>
                            <option>12</option>
                   
                    </select>
                    <select class="form-control" id="yr" name="yr">
                      <option>--</option>
                      <option>2025</option>
                  <option>2024</option>
                  <option>2023</option>
                  <option>2022</option>
                  <option>2021</option>
                  <option>2020</option>
                  <option>2019</option>
                  <option>2018</option>
                  <option>2017</option>
                      <option>2016</option>
                  <option>2015</option>
                  <option>2014</option>
                  <option>2013</option>
                  <option>2012</option>
                  <option>2011</option>
                  <option>2010</option>
                  <option>2009</option>
                  <option>2008</option>
                  <option>2007</option>
                  <option>2006</option>
                  <option>2005</option>
                   <option>2004</option>
                    <option>2003</option>
                   <option>2002</option>
                    <option>2001</option>
                   <option>2000</option>
                    <option>1999</option>
                   <option>1998</option>
                    <option>1997</option>
                   <option>1996</option>
                    <option>1995</option>
                   <option>1994</option>
                    <option>1993</option>
                   <option>1992</option>
                    <option>1991</option>
                   <option>1990</option>
                   
                    </select>
                  </div>
                  
                </form>
        </div>
    </div>
</div>
<div id="result"></div>

<?php
	include 'layouts/bottom.php';
?>
