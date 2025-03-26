<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Meta -->

	<?php include "includes/header-links.php" ?>

</head>

<body class="selection:text-white selection:bg-primary">

	<!-- Main wrapper start -->
	<div id="main-wrapper" class="relative">
		<?php include "includes/header.php" ?>
		<?php include "includes/sidebar.php" ?>

		<!-- Content body start -->
		<div class="content-body">
			<div class="container-fluid">
				<div class="row dz-tab-area">
					<div class="flex justify-between items-center mb-5">
						<a href="<?= base_url() ?>add_users" class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-2">+ Add User</a>
						<div class="flex items-center">
							<ul class="nav nav-pills mix-chart-tab user-m-tabe flex flex-wrap">
								<li class="nav-item">
									<button class="nav-link py-[3px] px-2 mx-1 rounded text-[13px] block tab-btn" data-tab="pills-colm">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24  24" version="1.1" class="svg-main-icon">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<path d="M10.5,5 L19.5,5 C20.3284271,5 21,5.67157288 21,6.5 C21,7.32842712 20.3284271,8 19.5,8 L10.5,8 C9.67157288,8 9,7.32842712 9,6.5 C9,5.67157288 9.67157288,5 10.5,5 Z M10.5,10 L19.5,10 C20.3284271,10 21,10.6715729 21,11.5 C21,12.3284271 20.3284271,13 19.5,13 L10.5,13 C9.67157288,13 9,12.3284271 9,11.5 C9,10.6715729 9.67157288,10 10.5,10 Z M10.5,15 L19.5,15 C20.3284271,15 21,15.6715729 21,16.5 C21,17.3284271 20.3284271,18 19.5,18 L10.5,18 C9.67157288,18 9,17.3284271 9,16.5 C9,15.6715729 9.67157288,15 10.5,15 Z" fill="var(--dark)" />
												<path d="M5.5,8 C4.67157288,8 4,7.32842712 4,6.5 C4,5.67157288 4.67157288,5 5.5,5 C6.32842712,5 7,5.67157288 7,6.5 C7,7.32842712 6.32842712,8 5.5,8 Z M5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 C6.32842712,10 7,10.6715729 7,11.5 C7,12.3284271 6.32842712,13 5.5,13 Z M5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 C6.32842712,15 7,15.6715729 7,16.5 C7,17.3284271 6.32842712,18 5.5,18 Z" fill="var(--dark)" opacity="0.3" />
											</g>
										</svg>
									</button>
								</li>
								<li class="nav-item">
									<button class="nav-link py-[3px] px-2 mx-1 rounded text-[13px] block tab-btn active" data-tab="pills-list">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<rect fill="var(--dark)" opacity="0.3" x="4" y="4" width="4" height="4" rx="1" />
												<path d="M5,10 L7,10 C7.55228475,10 8,10.4477153 8,11 L8,13 C8,13.5522847 7.55228475,14 7,14 L5,14 C4.44771525,14 4,13.5522847 4,13 L4,11 C4,10.4477153 4.44771525,10 5,10 Z M11,4 L13,4 C13.5522847,4 14,4.44771525 14,5 L14,7 C14,7.55228475 13.5522847,8 13,8 L11,8 C10.4477153,8 10,7.55228475 10,7 L10,5 C10,4.44771525 10.4477153,4 11,4 Z M11,10 L13,10 C13.5522847,10 14,10.4477153 14,11 L14,13 C14,13.5522847 13.5522847,14 13,14 L11,14 C10.4477153,14 10,13.5522847 10,13 L10,11 C10,10.4477153 10.4477153,10 11,10 Z M17,4 L19,4 C19.5522847,4 20,4.44771525 20,5 L20,7 C20,7.55228475 19.5522847,8 19,8 L17,8 C16.4477153,8 16,7.55228475 16,7 L16,5 C16,4.44771525 16.4477153,4 17,4 Z M17,10 L19,10 C19.5522847,10 20,10.4477153 20,11 L20,13 C20,13.5522847 19.5522847,14 19,14 L17,14 C16.4477153,14 16,13.5522847 16,13 L16,11 C16,10.4477153 16.4477153,10 17,10 Z M5,16 L7,16 C7.55228475,16 8,16.4477153 8,17 L8,19 C8,19.5522847 7.55228475,20 7,20 L5,20 C4.44771525,20 4,19.5522847 4,19 L4,17 C4,16.4477153 4.44771525,16 5,16 Z M11,16 L13,16 C13.5522847,16 14,16.4477153 14,17 L14,19 C14,19.5522847 13.5522847,20 13,20 L11,20 C10.4477153,20 10,19.5522847 10,19 L10,17 C10,16.4477153 10.4477153,16 11,16 Z M17,16 L19,16 C19.5522847,16 20,16.4477153 20,17 L20,19 C20,19.5522847 19.5522847,20 19,20 L17,20 C16.4477153,20 16,19.5522847 16,19 L16,17 C16,16.4477153 16.4477153,16 17,16 Z" fill="var(--dark)" />
											</g>
										</svg>
									</button>
								</li>
							</ul>
						</div>
					</div>
					<div class="w-full active-p">
						<div class="tab-content-area">
							<div class="tab-content show active" id="pills-list">
								<div class="row">
									<?php

									$i = 1;

									if ($users) {

										foreach ($users as $info_user) {

									?>
											<div class="xl:w-1/4 lg:w-1/3 sm:w-1/2 w-full">
												<div class="card">
													<div class="sm:p-5 p-4">
														<div class="text-center">
															<div class="w-[120px] m-auto relative crd-bx-img">
																<img src="<?= base_url() ?>uploads/users/<?= $info_user['image'] ?>" class="rounded-full border-[7px] border-[#3e5fce14]" alt="">
																<div class="active"></div>
															</div>
															<div class="card__text">
																<h4 class="text-[1.125rem]"><?= $info_user['name'] ?></h4>
																<p class="mb-4"><?= $info_user['shop'] ?></p>
															</div>
															<div class="card__text">
															<span class="text-primary">Address: </span>
															    <p class="mb-4"><?= $info_user['address'] ?>,<?= $info_user['city'] ?>,<?= $info_user['state'] ?>,<?= $info_user['country'] ?></p>
																	</div>
															<ul class="text-center m-[18px]">
																<li class="sm:text-sm text-xs mb-2.5">
																	<span class="text-primary">Contact: </span>
																	<span class="text-body-color sm:text-sm text-xs"><?= $info_user['contact'] ?></span>
																</li>
																<li class="sm:text-sm text-xs mb-2.5">
																	<span class="text-primary">Joining Date: </span>
																	<span class="text-body-color sm:text-sm text-xs"><?= $info_user['date'] ?></span>
																</li>
															</ul>
															<div>
																<a  href="<?php echo base_url() . 'update_users/' .$info_user['id']; ?>" class="mr-1 mb-2 inline-block rounded font-medium xl:text-[10px] text-xs leading-5 xl:py-[0.10rem] xl:px-[1rem] py-2 px-2 border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300" >Update</a>
																<a href="<?php echo base_url() . 'view_users?BdID=' .$info_user['id'] . '&img=' . $info_user['image'] . '&status=' . '1' ?>" onclick="return confirm('Continue to delete ?')" class="mr-1 mb-2 inline-block rounded font-medium xl:text-[10px] text-xs leading-2 xl:py-[0.10rem] xl:px-[1rem] py-2 px-2 border border-warning bg-warning text-white hover:bg-[#ffa91a] duration-300">Delete</a>
																<a href="<?php echo base_url() . 'Home/deactiveusers/' .$info_user['id'];  ?>" onclick="return confirm('Continue to Deactive ?')" class="mr-1 mb-2 inline-block rounded font-medium xl:text-[10px] text-xs leading-2 xl:py-[0.10rem] xl:px-[1rem] py-2 px-2 border border-danger bg-danger text-white hover:bg-danger-hover duration-300">Deactivate</a>
															</div>
														</div>
													</div>
												</div>
											</div>
									<?php

											$i++;
										}
									}

									?>
								</div>
							</div>
							<div class="tab-content" id="pills-colm">
								<div class="card">
									<div class="sm:py-5 py-4">
									<div class="overflow-x-auto active-projects user-tbl ItemsCheckboxSec dt-filter">
										<table id="user-tbl" class="table">
											<thead>
												<tr>
													<th class="border-b border-b-color text-[13px] py-2.5 pl-4 pr-0 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap style-1">
														<div class="form-check custom-checkbox block min-h-[1.3125rem] pl-[1.5em] mb-0.5 text-sm font-semibold">
															<input type="checkbox" class="form-check-input checkAll" id="checkInput" required="">
															<label class="form-check-label" for="checkInput"></label>
														</div>
													</th>
													<th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">User</th>
													<th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Email</th>
													<th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Address</th>
													<th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Date</th>
													<th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">contact</th>
													<th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Shop Name</th>
													<th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-right">Action</th>
													
												</tr>
											</thead>
											<?php

									$i = 1;

									if ($users) {

										foreach ($users as $info_user) {

									?>
											<tbody>
											
												<tr>
													<td class="border-b border-b-color py-2.5 px-4 pr-0 text-[13px] font-normal text-body-color whitespace-nowrap">
														<div class="form-check custom-checkbox block min-h-[1.3125rem] pl-[1.5em] mb-0.5 text-sm font-semibold">
															<input type="checkbox" class="form-check-input" id="customCheckBox15" required="">
															<label class="form-check-label" for="customCheckBox15"></label>
														</div>
													</td>
													<td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap">
														<div class="flex items-center">
															<img src="uploads/users/<?= $info_user['image'] ?>" class="inline-block w-[2.375rem] min-w-[2.375rem] h-[2.375rem] rounded-full relative object-cover" alt="">
															<p class="mb-0 ml-2 dark:text-white"><?= $info_user['name'] ?></p>	
														</div>
													</td>
													<td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap"><?= $info_user['email'] ?></td>
													<td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap"><?= $info_user['address'] ?></td>
													<td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap"><?= $info_user['date'] ?></td>
													<td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap"><?= $info_user['contact'] ?></td>
													<td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color text-right whitespace-nowrap"><?= $info_user['shop'] ?></td>
													<td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color text-right whitespace-nowrap">
														
													<div class="cursor-pointer relative">
															<div class="dz-dropdown btn-link" data-dz-dropdown="DzToggle18" >
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	<path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																	<path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
																</svg>
															</div>
															<div class="dz-dropdown-menu translate-y-2.5 2xl:translate-x-[-30px] translate-x-[-100px] py-2 rounded-md min-w-[10rem] z-[9] shadow-[0_0_3.125rem_0_rgba(82,63,105,0.15)] overflow-hidden absolute bg-white dark:bg-[#182237]" id="DzToggle18">
																<a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]" href="<?php echo base_url() . 'update_users/' .$info_user['id']; ?>">Edit</a>
																<a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]" href="<?php echo base_url() . 'view_users?BdID=' .$info_user['id'] . '&img=' . $info_user['image'] ?>" onclick="return confirm('Continue to delete ?')">Delete</a>
																<a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]" href="<?php echo base_url() . 'view_users?BdID=' .$info_user['id'] . '&img=' . $info_user['image'] ?>" onclick="return confirm('Continue to Deactivate ?')">Deactivate User</a>
																
															</div>
														</div>
													</td>
												</tr>
												<?php

$i++;
}
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
				</div>
			</div>
		</div>

		<!-- Content body end -->

		<?php include "includes/footer-links.php" ?>
	</div>
	<?php include "includes/footer.php" ?>
</body>

</html>