<?php
	include 'layouts/top.php';
 
?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
         <form class="navbar-form navbar-right" role="search">
                  <div class="form-group" align="right">
                    <input type="text" name="search_text" value="" id="search_text" autofocus="" class="form-control" placeholder="Search For Client">
                  </div>
            </form>
        </div>
    </div>
</div>
<div id="result"></div>
 <script>
		$(document).ready(function(){
         
                          var q=$("#search_text").val();
			
                          $.ajax({
                              type:"post",
                              url:"fetch_all_client.php",
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
                     url:"fetch_clients.php",  
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
           {  
                $.ajax({  
                     url:"fetch_all_client.php",  
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
<?php
	include 'layouts/bottom.php';
?>
