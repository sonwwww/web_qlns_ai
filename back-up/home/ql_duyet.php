<div class="contain_timekeeping page_cty" data-cty="6" style="display: none">
	<div class="content_timekeeping content_ql_duyet">
		<div class="box_table_history">
			<div class="ant-card">
				<div class="ant-card-head">
					<div class="ant-card-head-title">
						<h2>Danh sách phê duyệt </h2>
					</div>
				</div>
				<div class="ant-card-body">
					<div class="ant-table-wrapper">
						<table class="table_history">
							<thead class="ant-table-thead">
								<tr>
									<th class="ant-table-cell" scope="col" style="text-align: center;">
										<p>ID</p>
									</th>
									<th class="ant-table-cell" scope="col" style="text-align: center;">
										<p>Tên ứng viên</p>
									</th>
									<th class="ant-table-cell" scope="col" style="text-align: center;">
										<p>Công việc ứng tuyển</p>
									</th>
									<th class="ant-table-cell" scope="col" style="text-align: center;">
										<p>Chức năng</p>
									</th>
								</tr>
							</thead>
							<tbody class="ant-table-tbody">
								<?php 
									$sql_nv0 = "SELECT * FROM user_nv WHERE id_cty = 10000 AND duyet = 0";
									$result_nv0 = mysqli_query($conn, $sql_nv0);
									if (mysqli_num_rows($result) > 0) {
									// output data of each row
									while($row_nv0 = mysqli_fetch_assoc($result_nv0)) {
								?>
								<tr>
									<td><?php echo $row_nv0["id_nv"]; ?></td>
									<td><?php echo $row_nv0["name_nv"]; ?></td>
									<td><?php echo $row_nv0["congviec"]; ?></td>
									<td class="td_padd">
										<p class="show_form_edit">Duyệt</p>
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