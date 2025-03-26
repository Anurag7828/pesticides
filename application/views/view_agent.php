<!DOCTYPE html>
<html lang="en">

<head>
   
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
                        <a href="<?= base_url('Home/add_agent') ?>" class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-auto">Add Agent</a><br>
                    </div>
                    <div class="flex items-center">
                        <?php  if ($tag == "active") { ?>

                        <h3 style="font-size: 25px; margin: 10px;color: #454592;">View Agent List</h3>
                        <?php } else {?>
                        <h3 style="font-size: 25px; margin: 10px;color: #454592;">View Deactive Agent List</h3>

                      <?php  } ?>
                        <ul class="nav nav-pills mix-chart-tab user-m-tabe flex flex-wrap">
                            <li class="nav-item">
                                <button class="nav-link py-[3px] px-2 mx-1 rounded text-[13px] block tab-btn active" data-tab="pills-colm">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24  24" version="1.1" class="svg-main-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path d="M10.5,5 L19.5,5 C20.3284271,5 21,5.67157288 21,6.5 C21,7.32842712 20.3284271,8 19.5,8 L10.5,8 C9.67157288,8 9,7.32842712 9,6.5 C9,5.67157288 9.67157288,5 10.5,5 Z M10.5,10 L19.5,10 C20.3284271,10 21,10.6715729 21,11.5 C21,12.3284271 20.3284271,13 19.5,13 L10.5,13 C9.67157288,13 9,12.3284271 9,11.5 C9,10.6715729 9.67157288,10 10.5,10 Z M10.5,15 L19.5,15 C20.3284271,15 21,15.6715729 21,16.5 C21,17.3284271 20.3284271,18 19.5,18 L10.5,18 C9.67157288,18 9,17.3284271 9,16.5 C9,15.6715729 9.67157288,15 10.5,15 Z" fill="var(--dark)" />
                                            <path d="M5.5,8 C4.67157288,8 4,7.32842712 4,6.5 C4,5.67157288 4.67157288,5 5.5,5 C6.32842712,5 7,5.67157288 7,6.5 C7,7.32842712 6.32842712,8 5.5,8 Z M5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 C6.32842712,10 7,10.6715729 7,11.5 C7,12.3284271 6.32842712,13 5.5,13 Z M5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 C6.32842712,15 7,15.6715729 7,16.5 C7,17.3284271 6.32842712,18 5.5,18 Z" fill="var(--dark)" opacity="0.3" />
                                        </g>
                                    </svg>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="w-full active-p">
                    <div class="tab-content-area">
                        <div class="tab-content show active" id="pills-colm">
                            <div class="card">
                                <div class="sm:py-5 py-4">
                                    <div class="overflow-x-auto active-projects user-tbl ItemsCheckboxSec dt-filter">
                                        <table id="user-tbl" class="table">
                                            <thead>
                                                <tr>
                                                    <th class="border-b border-b-color text-[13px] py-2.5 pl-4 pr-0 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap style-1">
                                                        S No.
                                                    </th>
                                                    <th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left"> Name</th>
                                                    <th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Contact No.</th>
                                                    <th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Email</th>
                                                    <th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Address</th>
                                                    <th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Per Person <br>Commission</th>

                                                    <th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">No. of <br>Customer</th>
                                                    <th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Total Commission</th>

                                                    <th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Status</th>
                                                    <th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i=0;
                                                if ($tag == "active") {

                                                    foreach ($Agent as $Agent_info) { $i++;
                                                    
                                                ?>
                                                        <tr>
                                                            <td class="border-b border-b-color py-2.5 px-4 pr-0 text-[13px] font-normal text-body-color whitespace-nowrap">
                                                                <?= $i ?>
                                                            </td>
                                                            <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap">
															<img src="<?= base_url() ?>uploads/users/<?= $Agent_info['image'] ?>" class="inline-block w-[2.375rem] min-w-[2.375rem] h-[2.375rem] rounded-full relative object-cover" alt="">
                                                            <?= $Agent_info['name'] ?></td>
                                                            <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap"><?= $Agent_info['contact'] ?></td>
                                                            <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap"><?= $Agent_info['email'] ?></td>
                                                            <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap"><?= $Agent_info['address'] ?><br><?= $Agent_info['pincode'] ?><br><?= $Agent_info['city'] ?><br><?= $Agent_info['country'] ?></td>
                                                            <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap">₹ <?= $Agent_info['commission'] ?>/-</td>

                                                            <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap">
    <?php  
    $query = $this->db->select('agent_id, COUNT(customer_id) AS customer_count')
                      ->from('agent_customer')
                      ->where('agent_id', $Agent_info['id']) // Add the WHERE condition
                      ->group_by('agent_id')
                      ->get();
    
    // Fetch the result as an array
    $customer_counts = $query->row_array(); // Use row_array() since it will return a single row

    // Check if the result is not empty and display the customer count
    echo isset($customer_counts['customer_count']) ? $customer_counts['customer_count'] : '0';
    ?>
</td>
<td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap"> ₹ <?=$customer_counts['customer_count']*$Agent_info['commission'] ?>/-</td>

                                                                <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap">Active</td>
                                                            <td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">
						<div class="dropdown">
							<button type="button" class="btn min-w-[2.4rem] p-[0.4375rem] h-[2.4rem] leading-[1.7] min-h-[2.5rem] btn-primary rounded-md dz-dropdown bg-primary-light hover:bg-primary duration-300 light sharp" data-dz-dropdown="dropdown-<?=$Agent_info['id']?> ">
								<svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
							</button>
							<div class="dz-dropdown-menu dropdown-menu-end border py-2 rounded-md min-w-[10rem] z-[9] translate-x-[-96px] translate-y-1 shadow-[0_0_3.125rem_0_rgba(82,63,105,0.15)] overflow-hidden border-b-color absolute bg-white dark:bg-[#182237] dark:shadow-[0rem_0rem_0rem_0.0625rem_rgba(255,255,255,0.1)] hidden" id="dropdown-<?=$Agent_info['id']?>">
                            <a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]" href="<?= base_url('Home/deactiveagent/' . $Agent_info['id']); ?>">Deactive</a>
								<a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]" href="<?= base_url('Home/update_agent/' . $Agent_info['id']); ?>">Edit</a>
                                <a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]" href="<?= base_url('view_agent?BdID='. $Agent_info['id']) ?>" onclick="return confirm('Are you sure you want to delete this Agent?')">Delete</a>
							</div>
						</div>
					</td>
                                                        </tr>
                                                <?php
                                                    }
                                                }else {
                                                    
                                                    foreach ($Agent as $Agent_info) { $i++;
                                                    
                                                        ?>
                                                                <tr>
                                                                    <td class="border-b border-b-color py-2.5 px-4 pr-0 text-[13px] font-normal text-body-color whitespace-nowrap">
                                                                        <?= $i ?>
                                                                    </td>
                                                                    <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap">
                                                                    <img src="<?= base_url() ?>uploads/users/<?= $Agent_info['image'] ?>" class="inline-block w-[2.375rem] min-w-[2.375rem] h-[2.375rem] rounded-full relative object-cover" alt=""><?= $Agent_info['name'] ?></td>
                                                                    <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap"><?= $Agent_info['contact'] ?></td>
                                                                    <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap"><?= $Agent_info['email'] ?></td>

                                                                    <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap"><?= $Agent_info['address'] ?><br><?= $Agent_info['pincode'] ?><br><?= $Agent_info['city'] ?><br><?= $Agent_info['country'] ?></td>
                                                            <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap">₹ <?= $Agent_info['commission'] ?>/-</td>

                                                                    <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap">
    <?php  
    $query = $this->db->select('agent_id, COUNT(customer_id) AS customer_count')
                      ->from('agent_customer')
                      ->where('agent_id', $Agent_info['id']) // Add the WHERE condition
                      ->group_by('agent_id')
                      ->get();
    
    // Fetch the result as an array
    $customer_counts = $query->row_array(); // Use row_array() since it will return a single row

    // Check if the result is not empty and display the customer count
    echo isset($customer_counts['customer_count']) ? $customer_counts['customer_count'] : '0';
    ?>
</td>
<td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap">₹ <?=$customer_counts['customer_count']*$Agent_info['commission'] ?>/-</td>


                                                                        <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap">Deactive</td>
                                                                  
                                                                    <td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">
                                <div class="dropdown">
                                    <button type="button" class="btn min-w-[2.4rem] p-[0.4375rem] h-[2.4rem] leading-[1.7] min-h-[2.5rem] btn-primary rounded-md dz-dropdown bg-primary-light hover:bg-primary duration-300 light sharp" data-dz-dropdown="dropdown-<?=$Agent_info['id']?> ">
                                        <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                                    </button>
                                    <div class="dz-dropdown-menu dropdown-menu-end border py-2 rounded-md min-w-[10rem] z-[9] translate-x-[-96px] translate-y-1 shadow-[0_0_3.125rem_0_rgba(82,63,105,0.15)] overflow-hidden border-b-color absolute bg-white dark:bg-[#182237] dark:shadow-[0rem_0rem_0rem_0.0625rem_rgba(255,255,255,0.1)] hidden" id="dropdown-<?=$Agent_info['id']?>">
                                    <a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]" href="<?= base_url('Home/activeagent/' . $Agent_info['id']); ?>">Active</a>
                                        <a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]" href="<?= base_url('Home/update_agent/' . $Agent_info['id']); ?>">Edit</a>
                                        <a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]" href="<?= base_url('view_deactive_agent?BdID='. $Agent_info['id']); ?>" onclick="return confirm('Are you sure you want to delete this Agent?')">Delete</a>
                                    </div>
                                </div>
                            </td>
                                                                </tr>
                                                        <?php
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
    <?php include "includes/footer-links.php" ?>
    </div>
    <?php include "includes/footer.php" ?>
</body>

</html>