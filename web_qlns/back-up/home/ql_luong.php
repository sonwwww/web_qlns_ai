<div class="contain_timekeeping page_cty" data-cty="4" style="display: none">
	<div class="content_timekeeping content_ql_duyet">
		<div class="box_table_history">
			<div class="ant-card">
				<div class="ant-card-head">
					<div class="ant-card-head-title">
						<h2>Danh sách lương nhân viên</h2>
					</div>
				</div>
				<div class="ant-card-body">
					<div class="ant-table-wrapper">
						<table class="table_history">
							<thead class="ant-table-thead">
								<tr>
									<th class="ant-table-cell" scope="col" style="text-align: center;">
										<p>STT</p>
									</th>
									<th class="ant-table-cell" scope="col" style="text-align: center;">
										<p>Tên ứng viên</p>
									</th>
									<th class="ant-table-cell" scope="col" style="text-align: center;">
										<p>Lương</p>
									</th>
                                    <th class="ant-table-cell" scope="col" style="text-align: center;">
										<p>Phần trăm lương</p>
									</th>
									<th class="ant-table-cell" scope="col" style="text-align: center;">
										<p>Chức năng</p>
									</th>
								</tr>
							</thead>
							<tbody class="ant-table-tbody">
								<?php 
                                    $sql = "SELECT * FROM user_nv, ql_luong WHERE ql_luong.id_nv = user_nv.id_nv AND id_cty = 10000 AND duyet = 1";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    while($row = mysqli_fetch_assoc($result)) {
                                ?>
								<tr>
									<td><?php echo $row["STT"]; ?></td>
									<td><?php echo $row["name_nv"]; ?></td>
									<td><?php echo $row["luong"]; ?></td>
                                    <td><?php echo $row["phantram"]; ?></td>
									<td class="td_padd">
										<p class="show_form_edit">Sửa</p>
										<!-- <span class="share_clr_four">|</span>
										<p class="show_form_del">Xóa</p> -->
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