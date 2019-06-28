<style>
	img{
		height: 50px;
		width: 50px;
	}
</style>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<h3 class="text-center">Danh sach san pham</h3>
			<a href="#" class="btn btn-success" style="margin-bottom: 5px">Thêm</a>
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
					foreach($products as $val){ 
						$stt++;
						?>
						<tr>
							<td><?php echo $stt; ?></td>
							<td><?php echo $val->name ?></td>
							<td><?php echo number_format($val->oldprice) ?></td>
							<td><?php echo number_format($val->newprice) ?></td>
							<td><img src="assets/images/<?php echo $val->image ?>" alt=""></td>
							<td><?php echo $val->amount ?></td>
							<td>
								<a href="#" class="glyphicon glyphicon-pencil" style="margin-right: 10%"></a>
								<a href="#" class="glyphicon glyphicon-trash"></a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>