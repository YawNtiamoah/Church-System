<?php
	include 'layouts/top.php';

	//manager details
	
	//new client code
	
?>
<script>  
 $(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"select.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      fetch_data();  
      $(document).on('click', '#btn_add', function(){  
           var name = $('#name').text();  
           var username = $('#username').text();
		   var password = $('#password').text();
		   var branch = $('#branch').text();
		    var district = $('#district').text();
			 var region = $('#region').text();
		    var department = $('#department').text();
			 var uni = $('#uni').text();
		   var access_level = $('#access_level').text();  
           if(name == '')  
           {  
                alert("Enter FullName");  
                return false;  
           }  
           if(username == '')  
           {  
                alert("Enter username");  
                return false;  
           }  
		    if(password == '')  
           {  
                alert("Enter password");  
                return false;  
           }  
           if(branch == '')  
           {  
                alert("Enter Branch");  
                return false;  
           } 
		    if(district == '')  
           {  
                alert("Enter District");  
                return false;  
           } 
		    if(region == '')  
           {  
                alert("Enter Region");  
                return false;  
           } 
		    if(department == '')  
           {  
                alert("Enter Department");  
                return false;  
           } 
		    if(uni == '')  
           {  
                alert("Enter Unit");  
                return false;  
           }  
		    if(access_level == '')  
           {  
                alert("Enter Access Level");  
                return false;  
           }  
           $.ajax({  
                url:"insert.php",  
                method:"POST",  
                data:{name:name, username:username, password:password, branch:branch, district:district, region:region, department:department, uni:uni, access_level:access_level},  
                dataType:"text",  
                success:function(data)  
                {  
                     alert("User credential saved");  
                     fetch_data();  
                }  
           })  
      });  
   
      $(document).on('blur', '.name', function(){  
           var id = $(this).data("id1");  
           var first_name = $(this).text();  
          // edit_data(id, first_name, "first_name");  
      });  
      $(document).on('blur', '.username', function(){  
           var id = $(this).data("id2");  
           var last_name = $(this).text();  
         //  edit_data(id,last_name, "last_name");  
      });  
	  $(document).on('blur', '.password', function(){  
           var id = $(this).data("id3");  
           var first_name = $(this).text();  
          // edit_data(id, first_name, "first_name");  
      });  
      $(document).on('blur', '.branch', function(){  
           var id = $(this).data("id4");  
           var last_name = $(this).text();  
         //  edit_data(id,last_name, "last_name");  
      });  
	   $(document).on('blur', '.department', function(){  
           var id = $(this).data("id5");  
           var last_name = $(this).text();  
         //  edit_data(id,last_name, "last_name");  
      });  
	   $(document).on('blur', '.uni', function(){  
           var id = $(this).data("id6");  
           var last_name = $(this).text();  
         //  edit_data(id,last_name, "last_name");  
      });  
	  $(document).on('blur', '.access_level', function(){  
           var id = $(this).data("id7");  
           var first_name = $(this).text();  
          // edit_data(id, first_name, "first_name");  
      });  
     
      $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id8");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"delete_client.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      });  
 });  
 </script>  
	
	
	  	<div class="row">
		    <br /><h3 align="center">New Client</h3>
		    <div class="col-md-20">
                <br />  
                <br />  
                <br />  
                <div class="table-responsive" style="width:100% !important; height:100% !important;">  
                     <h3 align="center">Live Table </h3><br />  
                     <div id="live_data" ></div>                 
                </div>  
           </div>  
	  </div>

<?php
	include 'layouts/bottom.php';
?>
