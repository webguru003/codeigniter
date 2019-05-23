<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Dashboard - To do list</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="/to-do-list2/css/bootstrap.min.css" rel="stylesheet">
<link href="/to-do-list2/css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="/to-do-list2/css/font-awesome.css" rel="stylesheet">
<link href="/to-do-list2/css/style.css" rel="stylesheet">
<link href="/to-do-list2/css/pages/dashboard.css" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
   
</head>
<style>
.haserror {
	border: 1px solid red;
}
::-webkit-input-placeholder {
 color: #999999;
}

:-moz-placeholder {
 color: red;
}
 .alert-red-error {
    background-color: #fc5d61 !important;
    border: 1px solid #fc5d61 !important;
    color: #FFFFFF;
}
</style>
<body>

<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand"  >To do list </a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i> <?php echo $_SESSION['username']; ?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#myModal_profile"  data-toggle="modal">Profile</a></li>
              <li><a href="/to-do-list2/index.php/login/sessiondestroy">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li class="active"><a href="/to-do-list2/index.php/todolist"><i class="icon-dashboard"></i><span>To Do List</span> </a> </li>
        <li ><a href="/to-do-list2/index.php/types"><i class="icon-dashboard"></i><span>Types</span> </a> </li>
        <li><a href="/to-do-list2/index.php/login/sessiondestroy"><i class="icon-bar-chart"></i><span>Logout</span> </a> </li>
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row"> 
        
        <!-- /span6 -->
        <div class="span12">
          <div class="alert alert-success" id="successalert" style="display:none;">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Message</strong> Runs Successfully </div>
          <fieldset>
            <div class="control-group">
              <div class="controls"> 
                <!-- Button to trigger modal --> 
               <a href="#myModal" role="button" class="btn btn btn-success" data-toggle="modal" style="float:right; margin-bottom:5px;">Add New</a> <select name="sortingthis" id="sortingthis" style="margin: 0;width:150px; float:right;" >
                        	 <option value="">Select Sorting</option>
                        	 <option value="duedate asc">Deadline ASC</option>
                        	 <option value="duedate desc">Deadline DESC</option>
                        	 <option value="priority asc">Priority ASC</option>
                        	 <option value="priority desc">Priority DESC</option>
                         </select> 
         
         <div class="modal-body" style="margin: 0;padding: 0;">
                       
                       
                      <form name="searchform" id="searchform" style="margin:0px; padding:0px;"> 
                      <p>
                        
                        <input name="titlesearch" id="titlesearch" value="" placeholder="Type title to search" style="margin: 0; width:120px;" >
