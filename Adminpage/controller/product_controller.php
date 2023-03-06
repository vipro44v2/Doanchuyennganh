<?php
include '../model/Product.php';

if ($_POST['btn_action'] == 'Create') {
    if ($_POST['txt_name'] == "")
        header("Location: ../view/createproduct.php");
    else {
        $product = new Product("", $_POST['txt_name'],$_FILES['file_image']['name'],$_POST['txt_price'],$_POST['category']);
        $product->insertProduct();
        header("Location: ../view/producttables.php");
    }
}
else if($_POST['btn_action'] == 'Delete'){
    $product = new Product("","","","","");
    $product->deleteProduct( $_POST['id_product']);
    header("Location: ../view/producttables.php");
}
else if($_POST['btn_action'] == 'Update'){
    $product = new Product("", $_POST['txt_name'],$_FILES['file_image']['name'],$_POST['txt_price'],$_POST['category']);
    $product -> updateProduct($_POST['txt_id']);
    header("Location: ../view/producttables.php");
}
?>