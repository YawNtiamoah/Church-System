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
        <div class="col-md-6" align="right"> <form class="navbar-form navbar-left" action="fetch_event_day.php" role="search">
                  <div class="form-group" align="right">
                    <input type="text" name="search_text" id="search_text" autofocus class="form-control" placeholder="Search For Account">
                    <input type="date" name="day" id="day" autofocus class="form-control" placeholder="Search For Account">
               
                   <input type="submit" name="submit" id="sub" autofocus class="form-control">
                 
                  </div>
                  
                </form>
        </div>
    </div>
</div>
<div id="result"></div>

<?php
	include 'layouts/bottom.php';
?>
