<?php  include('server.php'); 


	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
                $edit_state = true;
		$rec = mysqli_query($db, "SELECT * FROM info WHERE id=$id");
                $record = mysqli_fetch_array($rec); 
		$name = $record['name'];
                $date = $record['date'];
                $id = $record['id'];
		
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Birthday</title>
        <link rel="stylesheet" type="text/css" href="Styles.css">
        <link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-3" >Form:  <select name="form" style="border:solid orange">
                        <option>January</option>
                        <option>February</option>
                        <option>March</option>
                        <option>April</option>
                        <option>May</option>
                        <option>June</option>
                        <option>July</option>
                        <option>August</option>
                        <option>September</option>
                        <option>October</option>
                        <option>November</option>
                        <option>December</option>
                    </select>      
                </div> 
                
                <div class="col-md-3">To: <select name="form" style="border:solid orange">
                        <option>January</option>
                        <option>February</option>
                        <option>March</option>
                        <option>April</option>
                        <option>May</option>
                        <option>June</option>
                        <option>July</option>
                        <option>August</option>
                        <option>September</option>
                        <option>October</option>
                        <option>November</option>
                        <option>December</option>
                    </select>
                </div>
                <div class="col-md-3">Or Name: <input type="text" id="myInput" value="" size="11" style="border: solid orange" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name" >
                </div>
                <div class="col-md-3">
                    <button type="button" class="btn btn-warning">Search</button>
                    
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Add </button>
                    
                </div>
            </div>    
        </div> 
        <br>
        
        <?php $results = mysqli_query($db, "SELECT * FROM info"); ?>
        <div class="container">
            <table class="table table-striped table-bordered" id="myTable">
                <thead>
                    <tr bgcolor="Orange" style="color: white">
                            <th>Name</th>
                            <th>Date</th>
                            <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody> 
                <?php while ($row = mysqli_fetch_array($results)) { ?>
                    <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td>
                                    <a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
                            </td>
                            <td>
                                    <a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
                            </td>
                    </tr>
                <?php } ?>
                </tbody>    
            </table>
        </div>
        
<!--	<form method="post" action="server.php" >
            <input type="hidden" name="id" value="<?php echo $id; ?>">    
		<div class="input-group">
                    <label>Name</label>
                    <input type="text" name="name" value="<?php echo $name; ?>">
		</div>
		<div class="input-group">
                    <label>Date</label>
                    <input type="text" name="date" value="<?php echo $date; ?>">
		</div>
		<div class="input-group">
                    <?php if ($update == true): ?>
                      <button class="btn" type="submit" name="update" style="background: #556B2F;">update</button>
                    <?php else: ?>
                      <button class="btn" type="submit" name="save" >Save</button>
                    <?php endif ?>
                </div>
	</form>
        -->
<!--        //popup -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" >Add New Birthday</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="server.php" >
                       <input type="hidden" name="id" value="<?php echo $id; ?>">    
                       <div class="input-group">
                            <input type="submit" value="" /> <label>Name</label>
                            <input type="text" name="name" value="<?php echo $name; ?>">
                       </div>
		<div class="input-group">
                    <label>Date</label>
                    <input type="text" name="date" value="<?php echo $date; ?>">
		</div>
		<div class="input-group">
                    <?php if ($update == true): ?>
                      <button class="btn" type="submit" name="update" style="background: #556B2F;">update</button>
                    <?php else: ?>
                      <button class="btn" type="submit" name="save" >Save</button>
                    <?php endif ?>
                </div>
                   </form>
<!--                   <input type="hidden" name="id" value="<?php echo $id; ?>">    
                    <div class="input-group">
                        <label>Name</label>
                        <input type="text" name="name" value="<?php echo $name; ?>">
                    </div>
                    <div class="input-group">
                        <label>Date</label>
                        <input type="text" name="date" value="<?php echo $date; ?>">
                    </div> -->
         
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Add</button>
              </div>
            </div>
          </div>
        </div>
        
        <script>
            function myFunction() {
              var input, filter, table, tr, td, i, txtValue;
              input = document.getElementById("myInput");
              filter = input.value.toUpperCase();
              table = document.getElementById("myTable");
              tr = table.getElementsByTagName("tr");
              for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
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
</body>
</html>