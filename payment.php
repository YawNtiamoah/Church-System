<?php
  include 'layouts/top.php';

  //getting collector details
  $coll = User::find_by_id($_SESSION['user_id']);
  $collector = $database->fetch_array($coll);
?>
<script>  
 $(document).ready(function(){  
      $('#search_text').keyup(function(){  
           var txt = $(this).val();  
           if(txt != '')  
           {  
                $.ajax({  
                     url:"fetch_clients_for_payment.php",  
                     method:"post",  
                     data:{search:txt, station_id:<?php echo $collector['station_id']; ?>},  
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
        <div class="col-md-6" align="right"> <form class="navbar-form navbar-left" role="search">
                  <div class="form-group" align="right">
                    <input type="text" name="search_text" id="search_text" autofocus="" class="form-control" placeholder="Search For Client">
                  </div>
                </form>
        </div>
    </div>
</div>
<div id="result"></div>

<?php
  include 'layouts/bottom.php';
?>
