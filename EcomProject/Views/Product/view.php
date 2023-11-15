<?php




?>


<table border=1>
<tr>
    <td>Product Code</td>
        <td><?php echo $data[0]->productCode; ?></td>
    </tr>
    <tr>
        <td>Product Name</td>
        <td><?php  echo $data[0]->productName; ?></td>
    </tr>
    <tr>
        <td>Product Line</td>
        <td><?php  echo $data[0]->productLine; ?></td>
    </tr>
    <tr>
        <td>Product Vendor</td>
        <td><?php  echo $data[0]->productVendor; ?></td>
    </tr>
    <tr>
        <td>Product Description</td>
        <td><?php  echo $data[0]->productDescription; ?></td>
    </tr>
    <tr>
        <td>Product Quantity</td>
        <td><?php  echo $data[0]->quantityInStock; ?></td>
    </tr>
    <tr>
        <td>Product Price</td>
        <td><?php  echo $data[0]->buyPrice; ?></td>
    </tr>
    
</table>