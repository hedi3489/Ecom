
<form action="/?controller=product&action=updateSave&id=<?php echo $data[0]->productCode; ?>" method="POST">

<table border=1>
<tr>
    <td>Product Code</td>
        <td><input name="productCode" value="<?php echo $data[0]->productCode; ?>" disabled></td>
    </tr>
    <tr>
        <td>Product Name</td>
        <td><input name="productName" value="<?php  echo $data[0]->productName; ?>"></td>
    </tr>
    <tr>
        <td>Product Line</td>
        <td><input name="productLine" value="<?php  echo $data[0]->productLine; ?>"></td>
    </tr>
    <tr>
        <td>Product Vendor</td>
        <td><input name="productVendor" value="<?php  echo $data[0]->productVendor; ?>"></td>
    </tr>
    <tr>
        <td>Product Description</td>
        <td><textarea name="productDescription"><?php  echo $data[0]->productDescription; ?></textarea></td>
    </tr>
    <tr>
        <td>Product Quantity</td>
        <td><input name="quantityInStock" value="<?php  echo $data[0]->quantityInStock; ?>"></td>
    </tr>
    <tr>
        <td>Product Price</td>
        <td><input name="buyPrice" value="<?php  echo $data[0]->buyPrice; ?>"></td>
    </tr>
    
</table>
<input type="submit" value="Update">
</form>