<select name="typesearch" id="typesearch" style="width:120px; margin:0px;" >
                         	 <option value="">Select type</option>
                       <?php //print_r($typelist);
					   foreach($typelist as $typelist_v)
						{ ?>
							 <option value="<?php echo $typelist_v->title;  ?>"><?php echo $typelist_v->title;  ?></option>
                        <?php } ?>
                        </select>                        <input name="duedatesearch" id="duedatesearch" value="" placeholder="select date" class="datepicker" style="margin: 0;width:120px;" >
                        <select name="prioritysearch" id="prioritysearch" style="margin: 0;width:120px;" >
                        	 <option value="">Select Priority</option>
                        	 <option value="Low">Low</option>
                        	 <option value="Medium">Medium</option>
                        	 <option value="High">High</option>
                        </select>
                        <button class="btn " id="searchtodolist" type="button">Search</button>
                      </p>
                       </form>
                    </div>
         
         
         
                
                <!-- Modal -->
                <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                  <form name="add-todolist" method="post" id="add-todolist" action="/to-do-list2/index.php/todolist/add_td_list">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h3 id="myModalLabel">Add To Do List</h3>
                    </div>
                    <div class="modal-body">
                      <p>
                        <label for="type">Type</label>
                       <select name="type" id="type" style="width:97%">
                        <?php //print_r($typelist);
					   foreach($typelist as $typelist_v)
						{ ?>
							 <option value="<?php echo $typelist_v->title;  ?>"><?php echo $typelist_v->title;  ?></option>
                        <?php } ?>
                        </select>
                      </p>
                      <p>
                        <label for="priority">priority</label>
                       <select name="priority" id="priority" style="width:97%">
                       	 <option value="Low">Low</option>
                       	 <option value="Medium">Medium</option>
                       	 <option value="High">High</option>
                        </select>
                      </p>
                      <p>
                        <label for="duedate">Due date</label>
                        <input name="duedate" id="duedate" class="datepicker" value="" style="width:97%">
                      </p>
                      <p>
                        <label for="title">Title</label>
                        <input name="title" id="title" value="" style="width:97%">
                      </p>
                      <p>
                        <label for="desc">Desc</label>
                        <textarea name="desc" id="desc" style="width:97%"></textarea>
                      </p>
                    </div>
                    <div class="modal-footer">
                      <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                      <a id="savechanges" class="btn btn-primary">Save changes</a> </div>
                  </form>
                </div>
                <div id="myModal_edit" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                  <form name="edit-todolist" method="post" id="edit-todolist" action="/to-do-list2/index.php/todolist/update_td_list">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h3 id="myModalLabel">Edit To Do List</h3>
                    </div>
                    <div class="modal-body">
                      <p>
                        <label for="type2">Type</label>
                       <select name="type2" id="type2" style="width:97%">
                        <?php //print_r($typelist);
					   foreach($typelist as $typelist_v)
						{ ?>
							 <option value="<?php echo $typelist_v->title;  ?>"><?php echo $typelist_v->title;  ?></option>
                        <?php } ?>
                        </select>
                      </p>
                         <p>
                        <label for="priority2">priority</label>
                       <select name="priority2" id="priority2" style="width:97%">
                       	 <option value="Low">Low</option>
                       	 <option value="Medium">Medium</option>
                       	 <option value="High">High</option>
                        </select>
                      </p>
                   <p>
                        <label for="duedate2">Due date</label>
                        <input name="duedate2" id="duedate2"  class="datepicker" value="" style="width:97%">
                      </p>
                      <p>
                        <label for="title2">Title</label>
                        <input name="id2" id="id2" value="" type="hidden" >
                        <input name="title2" id="title2" value="" style="width:97%">
                      </p>
                      <p>
                        <label for="desc2">Desc</label>
                        <textarea name="desc2" id="desc2" style="width:97%"></textarea>
                      </p>
                    </div>
                    <div class="modal-footer">
                      <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                      <a id="savechanges_edit" class="btn btn-primary">Save changes</a> </div>
                  </form>
                </div>
                <div id="myModal_profile" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                  <form name="edit-profile" method="post" id="edit-profile" action="/to-do-list2/index.php/login/update_profile">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h3 id="myModalLabel">Edit Profile</h3>
                    </div>
                    <div class="modal-body">
                    <div id="errorbox" class="alert alert-success"></div>
                      <p>
                        <label for="password3">Password</label>
                        <input name="id3" id="id3" value="<?php echo $_SESSION['id']; ?>" type="hidden" >
                        <input name="password3" id="password3" value="" style="width:97%" type="password">
                      </p>
                      <p>
                        <label for="rpassword3">Re-Type Password</label>
                        <input name="rpassword3" id="rpassword3" style="width:97%" type="password">
                      </p>
                    </div>
                    <div class="modal-footer">
                      <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                      <a id="savechanges_profile" class="btn btn-primary">Save</a> </div>
                  </form>
                </div>
                
                
                <div id="myModal_delete" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h3 id="myModalLabel">Are you sure you want to delete the list</h3>
                    </div>
                     
                    <div class="modal-footer">
                       <button class="btn" id="btndelete" data="" aria-hidden="true">Yes</button>
                       <button class="btn" data-dismiss="modal" aria-hidden="true">No</button>
                </div>
              </div>
              <!-- /controls --> 
            </div>
            <!-- /control-group --> 
            
            <!-- /control-group --> 
            
            <br>
          </fieldset>
          
          <!-- /widget -->
          <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>To Do List</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> Type </th>
                    <th> Title </th>
                    <th> Priority </th>
                     <th> Due Date </th>
                    <th class="td-actions"> </th>
                  </tr>
                </thead>
                <tbody id="showdata">
                </tbody>
              </table>
            </div>
            <!-- /widget-content --> 
          </div>
          <!-- /widget --> 
          
          <!-- /widget --> 
        </div>
        <!-- /span6 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main --> 

<!-- /extra -->
<div class="footer">
  <div class="footer-inner">
    <div class="container">
      <div class="row">
        <div class="span12"> &copy; 2018 <a href="#">To do List</a>. </div>
        <!-- /span12 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /footer-inner --> 
