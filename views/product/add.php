<style type="text/css">
	.main{
		left: 10%;
	}
</style>
<div class="container">
	<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-lg-offset-2">
			<h3 class="text-center">Thêm sản phẩm</h3>
			<form method="post" enctype="multipart/form-data" action="index.php?controller=product&action=postAdd" >
				<div class="form-group">
					<label for="NameProduct">Tên sản phẩm:</label>
					<input type="text" class="form-control" id="NameProduct" name="NameProduct" placeholder="ten san pham..." required="required">
				</div>
				<div class="form-group">
					<label for="OldPrice">Giá cũ:</label>
					<input type="number" class="form-control" id="OldPrice" name="OldPrice" min="0" placeholder="Giá cũ" required="required">
				</div>
				<div class="form-group">
					<label for="NewPrice">Giá mới:</label>
					<input type="number" class="form-control" id="NewPrice" name="NewPrice" min="0" placeholder="Giá mới" required="required">
				</div>
				<div class="form-group">
					<label for="UrlImage">Ảnh:</label>
					<input type="file" class="form-control" id="UrlImage" name="UrlImage" required="required">
				</div>
				<div class="form-group">
					<label for="Amount">Số lượng:</label>
					<input type="number" class="form-control" id="Amount" name="Amount" min="1" placeholder="Số lượng"  required="required">
				</div>
				
				<input type="submit" class="btn btn-success" value="add" name="btn_add">
			</form>
		</div>
	</div>
</div>