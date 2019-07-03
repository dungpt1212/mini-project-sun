<style type="text/css">
	.main{
		left: 10%;
	}
	img{
		width: 200px;
		height: 200px;
	}
</style>
<div class="container">
	<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-lg-offset-2">
			<h3 class="text-center">update sản phẩm</h3>
			<form method="post" enctype="multipart/form-data" action="index.php?controller=product&action=postUpdate" >
				<div class="form-group">
					<!-- <label for="NameProduct">ID:</label> -->
					<input type="hidden" class="form-control" id="IdProduct" name="IdProduct" value="<?php echo $product->id ?>" required="required">
				</div>
				<div class="form-group">
					<label for="NameProduct">Tên sản phẩm:</label>
					<input type="text" class="form-control" id="NameProduct" name="NameProduct" value="<?php echo $product->name ?>" required="required">
				</div>
				<div class="form-group">
					<label for="OldPrice">Giá cũ:</label>
					<input type="number" class="form-control" id="OldPrice" name="OldPrice" min="0" value="<?php echo $product->oldprice ?>" required="required">
				</div>
				<div class="form-group">
					<label for="NewPrice">Giá mới:</label>
					<input type="number" class="form-control" id="NewPrice" name="NewPrice" min="0" value="<?php echo $product->newprice ?>" required="required">
				</div>
				<div class="form-group">
					<label for="UrlImage">Ảnh:</label>
					<input type="file" class="form-control" id="UrlImage" name="UrlImage">
				</div>
				<div class="form-group">
					<!-- <label for="image">link anh:</label> -->
					<input type="hidden" class="form-control" id="image" name="image" value="<?php echo $product->image ?>" required="required">
				</div>
				<div class="form-group">
					<img src="assets/images/<?php echo $product->image ?>" alt="">
				</div>
				<div class="form-group">
					<label for="Amount">Số lượng:</label>
					<input type="number" class="form-control" id="Amount" name="Amount" min="1" value="<?php echo $product->amount ?>" required="required">
				</div>
				
				<input type="submit" class="btn btn-success" value="update" name="btn_update">
			</form>
		</div>
	</div>
</div>