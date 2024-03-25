<div class="contain_timekeeping page_cty" data-cty="5" style="display: none">
	<div class="content_timekeeping content_ql_nv">
		<div class="content-botton-add-phong">
			<div class="botton-add-phong">
				<button class="add-phong">Thêm phòng ban</button>
			</div>
		</div>
		<div class="box_table_history">
			<div class="ant-card">
				<div class="ant-card-head">
					<div class="ant-card-head-title">
						<h2>Danh sách Phòng ban </h2>
					</div>
				</div>
				<div class="ant-card-body">
					<div class="ant-table-wrapper">
						<table class="table_history">
							<thead class="ant-table-thead">
								<tr>
									<th class="ant-table-cell" scope="col" style="text-align: center;">
										<p>ID Phòng</p>
									</th>
									<th class="ant-table-cell" scope="col" style="text-align: center;">
										<p>Tên phòng</p>
									</th>
									<th class="ant-table-cell" scope="col" style="text-align: center;">
										<p>Trưởng phòng</p>
									</th>
									<th class="ant-table-cell" scope="col" style="text-align: center;">
										<p>Phó phòng</p>
									</th>
									<th class="ant-table-cell" scope="col" style="text-align: center;">
										<p>Số lượng nhân viên</p>
									</th>
									<th class="ant-table-cell" scope="col" style="text-align: center;">
										<p>Chức năng</p>
									</th>
								</tr>
							</thead>
							<tbody class="ant-table-tbody">
								<?php 
									$sql = "SELECT * FROM ql_phongban WHERE id_cty = 10000";
									$result = mysqli_query($conn, $sql);
									if (mysqli_num_rows($result) > 0) {
									// output data of each row
									while($row = mysqli_fetch_assoc($result)) {
								?>
								<tr>
									<td><?php echo $row["id_phong"]; ?></td>
									<td><?php echo $row["name_phong"]; ?></td>
									<td><?php echo $row["truongphong"]; ?></td>
									<td>-</td>
									<td>
										<?php 
											$so_nv = mysqli_query($conn, "SELECT COUNT(id_nv) AS soluongnv FROM user_nv WHERE user_nv.id_phong = $row[id_phong] AND user_nv.id_cty = 10000");
											$row_so_nv=mysqli_fetch_array($so_nv);
											echo $row_so_nv["soluongnv"];
										?>
									</td>
									<td class="td_padd">
										<p class="show_form_edit">Sửa</p>
										<span class="share_clr_four">|</span>
										<p class="show_form_del">Xóa</p>
									</td>
								</tr>
								<?php
									}
									} else {
									echo "0 results";
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>