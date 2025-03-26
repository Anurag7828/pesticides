	<table id="user-tbl" class="table">
	<tbody>
    <?php if (!empty($stock)) : ?>
        <?php foreach ($stock as $stock_info) : ?>
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
                   break;
               }
           }
           ?>
            <tr>
                <td class="border-b border-b-color py-2.5 px-4 pr-0 text-[13px] font-normal text-body-color whitespace-nowrap">
                    <div class="form-check custom-checkbox block min-h-[1.3125rem] pl-[1.5em] mb-0.5 text-sm font-semibold">
                        <input type="checkbox" class="form-check-input" id="customCheckBox<?= $stock_info['s_id']; ?>">
                        <label class="form-check-label" for="customCheckBox<?= $stock_info['s_id']; ?>"></label>
                    </div>
                </td>
                <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap"><?= $stock_place_name ?: 'Not Found'; ?></td>
                <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap"><?=  $product_name?: 'Not Found'; ?></td>
                <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap"><?= $stock_info['packing']; ?></td>
                <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap"><?= $stock_info['quantity']; ?></td>
                <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap"><?= $stock_info['return_quantity']; ?></td>
                  <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap"><?= $stock_info['selling_quantity']; ?></td>
                <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap"><?= $stock_info['available_quantity']; ?></td>

                <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap"><?= $stock_info['exp_date']; ?></td>
                <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap">
                     <div class="button-container">
                    <!--<a class="button" href="<?= base_url('Branch_Dashboard/edit_stock?id=' . $stock_info['s_id'] . '&user_id=' . $user[0]['id']); ?>">Edit</a>-->
                    <a class="button" href="<?= base_url('Branch_Dashboard/stock/' . encryptId($user[0]['id']) . '?id=' . $stock_info['s_id']); ?>" onclick="return confirm('Are you sure you want to delete this vendor?')">Delete</a>
                    </div>
                </td> 
            </tr>
        <?php endforeach; ?>
    <?php else : ?>
        <tr><td colspan="9">No data found</td></tr>
    <?php endif; ?>
</tbody>
</table>
