<?php
include 'database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User Data</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="ajax.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap.min.css">
	<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[5];

    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
<script type="text/javascript">
	let print = () => {
    	let objFra = document.getElementById('myFrame');
        objFra.contentWindow.focus();
        objFra.contentWindow.print();
    }
</script>
<script type="text/javascript">
function fnExcelReport()
{
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById('myTable'); // id of table

    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}
</script>
<iframe id="txtArea1" style="display:none"></iframe>
<script>
function myFunction() {
document.getElementById('start').value= Date();
}
</script>
<style>
body {
  background-image: url('images/design.jpg');
}
</style>

</head>
<body>

	<nav class="navbar navbar-inverse">

  <div class="container-fluid">

    <div class="navbar-header">

      <a class="navbar-brand" href="index.php"><span style="color: black;"><img src="images/logo.png" height="30px"></span></a>

    </div>

    <ul class="nav navbar-nav">

      <li class=" Home"><a href="index.php"><span style="color: white;">Home</span></a></li>

      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span style="color: white;">About us</span><span class="caret"></span></a>

        <ul class="dropdown-menu">

          <li><a href="#">Address</a></li>

          <li><a href="#">Contact no</span></a></li>

          <li><a href="#">Email Id</a></li>

        </ul>

      </li>

      <li><a href="#"><span style="color: white;">Our Products & services</span></a></li>

      <li><a href="mis.php"><span style="color: white;">Our Complaints</span></a></li>
      <li><a href="asset.php"><span style="color: white;">Our Assets</span></a></li>
    </ul>

  </div>

