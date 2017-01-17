<?php
$url = "https://thongtindoanhnghiep.co/api/city";
$product_list = file_get_contents('' . $url . '');
$kq = json_decode($product_list, true);
            echo "<pre>";
	            print_r( $kq);
	            // echo $url_api_categories;
	            die();
echo "</pre>";
?>