<style>
	img{
		height: 50px;
		width: 50px;
	}
	.container-fluit {
		transform: translateX(5px);
	}
</style>
<div class="container">
	<div class="row">
		<h3 class="text-center">Danh sach san pham</h3>
		<div class="container-fluit">
			<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-7">
					<a href="index.php?controller=product&action=add" class="btn btn-success" style="margin-bottom: 5px">Thêm</a>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-5">
					<div class="container-fluit">
						<form action="index.php?controller=product" method="post">
							<div class="row">
								<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="tim kiem..." name="key">
									</div>
								</div>
								<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
									<div class="form-group">
										<input type="submit" class="btn btn-danger" name="btn_search" value="Tim kiem" >
									</div>
								</div>
							</div>
						</form>
						
					</div>
					
				</div>
			</div>
		</div>
		<?php if(isset($count_search)){ ?>
			<p style="color: red">Tìm thấy <?php echo $count_search ?> kết quả cho " <span style="font-size: 17px;
			color: black;"><?php echo $key ?></span> " </p>
		<?php } ?>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<th>Ten SP</th>
					<th>Gia cu</th>
					<th>Gia moi</th>
					<th>Anh</th>
					<th>So luong</th>
					<th>#</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$stt = 0;
				for($i=0; $i<count($products)-1; $i++){ 
					$stt++;
					?>
					<tr>
						<td><?php echo $stt; ?></td>
						<td><?php echo $products[$i]->name ?></td>
						<td><?php echo number_format($products[$i]->oldprice) ?></td>
						<td><?php echo number_format($products[$i]->newprice) ?></td>
						<td><img src="assets/images/<?php echo $products[$i]->image ?>" alt=""></td>
						<td><?php echo $products[$i]->amount ?></td>
						<td>
							<a href="index.php?controller=product&action=update&id=<?php echo $products[$i]->id ?>" class="glyphicon glyphicon-pencil" style="margin-right: 10%"></a>
							<a href="index.php?controller=product&action=delete&id=<?php echo $products[$i]->id ?>" class="glyphicon glyphicon-trash" onclick="return confirm('Bạn có chắc chắn muốn xóa')"></a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<?php if(isset($page)){ ?>
			<ul class="pagination text-center" >
				<?PHP
              //Tạo nút prev
				if($page>1){
					$prev=$page-1;
					echo("<li class=''><a href='index.php?controller=product&PageNo=$prev'>Trước</a></li>");
				}
              //Tạo nút số thứ tự trang
				for($i=1; $i <= $total_page; $i++){
					if($i!=$page){
						echo("<li><a href='index.php?controller=product&PageNo=$i'>$i</a></li>");
					}else echo("<li class='active'><a href='index.php?page=manage_product&&PageNo=$i'>$i</a></li>");
				}
              //Tạo nút next
				if($page < $total_page){
					$next=$page+1;
					echo("<li class=''><a href='index.php?controller=product&PageNo=$next'>Sau...</a></li>");
				}
				?>
			</ul>
		<?php } ?>
	</div>
</div>

<?php 
if(isset($_COOKIE["alert"])){
	$alert = $_COOKIE["alert"];
	echo '<script>alert("'.$alert.'")</script>';
}
?>