</nav>
<button id="btnExport" onclick="fnExcelReport();"> EXCEL </button>
    <div class="container">
	<p id="success"></p>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Manage <b>Users</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons"></i> <span>Add New User</span></a>
						<a href="JavaScript:void(0);" class="btn btn-danger" id="delete_multiple"><i class="material-icons"></i> <span>Delete</span></a>						
					</div>
                </div>
            </div>
            <iframe 
        src="" id="myFrame" 
            frameborder="0" style="border:0;" 
                width="20" height="20">
    </iframe>
    <p>
        
    </p>
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
                                        <table id="myTable" class="table table-hover">
                <thead>
                    <tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
							
						</th>
						<th>SL NO</th>
                        <th>DATE</th>
                        <th>START TIME</th>
						<th>END TIME</th>
                        <th>USERNAME</th>
                        <th>ISSUE</th>
                        <th>ROOM NO</th>
                        <th>CONTACT</th>
						<th>STATUS</th>
                        <th>ASSIGNED ENGEENIER</th>
                        <th>REMARKS</th>
                    </tr>
                </thead>
				<tbody>
				
				<?php
				$result = mysqli_query($conn,"SELECT * FROM eoffice");
					$i=1;
					while($row = mysqli_fetch_array($result)) {
				?>
				<tr id="<?php echo $row["id"]; ?>">
				<td>
							<span class="custom-checkbox">
								<input type="checkbox" class="user_checkbox" data-user-id="<?php echo $row["id"]; ?>">
								<label for="checkbox2"></label>
							</span>
						</td>
					<td><?php echo $i; ?></td>
					<td><?php echo $row["date"]; ?></td>
					<td><?php echo $row["start"]; ?></td>
					<td><?php echo $row["end"]; ?></td>
					<td><?php echo $row["username"]; ?></td>
					<td><?php echo $row["issue"]; ?></td>
					<td><?php echo $row["room"]; ?></td>
					<td><?php echo $row["contact"]; ?></td>
					<td><?php echo $row["status"]; ?></td>
					<td><?php echo $row["engeenier"]; ?></td>
					<td><?php echo $row["remarks"]; ?></td>
					
					<td>
						<a href="#editEmployeeModal" class="edit" data-toggle="modal">
							<i class="material-icons update" data-toggle="tooltip" 
							data-id="<?php echo $row["id"]; ?>"
							data-date="<?php echo $row["date"]; ?>"
							data-start="<?php echo $row["start"]; ?>"
							data-end="<?php echo $row["end"]; ?>"
							data-username="<?php echo $row["username"]; ?>"
							data-issue="<?php echo $row["issue"]; ?>"
							data-room="<?php echo $row["room"]; ?>"
							data-contact="<?php echo $row["contact"]; ?>"
							data-status="<?php echo $row["status"]; ?>"
							data-engeenier="<?php echo $row["engeenier"]; ?>"
							data-remarks="<?php echo $row["remarks"]; ?>"
							title="Edit"></i>
						</a>
						<a href="#deleteEmployeeModal" class="delete" data-id="<?php echo $row["id"]; ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" 
						 title="Delete"></i></a>
                    </td>
				</tr>
				<?php
				$i++;
				}
				?>
				</tbody>
			</table>
			
        </div>
    </div>
	<!-- Add Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="user_form">
					<div class="modal-header">						
						<h4 class="modal-title">Add User</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>DATE</label>
							<input type="date" id="date" name="date" class="form-control" required>
						</div>
						<div class="form-group">
							<label>START TIME</label>
							<input type="time" id="start" name="start" class="form-control" required>
						</div>
						<div class="form-group">
							<label>END TIME</label>
							<input type="time" id="end" name="end" class="form-control" required>
						</div>
						<div class="form-group">
							<label>USERNAME</label>
							<input type="text" id="username" name="username" class="form-control" required>
						</div>
						<div class="form-group">
							<label>ISSUE</label>
							<select name="issue" id="issue" class="">
                                                    <option value="select">select</option>

                                                    <option value="E-office">E-office</option>
                                                    <option value="Hardware">Hardware</option>
                                                    <option value="Biometric">Biometric</option>
                                                    <option value="Others">chnage in performa</option>
                                                    <option value="Others">Others</option>
                                                    </select><br>
                                                    
						</div>
						<div class="form-group">
							<label>ROOM NO</label>
							<input type="text" id="room" name="room" class="form-control" required>
						</div>
						<div class="form-group">
							<label>CONTACT</label>
							<input type="text" id="contact" name="contact" class="form-control" required>
						</div>
						<div class="form-group">
							<label>STATUS</label>
							<select name="status" id="status" class="">
                                                    <option value="select">select</option>

                                                    <option value="Closed">Closed</option>
                                                    <option value="Pending">Pending</option>
                                                    <option value="In process">In process</option>
                                                    <option value="6-9">Not ours</option>
                                                    </select><br>
                                                    
						</div>
						<div class="form-group">
							<label>ASSIGNED ENGEENIER</label>
							<select name="engeenier" id="engeenier" class="">
                                                    <option value="select">select</option>

                                                    <option value="Ravinder Manral">Ravinder Manral</option>
                                                    <option value="Siddhant">Siddhant</option>
                                                    <option value="Vipin">Vipin</option>
                                                    <option value="Rajat">Rajat</option>
                                                    <option value="Bhopal singh">Bhopal singh</option>
                                                    <option value="Kanishk malhotra">Kanishk malhotra</option>
                                                    <option value="Salman">Salman</option>
                                                    <option value="sakshi">sakshi</option>
                                                    </select><br>
                                                    
						</div>
						<div class="form-group">
							<label>REMARKS</label>
							<input type="text" id="remarks" name="remarks" class="form-control" required>
						</div>							
					</div>
					<div class="modal-footer">
					    <input type="hidden" value="1" name="type">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-success" id="btn-add">Add</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="update_form">
					<div class="modal-header">						
						<h4 class="modal-title">Edit User</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_u" name="id" class="form-control" required>					
						<div class="form-group">
							<label>DATE</label>
							<input type="date" id="date_u" name="date" class="form-control" required>
						</div>
						<div class="form-group">
							<label>START TIME</label>
							<input type="time" id="start_u" name="start" class="form-control" required>
						</div>
						<div class="form-group">
							<label>END TIME</label>
							<input type="time" id="end_u" name="end" class="form-control" required>
						</div>
						<div class="form-group">
							<label>USERNAME</label>
							<input type="text" id="username_u" name="username" class="form-control" required>
						</div>
						<div class="form-group">
							<label>ISSUE</label>
							<select name="issue" id="issue_u" class="">
                                                    <option value="select">select</option>

                                                    <option value="E-office">E-office</option>
                                                    <option value="Hardware">Hardware</option>
                                                    <option value="Biometric">Biometric</option>
                                                    <option value="Others">chnage in performa</option>
                                                    <option value="Others">Others</option>
                                                    </select><br>
						</div>
						<div class="form-group">
							<label>ROOM NO</label>
							<input type="text" id="room_u" name="room" class="form-control" required>
						</div>
						<div class="form-group">
							<label>CONTACT</label>
							<input type="text" id="contact_u" name="contact" class="form-control" required>
						</div>
						<div class="form-group">
							<label>STATUS</label>
							<select name="status" id="status_u" class="">
                                                    <option value="select">select</option>

                                                    <option value="Closed">Closed</option>
                                                    <option value="Pending">Pending</option>
                                                    <option value="In process">In process</option>
                                                    <option value="Not ours">Not ours</option>
                                                    </select><br>
                                                    
						</div>
						<div class="form-group">
							<label>ASSIGNED ENGEENIER</label>
							<select name="engeenier" id="engeenier_u" class="">
                                                    <option value="select">select</option>

                                                    <option value="Ravinder">Ravinder Manral</option>
                                                    <option value="Siddhant">Siddhant</option>
                                                    <option value="Vipin">Vipin</option>
                                                    <option value="Rajat">Rajat</option>
                                                    <option value="Bhopal singh">Bhopal singh</option>
                                                    <option value="Kanishk malhotra">Kanishk malhotra</option>
                                                    <option value="Salman">Salman</option>
                                                    <option value="sakshi">sakshi</option>
                                                    </select><br>
                                                    
						</div>
						<div class="form-group">
							<label>REMARKS</label>
							<input type="text" id="remarks_u" name="remarks" class="form-control" required>
						</div>					
					</div>
					<div class="modal-footer">
					<input type="hidden" value="2" name="type">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-info" id="update">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
						
					<div class="modal-header">						
						<h4 class="modal-title">Delete User</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_d" name="id" class="form-control">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-danger" id="delete">Delete</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<script type="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
	
</script>
<script type="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap.min.js"></script>

<script>
$(document).ready(function() {
    $('#datatableid').DataTable();
} );
</script>
</body>

</html>    