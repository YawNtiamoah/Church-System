<?php
	include 'layouts/top.php';

  //new district code
//  if (isset($_POST['btnSave'])) {
//    $district = new District;
//    $district->district_name = $database->prep($_POST['txtDistrictName']);
//    $district->region_name = $database->prep($_POST['txtRegion']);
//
//    $result = $district->new_district();
//    if($result){
//      $success = "NEW DISTRICT CREATED!!!";
//    }
//    else{
//      $failed = "FAILED TO SAVE DISTRICT!!!";
//    }
//
//  }
?>
<!--
<script>  
 $(document).ready(function(){  
      $('#search_text').keyup(function(){  
           var txt = $(this).val();  
           if(txt != '')  
           {  
                $.ajax({  
                     url:"fetch_districts.php",  
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
-->
<div class="container">
    <div class="row">
      <?php
        #if (isset($success)) {
      ?>
          <div class="col-md-4"></div>
          <div class="col-md-4 alert alert-success text-center"><?php #echo @$success; ?></div><br />
      <?php
       # }
        #elseif(isset($failed)){
      ?>
          <div class="col-md-4"></div>
          <div class="col-md-4 alert alert-danger text-center"><?php #echo @$failed; ?></div><br />
      <?php
        #}
      ?>
      </div>
    <div class="row">
        <div class="col-md-6">
          <a class="btn btn-success" href="" data-toggle="modal" data-target="#manage_offetory"><span class="fa fa-user"></span> New Offetory</a>
        </div>
        <div class="col-md-6" align="right"> <form class="navbar-form navbar-left" role="search">
                  <div class="form-group" align="right">
                    <input type="text" name="search_text" id="search_text" autofocus="" class="form-control" placeholder="Search For District">
                  </div>
                </form>
        </div>
    </div>
</div>
<div id="result"></div>

<div class="modal fade" id="manage_offetory">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New Offetory</h4>
      </div>
      <div class="modal-body">
        <form method="post">
          <div class="form-group">
            <label for="name">Received By*</label>
            <input type="text" class="form-control" id="name" placeholder="Enter Your Name" name="txtDistrictName" required >
          </div>
            <div class="form-group">
            <label for="name">Amount</label>
            <input type="text" class="form-control" id="name" placeholder="Enter Amount" name="txtDistrictName" required >
          </div>
            <div class="form-group">
            <label for="name">Date Entry</label>
            <input type="date" class="form-control" id="name" placeholder="Enter Amount" name="txtDistrictName" required >
          </div>

<!--
          <div class="form-group">
          <label for="contact">Select Region*</label>
          <select class="form-control" name="txtRegion">
              <option class="disabled">--Please Select A Region--</option>
                      <option value="Greater Accra Region">Greater Accra Region</option>
                      <option value="Ashanti Region">Ashanti Region</option>
                      <option value="Eastern Region">Eastern Region</option>
                      <option value="Western Region">Western Region</option>
                      <option value="Volta Region">Volta Region</option>
                      <option value="Central Region">Central Region</option>
                      <option value="Brong Ahafo Region">Brong Ahafo Region</option>
                      <option value="Northern Region">Northern Region</option>
                      <option value="Upper East Region">Upper East Region</option>
                      <option value="Upper West Region">Upper West Region</option>
           </select>
        </div>
-->
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="btnSave">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php
	include 'layouts/bottom.php';
?>
