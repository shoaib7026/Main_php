<?php
session_start();

include('components/header.php');
include("php/connection.php");
?>

<?php
if(isset($_POST['addToCart'])){

if(isset($_SESSION['cart'])){
		$count = count($_SESSION['cart']);

		$productid = array_column($_SESSION['cart'],'productId');
		if(in_array($_POST['pId'],$productid)){
			echo "<script>alert('product already he cart me')</script>";
		}

		else{
			$_SESSION['cart'][$count] =  array("productId"=>$_POST['pId'],
			"productName"=>$_POST['pName'],
			"productPrice"=>$_POST['pPrice'],
			"productImage"=>$_POST['pImage'],
			"productQty"=>$_POST['num-product']);
	
	
			echo "<script>alert('product added successfully')</script>";
		}

		
}
else{
	$_SESSION['cart'][0] = array("productId"=>$_POST['pId'],
	"productName"=>$_POST['pName'],
	"productPrice"=>$_POST['pPrice'],
	"productImage"=>$_POST['pImage'],
	"productQty"=>$_POST['num-product']);
	echo "<script>alert('product added successfully')</script>";
}
}




if (isset($_POST['deleteItem'])) {
	$deleteId = $_POST['delete_id'];
	foreach ($_SESSION['cart'] as $key => $item) {
		if ($item['productId'] == $deleteId) {
			unset($_SESSION['cart'][$key]);
			echo "<script>alert('product delete successfully');location.assign('shoping-cart.php')</script>";
			
		}
	}
	

	
}

?>

<?php
if(isset($_POST['checkout'])){

   $userid = $_SESSION['userid'];
   $username = $_SESSION['username'];
   $useremail = $_SESSION['useremail'];


   foreach($_SESSION['cart'] as  $item){
	$productid = $item['productId'];
	$price = $item['productPrice'];
	$name = $item['productName'];
	$quantity = $item['productQty'];

$orderquerry = $pdo->prepare("INSERT INTO orders (User_id, User_name, User_email, P_id, P_name, 	P_price, P_qty)

 VALUES (:uuid, :uname, :uemail, :pid, :pname, :pprice, :pqty)");


$orderquerry->bindParam(":uuid", $userid);
$orderquerry->bindParam(":uname", $username);
$orderquerry->bindParam(":uemail", $useremail);
$orderquerry->bindParam(":pid", $productid);
$orderquerry->bindParam(":pname", $name);
$orderquerry->bindParam(":pprice" , $price);
$orderquerry->bindParam(":pqty", $quantity);
$orderquerry->execute();





   }


}

// print_r($_SESSION['cart']);

?>













	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</div>
		

	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-2 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart" >
								<tr class="table_head ">
									<th class="column-1">Product</th>
									<th class="column-2">Name</th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
									<th class="column-5">Action</th>

								</tr>

								<?php
								
								
						
								

								if(isset($_SESSION['cart'])){

								foreach($_SESSION['cart'] as $value){
								
								?>

								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="adminpanel/Product_Images/<?php echo $value['productImage']; ?>" alt="IMG">
										</div>
									</td>
									<td class="column-2"><?php echo $value['productName']; ?></td>
									<td class="column-3"><?php echo $value['productPrice']; ?></td>


									
									<td class="column-4">

										<div class="wrap-num-product flex-w m-l-auto m-r-0 ">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" value="1">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
									</td>



									<td class="column-5"><?php echo $value['productPrice'];?></td>
									<td class="column-6">
	<form method="post" action="">
		<input type="hidden" name="delete_id" value="<?php echo $value['productId']; ?>">
		<button type="submit" name="deleteItem" class="btn btn-danger btn-sm">Delete</button>
	</form>
</td>

								</tr>
<?php
								}
								}
?>
								
							</table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">
								<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">
									
								<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
									Apply coupon
								</div>
							</div>

							<div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
								Update Cart
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									$79.65
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Shipping:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
									There are no shipping methods available. Please double check your address, or contact us if you need any help.
								</p>
								
								<div class="p-t-15">
									<span class="stext-112 cl8">
										Calculate Shipping
									</span>

									<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select class="js-select2" name="time">
											<option>Select a country...</option>
											<option>USA</option>
											<option>UK</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="State /  country">
									</div>

									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" placeholder="Postcode / Zip">
									</div>
									
									<div class="flex-w">
										<div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
											Update Totals
										</div>
									</div>
										
								</div>
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									$79.65
								</span>
							</div>
						</div>
						<?php if(isset($_SESSION['useremail'])){ ?> 
<form method="post">
	<button type="submit" name="checkout" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
		Proceed to Checkout
	</button>
</form>
<?php } else { ?>
	<a href="login.php" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
		Proceed to Checkout
	</a>
<?php } ?>

					</div>
				</div>
			</div>
		</div>
	</form>
		
	
		

<?php
include('components/footer.php');
?>