<?php


session_start();

include ('connect.php');
include ('navbar.php');

// $id = $_GET['id'];


$now = time();

if ($now  > $_SESSION['session_expired']){
  session_destroy();
  echo "<script>window.location.href='formlogin.php?errormessage=Please Login!'</script>";
  exit;
}

if(!isset($_SESSION["login"])){
  echo "<script>window.location.href='formlogin.php'</script>";
  exit;
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/select2.min.css" rel="stylesheet" />
    <script src="js/select2.min.js"></script>
    <script src="js/transactionform.js"></script>
    
    <title>Transaction Form</title>
  </head>

  <body>
    <div class="container">
        <h2 class="text mt-5">Transaction Form</h2>
        <div id="error"><p id="errormsg" style="color:red"></p></div>
        
        <form id="form" action="confirmtransaction.php" method="POST">
            <div class="form-group mt-5">
                <label for="date">Transaction Date</label>
				<input type="text" id="datepicker" class="form-control" name="date">
            </div>
            <div class="form-group mt-5">
                <label for="address">Address</label>
                <textarea class="form-control" id="address" name="address"></textarea>
            </div>
            <div class="form-group mt-5">
                <label for="memo">Memo</label>
                <textarea class="form-control" id="memo" name="memo"></textarea>
            </div>
            <div class="form-group mt-5 item_list">
                <table id="transaction_table">
                    <thead>
                        <tr>
                            
                            <th>Product Name</th>
                            <th>Qty</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <div id="transaction_detail">
                        <!-- buat itung value perkara looping product name -->
                        <input type="hidden" id="count" value="3">
                        <?php
                        
                        for($i=1;$i<=3;$i++){
                            $query = $db->query("SELECT * FROM `products` WHERE delete_flag=0");
                        ?>
                            <tr>
                                <td>
                                    <select class="js-example-basic-single form-control" id="product_name<?=$i?>" style="width:300px;" name="product_name[]">
                                        <option value="0">Select product</option>
                                    <?php while($row = $query->fetch_assoc()){?>
                                        <option value="<?= $row["product_id"] ?>"><?= $row["product_name"] ?></option>
                                    <?php } ?>
                                    </select>
                                </td>
                                <td><input type="number" id="qty" class="form-control" style="" name="qty[]"></td>
                                <td class="text-center"><button type="button" id="delete_row" onclick="deleterow(this)">delete row</button></td>
                            </tr>
                            <?php } ?>
                        </div>
                    </tbody>
                </table>
            </div>
            <div><button type="button" id="add_row" onclick="addRow()">Add row</button></div>
            <br>
            <button type="submit" name="submit" class="btn btn-primary mb-5" onclick="validate()">Submit</button>
            <button type="reset" class="btn btn-danger mb-5">Reset</button>
        </form>
    </div>  
    
            

    <script>
    $(document).ready(function() {
        //default 3 row
        for (let index = 1; index <=3; index++) {
            // bukan array jadi tinggal ditambah index aja
            $('#product_name'+index).select2();
        }
        $( "#datepicker").datepicker({ dateFormat: 'dd-mm-yy' });
    });
    
    
    function addRow(){
        <?php $query = $db->query("SELECT * FROM `products` WHERE delete_flag=0"); ?>
        //nyari value dari countnya
        var flag = $('#count').val();
        var index = flag+1;
        var product = '<td><select class="js-example-basic-single form-control" id="product_name'+index+'" style="width:300px;" name="product_name[]"><option value="0">Select product</option><?php while($row = $query->fetch_assoc()){ ?><option value="<?= $row["product_id"] ?>"><?= $row["product_name"] ?></option><?php } ?></select></td>';
        
        $('#transaction_table').append('<tr>'+product+'<td><input type="number" id="qty" class="form-control"  name="qty[]"></td><td class="text-center"><button type="button" id="delete_row" onclick="deleterow(this)">delete row</button></td></tr>');
        $('#product_name'+index).select2();
        index++;
        document.getElementById('count').value++;
    };

    function deleterow(r) {      
        // delete row (index-0). 
        var index = $('#count').val();
        var i = r.parentNode.parentNode.rowIndex;
        document.getElementById("transaction_table").deleteRow(i);
        if(index==1)
        {
            //kalo di delete sampe habis, biar ga jadi NaN (not a number)
            document.getElementById('count').value=0;
        } else {
            //kalo nggak ya futsuuni ngurang
            document.getElementById('count').value--;
        }
       

    }; 

    </script>
        
 
  </body>
</html>