<?php
	include 'layouts/top.php';
?>
<script>  
 $(document).ready(function(){  
      $('#search_text').keyup(function(){  
           var txt = $(this).val();  
           if(txt != '')  
           {  
                $.ajax({  
                     url:"fetch_district_managers.php",  
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
                $('#result').html('');                 
           }  
      });
 });  
 </script>
<div class="container">
    <div class="row">
        <div class="col-md-6">
          <a class="btn btn-success" href="new_district_manager.php"><span class="fa fa-user"></span> New District Manager</a>
        </div>
        <div class="col-md-6" align="right"> <form class="navbar-form navbar-left" role="search">
                  <div class="form-group" align="right">
                    <input type="text" name="search_text" id="search_text" autofocus="" class="form-control" placeholder="Search For User">
                  </div>
                </form>
        </div>
    </div>
</div>
<div id="result"></div>

<?php
	include 'layouts/bottom.php';
?>
