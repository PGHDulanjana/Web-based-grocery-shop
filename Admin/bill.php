<?php
include("conn.php");
    session_start();
    $custName = $_SESSION["customerName"];

    //Select Customer info
    $selectInfoQuery= "SELECT * FROM userinfo WHERE username= '$custName'";
    $inFoResult = mysqli_query($con,$selectInfoQuery);
    if(mysqli_num_rows($inFoResult) > 0)
    $inFoRow = mysqli_fetch_assoc($inFoResult);
       $custPhoneNumber = $inFoRow["pnumber"];
       $custAddress = $inFoRow["address"];

       //Select Customer details
    $custinFoQuery= "SELECT * FROM users WHERE username= '$custName'";
    $custinFoResult = mysqli_query($con,$custinFoQuery);
    if(mysqli_num_rows($custinFoResult) > 0)
    $userinFoRow = mysqli_fetch_assoc($custinFoResult);
       $custFullName = $userinFoRow["fullname"];
       $custDistrict = $userinFoRow["district"];
       $date = new DateTime("now", new DateTimeZone("Asia/Colombo"));
       $finalDate = $date->format('Y-m-d');
        $totalItemPrice = 0;

        //Delivery price Calculation
        $selectDDeliceryuery = "SELECT * FROM deliveryfee WHERE district = '$custDistrict'";
        $destrictResult = mysqli_query($con,$selectDDeliceryuery);
        if(mysqli_num_rows($destrictResult) > 0){
            $rowdestrct = mysqli_fetch_assoc($destrictResult);
            $deleveryprice = $rowdestrct['deliveryprice'];
        }
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Invoice</title>
		<link rel="stylesheet" href="assets/css/inovoice.css">
		<!-- <link rel="license" href="https://www.opensource.org/licenses/mit-license/"> -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
        $(document).ready(function () {
            window.print();
        });
    </script>
		<!-- Favicon ico -->
		<link rel="icon" href="images/favicon.ico" type="image/x-icon">
	</head>
	<body>
		<header>
			<h1>Invoice</h1>
			<address contenteditable>
                <p>The Market Basket</p>
				<p>59/E clock tower junction/Piliyandala.</p>
				<p>ThemarketBasket@gmail.com</p>
				<p>(+94)783 715 777 </p>
			</address>
			<!-- <span><img alt="" src="http://www.jonathantneal.com/examples/invoice/logo.png"><input type="file" accept="image/*"></span> -->
		</header>
		<article>
			<h1>Recipient</h1>
			<address contenteditable>
				<p>The<br>Market Basket</p>
			</address>
			<table class="meta">
				<tr>
					<th><span contenteditable>Invoice #</span></th>
					<td><span contenteditable><?=$custName ?></span></td>
				</tr>
				<tr>
					<th><span contenteditable>Date</span></th>
					<td><span contenteditable><?=$finalDate ?></span></td>
				</tr>
				<tr>
					
				</tr>
			</table>

            <?php 
                    $selependingOderQuery = "SELECT * FROM pendingoders WHERE username = '$custName'";
                    $pendinfResult = mysqli_query($con,$selependingOderQuery);
                    if(mysqli_num_rows($pendinfResult) > 0){?>
                            <table class="">
				<thead>
					<tr>
						<th><span contenteditable>Item</span></th>
						<th><span contenteditable>Category Price</span></th>
						<th><span contenteditable>Quantity</span></th>
						<th><span contenteditable>Category type</span></th>
					</tr>
				</thead>
                <?php     while($pendingRow = mysqli_fetch_assoc($pendinfResult)){ ?>
                    <tbody>
					<tr>
						<td><span contenteditable> <?=$pendingRow["catname"] ?></span></td>
						<td><span contenteditable><span data-prefix>$</span><?=$pendingRow["catprice"] ?></span></td>
                        <?php $totalItemPrice += $pendingRow["quantity"] * $pendingRow["catprice"] ?>
						<td><span contenteditable><?=$pendingRow["quantity"] ?></span></td>
						<td><span contenteditable><?=$pendingRow["cattype"] ?></span></td>
					</tr>
				</tbody>
         <?php       }?>
                     </table>
              <?php      }
            ?>
			
				
			
			<br>
			<table class="balance">
				<tr>
					<th><span contenteditable>Total</span></th>
					<td><span data-prefix>$</span><span><?=$totalItemPrice ?></span></td>
				</tr>
				<tr>
					<th><span contenteditable>Delivery Price</span></th>
					<td><span data-prefix>$</span><span contenteditable><?=$deleveryprice ?></span></td>
				</tr>
				<tr>
					<th><span contenteditable>Amount to pay</span></th>
					<td><span data-prefix>$</span><span><?=$totalItemPrice + $deleveryprice ?></span></td>
				</tr>
			</table>
		</article>
		<aside>
            <h1>Delivery Address</h1>
                <p>User Name = <?=$custName ?></p>
                <p>Full name = <?=$custFullName ?></p>
                <p>District  = <?=$custDistrict?></p>
				<p>Address   = <?=$custAddress ?></p>
				<p>Contact Number = <?=$custPhoneNumber ?></p>
<br><br>
			<h1><span contenteditable>Additional Notes</span></h1>
			<div contenteditable>
				<p>We not accepted returns.</p>
			</div>
		</aside>
	</body>
</html>
<?php
mysqli_query($con,"DELETE FROM pendingoders WHERE username = '$custName'");
?>