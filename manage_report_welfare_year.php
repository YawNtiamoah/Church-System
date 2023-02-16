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
                              url:"fetch_welfare_all.php",
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
                     url:"fetch_welfare_report.php",  
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
                     url:"fetch_welfare_all.php",  
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
          <a class="btn btn-success" href="#"><span class="fa fa-user"></span> Account List</a>
        </div>
        <div class="col-md-6" align="right"> <form class="navbar-form navbar-left" role="search" action="fetch_welfare_year.php">
                  <div class="form-group" align="right">
                    <input type="text" name="search_text" id="search_text" autofocus class="form-control" placeholder="Search For welfare">
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
