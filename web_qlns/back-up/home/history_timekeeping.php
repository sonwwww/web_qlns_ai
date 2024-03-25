<div class="contain_timekeeping page_cty" data-cty="3" style="display: none">
	<div class="content_timekeeping">
		<!-- <div class="box_breadcrump">
			<img width="16" height="16" src="./images/back.png">
			<p class="breadcrump_back">Quay lại</p>
		</div> -->
		<div class="box_table_history">
			<div class="ant-card">
				<div class="ant-card-head">
					<div class="ant-card-head-title">
						<h2>Danh sách lịch sử chấm công </h2>
					</div>
				</div>
				<div class="ant-card-body">
					<div class="ant-table-wrapper">
						<table class="table_history">
							<thead class="ant-table-thead">
								<tr>
									<th class="ant-table-cell" scope="col" style="text-align: center;">
										<p>Họ và tên</p>
									</th>
									<th class="ant-table-cell" scope="col" style="text-align: center;">
										<p>Phòng</p>
									</th>
									<th class="ant-table-cell" scope="col" style="text-align: center;">
										<p>Ca làm việc</p>
									</th>
									<th class="ant-table-cell" scope="col" style="text-align: center;">
										<p>Thời gian chấm công</p>
									</th>
								</tr>
							</thead>
							<tbody class="ant-table-tbody">
							<?php 
                                $sql_cc = "SELECT * FROM ql_chamcong WHERE id_cty = 10000";
                                $result_cc = mysqli_query($conn, $sql_cc);
                                if (mysqli_num_rows($result_cc) > 0) {
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result_cc)) {
                            ?>
								<tr>
									<td>
										<?php 
                                            $sql_nv = mysqli_query($conn, "SELECT * FROM user_nv WHERE user_nv.id_cty = $row[id_cty] AND user_nv.id_nv = $row[id_nv]");
                                            $row_nv=mysqli_fetch_array($sql_nv);
                                            echo $row_nv['name_nv'];
                                        ?>
									</td>
									<td>
										<?php 
                                            $sql_p = mysqli_query($conn, "SELECT * FROM user_nv, ql_phongban WHERE user_nv.id_cty = $row[id_cty] AND ql_phongban.id_cty = $row[id_cty] AND user_nv.id_nv = $row[id_nv] AND ql_phongban.id_phong = user_nv.id_phong");
                                            $row_p=mysqli_fetch_array($sql_p);
                                            echo $row_p['name_phong'];
                                        ?>
									</td>
									<td><?php echo $row["thoigian"]; ?></td>
									<td>
										<?php 
											if($row["ca_vao"]==1){
												echo 'Ca vào';
											} elseif($row["ca_ra"]==1){
												echo 'Ca ra';
											}
										?>
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