<?php
// List of Products

//var_dump($data);
?>

<html>
    <head>
        <title>Product List</title>
        <style>
            table{
                width:950px;
            }
            th:nth-child(1) {
                width: 30%;
            }
            </style>
    </head>
    <body>
        <table border=1>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Vendor</th>
            </tr>
            <?php

                foreach($data as $product) {
                    echo "<tr>";
                    echo "<td>". $product->productCode ."</td>";
                    echo "<td>". $product->productName ."</td>";
                    echo "<td>". $product->productVendor ."</td>";
echo "<td><a href='/?controller=product&action=view&id=". $product->productCode."'>View</a></td>";
echo "<td><a href='/?controller=product&action=update&id=". $product->productCode."'>Modify</a></td>";
                    echo "</tr>";
                }
                
            ?>
        </table>
    </body>
</html>