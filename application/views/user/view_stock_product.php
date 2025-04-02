	<table id="user-tbl" class="table">
	<tbody>
    <?php $serial = 1; 
    if (!empty($stock)) : ?>
        <?php  $serial = 1; foreach ($stock as $stock_info) : ?>
            <?php
            // Fetch the service name based on the category_id
            $stock_place_name = '';
            foreach ($stock_place as $stock_place_info) {
                if ($stock_place_info['id'] == $stock_info['stock_place_name']) {
                    $stock_place_name = $stock_place_info['place_name'];
                    break;
                }
            }
           // Fetch the product name based on the product_id
           $product_name = '';
           foreach ($product_list as $product_list_info) {
               if ($product_list_info['id'] == $stock_info['product_name']) {
                $product_name = $product_list_info['product_name'];
                $product_id = $product_list_info['product_id'];
                $product_packing = $product_list_info['packing'];
                $product_net_unit = $product_list_info['net_unit'];
                $product_unit = $product_list_info['unit'];
                   break;
               }
           }
           ?>
            <tr>
                <td class="border-b border-b-color py-2.5 px-4 pr-0 text-[13px] font-normal text-body-color whitespace-nowrap">
                <?= $serial++ ?>
                </td>
                <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap"><?= $stock_place_name ?: 'Not Found'; ?></td>
                <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap">  <?= ($product_id && $product_name && $product_unit) 
        ? $product_id . ' - ' . $product_name 
        : 'Not Found'; 
    ?> </td>
                <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap"><?= $stock_info['packing']; ?></td>
                <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap"><?= $stock_info['quantity']; ?>
                <?php if ($stock_info['box'] == '1') { ?>
        - Box  ,<br><?= $stock_info['box_product_quantity']; ?> - Single
    <?php } else { ?>
        - Single
    <?php } ?></td>
                <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap"><?= $stock_info['return_quantity']; ?>
                <?php if ($stock_info['box'] == '1') { ?>
        - Box  ,<br><?= $stock_info['per_product_return_quantity']; ?> - Single
    
    <?php } ?></td>
                  <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap"><?= $stock_info['selling_quantity']; ?>
                  <?php if ($stock_info['box'] == '1') { ?>
        - Box  ,<br><?= $stock_info['per_product_selling_quantity']; ?> - Single

    <?php } ?></td>
                  <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap"><?= $stock_info['transfer_quantity']; ?>
                  <?php if ($stock_info['box'] == '1') { ?>
        - Box  ,<br><?= $stock_info['per_product_transfer_quantity']; ?> - Single
   
    <?php } ?></td>
                <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap"><?= $stock_info['availabile_quantity']; ?>
                <?php if ($stock_info['box'] == '1') { ?>
        - Box  ,<br><?= $stock_info['per_product_available_quantity']; ?> - Single
  
    <?php } ?></td>

                <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap"><?= $stock_info['exp_date']; ?></td>
                <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap">
                     <div class="button-container">
                    <!--<a class="button" href="<?= base_url('Admin_Dashboard/edit_stock?id=' . $stock_info['s_id'] . '&user_id=' . $user[0]['id']); ?>">Edit</a>-->
                   <a class="button" href="<?= base_url('Admin_Dashboard/edit_stock?id=' . $stock_info['p_id'] . '&user_id=' . $user[0]['id']); ?>" onclick="return confirm('Are you sure you want to replace stock place?')">Transfer stock</a>
                     </div>
                </td> 
            </tr>
        <?php endforeach; ?>
    <?php else : ?>
        <!-- <tr><td colspan="9">No data found</td></tr> -->
    <?php endif; ?>
</tbody>
</table>