</div>
<!-- /footer --> 
<!-- Le javascript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="/to-do-list2/js/jquery-1.7.2.min.js"></script> 
<script src="/to-do-list2/js/bootstrap.js"></script> 
<script src="/to-do-list2/js/base.js"></script> 
<script>
$(function(){

// this will be called when edit button is clicked
	$('#showdata').on('click', '.btnedit', function() {
		var id = $(this).attr('data');
		//$('#myModal_edit').show();
		
	  $.ajax({
			   type: 'GET',
			   url: "/to-do-list2/index.php/Todolist/edit_td_list", 
			   async:false,	
			   data:{'id':id},	
			   dataType: "json",
			   success: function(data) {
				  $('#type2 option[value='+data.type+']').attr('selected','selected'); 
				 
				 
				  $('#priority2 option[value='+data.priority+']').attr('selected','selected'); 
 				  $('input[name=duedate2]').val(data.duedate);
 				  $('input[name=title2]').val(data.title);
				  $('textarea[name=desc2]').val(data.description);
				  $('input[name=id2]').val(data.id);
				
			   },
			   error: function()
			   {
				   //alert('error');
			   }
		});
		
		
		
		 
	});
// this wll be called when u click delete button
 	 $(document).on('click', '#btndelete', function(){
		 
 		  var id = $(this).attr('data');
		  
 		  $.ajax({
				   type: 'GET',
				   url: "/to-do-list2/index.php/Todolist/delete_td_list", 
				   async:false,	
				   data:{'id':id},	
				   dataType: "json",
				   success: function(data) {
					   
		   				$('#successalert').fadeIn('fast').delay(2000).fadeOut('fast');
						$('.modal-backdrop').fadeOut('fast');
						$('#myModal_delete').fadeOut('fast');

       				   showAllrecords();

 					
				   },
				   error: function()
				   {
					   console.log(data);
					    alert('error');
				   }
			});
	});

// this will be called when u click save button in edit form	
	$('#savechanges_edit').click(function(){
					
 		var url = $('#edit-todolist').attr('action');
		var data = $('#edit-todolist').serialize();
				
		var title = $('input[name=title2]');
		var description = $('textarea[name=desc2]');

		var result = '';
		
		if(title.val()=='')	{
			title.addClass('haserror');
			title.attr("placeholder", "Enter Title");
		}
		else {
			title.removeClass('haserror');
			title.attr("placeholder", "");
			result += '1';
		}
		if(description.val()=='')	{
			description.addClass('haserror');
			description.attr("placeholder", "Enter Title");
		}
		else {
			description.removeClass('haserror');
			description.attr("placeholder", "");
			result += '1';
		}
		
 		if(result == '11') {		
 			  $.ajax({
			  type: "POST",
			  url: url, 
			  data:data,	
		      success: function(response) {
  				 showAllrecords();
				$('#successalert').fadeIn('fast').delay(2000).fadeOut('fast');
				$('.modal-backdrop').fadeOut('fast');
				$('#myModal_edit').fadeOut('fast');
 
			  },
			  error: function()
			  {
				  console.log(response);
				    
			  }
			});
			
		}
		
		
		
		
		
		
	});

// this function will be called when save new password save button is called
	$('#savechanges_profile').click(function(){
					
 		var url = $('#edit-profile').attr('action');
		var data = $('#edit-profile').serialize();
				
		var password = $('input[name=password3]');
		var rpassword = $('input[name=rpassword3]');

		var result = '';
		
		if(password.val()!=rpassword.val())	{
			$( '#errorbox' ).text( 'Both Passwords Should be same' );
		}
		else {
			if(password.val() != '' && rpassword.val() != '')	{
					  $.ajax({
					  type: "POST",
					  url: url, 
					  data:data,	
					  success: function(response) {
 						$('.modal-backdrop').fadeOut('fast');
						$('#myModal_profile').fadeOut('fast');
		 
					  },
					  error: function()
					  {
						  console.log(response);
							
					  }
					});
			}
		
		}
		
 	});


// this will be called when delete button is called
 	$('#showdata').on('click', '.currentdelete', function() {
		  var id = $(this).attr('data');
		  $("#btndelete").attr({"data" : id});
	});


	// this function will be called when some body click save  button in adding the todolist
	$('#savechanges').click(function(){
					
		var url = $('#add-todolist').attr('action');
		var data = $('#add-todolist').serialize();
				
		var title = $('input[name=title]');
		var description = $('textarea[name=desc]');

		var result = '';
		
		if(title.val()=='')	{
			title.addClass('haserror');
			title.attr("placeholder", "Enter Title");
		}
		else {
			title.removeClass('haserror');
			title.attr("placeholder", "");
			result += '1';
		}
		if(description.val()=='')	{
			description.addClass('haserror');
			description.attr("placeholder", "Enter Title");
		}
		else {
			description.removeClass('haserror');
			description.attr("placeholder", "");
			result += '1';
		}
		
 		if(result == '11') {		
 			  $.ajax({
			  type: "POST",
			  url: url, 
			  data:data,	
		      success: function(response) {
  				 showAllrecords();
				$('#successalert').fadeIn('fast').delay(2000).fadeOut('fast');
				$('.modal-backdrop').fadeOut('fast');
				$('#myModal').fadeOut('fast');
				  console.log(response);
 
			  },
			  error: function()
			  {
				  console.log(response);
				    
			  }
			});
			
		}
		
		
		
		
		
		
	});

// this function will be called when page is loading to bring list of todolist to the table	
	showAllrecords();
	function showAllrecords()
	{
	  
	  $.ajax({
      type: 'ajax',
      url: "/to-do-list2/index.php/Todolist/show_td_list", 
	  async:false,	
      dataType: "json",
       success: function(data) {
	   	
		var html = '';
		var i ;
		for(i=0;i<data.length;i++)
		{
			html = html + '<tr>';
            html = html + '<td> '+ data[i].type +' </td>';
            html = html + '<td> '+ data[i].title +' </td>';
            html = html + '<td> '+ data[i].priority +' </td>';
            html = html + '<td> '+ data[i].duedate +' </td>';
            html = html + '<td class="td-actions"><a data="' + data[i].id + '" href="#myModal_edit" class="btn btn-small btn-success btnedit"  data-toggle="modal">EDIT</a><a  data="' + data[i].id + '" class="btn btn-danger btn-small currentdelete" href="#myModal_delete" data-toggle="modal">DELETE</a></td>';
            html = html + '</tr>';
			$('#showdata').html(html);
		}
		
	   },
	   error: function()
	   {
		   //alert('error');
	   }
    });
	}
	
	
// this function will be called when search button is click	
	$('#searchtodolist').click(function(){
 		var titlesearch = $('input[name=titlesearch]').val();
 		var typesearch = $('select[name=typesearch]').val();
 		var duedatesearch = $('input[name=duedatesearch]').val();
 		var prioritysearch = $('select[name=prioritysearch]').val();
 
   	  $.ajax({
	  type: 'GET',
      url: "/to-do-list2/index.php/Todolist/search_td_list", 
	  async:false,
	  data:{'titlesearch':titlesearch,'typesearch':typesearch,'duedatesearch':duedatesearch,'prioritysearch':prioritysearch},	
      dataType: "json",
       success: function(data) {
 	  console.log(data);
	  
		  if(data == false) { 
			$('#showdata').html('No Data Found'); 
		  }   	
		  else{
				
				var html = '';
				var i ;
				for(i=0;i<data.length;i++)
				{
					html = html + '<tr>';
					html = html + '<td> '+ data[i].type +' </td>';
					html = html + '<td> '+ data[i].title +' </td>';
					html = html + '<td> '+ data[i].priority +' </td>';
					html = html + '<td> '+ data[i].duedate +' </td>';
					html = html + '<td class="td-actions"><a data="' + data[i].id + '" href="#myModal_edit" class="btn btn-small btn-success btnedit"  data-toggle="modal">EDIT</a><a  data="' + data[i].id + '" class="btn btn-danger btn-small currentdelete" href="#myModal_delete" data-toggle="modal">DELETE</a></td>';
					html = html + '</tr>';
					$('#showdata').html(html);
				}
		  }
		
	   },
	   error: function()
	   {
		  // console.log(data);
		  alert('errr');
	   }
    });
 	    });



	$('#sortingthis').change(function(){
		var sortthings = $('select[name=sortingthis]').val();
    	  $.ajax({
	  type: 'GET',
      url: "/to-do-list2/index.php/Todolist/sort_td_list", 
	  async:false,
	  data:{'sortingthis':sortthings},	
      dataType: "json",
       success: function(data) {
 	  console.log(data);
	  
	  
		  if(data == false) { 
			$('#showdata').html('No Data Found'); 
		  }   	
		  else{
				
				var html = '';
				var i ;
				for(i=0;i<data.length;i++)
				{
					html = html + '<tr>';
					html = html + '<td> '+ data[i].type +' </td>';
					html = html + '<td> '+ data[i].title +' </td>';
					html = html + '<td> '+ data[i].priority +' </td>';
					html = html + '<td> '+ data[i].duedate +' </td>';
					html = html + '<td class="td-actions"><a data="' + data[i].id + '" href="#myModal_edit" class="btn btn-small btn-success btnedit"  data-toggle="modal">EDIT</a><a  data="' + data[i].id + '" class="btn btn-danger btn-small currentdelete" href="#myModal_delete" data-toggle="modal">DELETE</a></td>';
					html = html + '</tr>';
					$('#showdata').html(html);
				}
		  }
		
	   },
	   error: function()
	   {
		  // console.log(data);
		  alert('errr');
	   }
    });
 	    });



});
</script>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
 
window.addEventListener('load', function() {
    $( ".datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });;
  } );
  </script>
</body>
</html>
