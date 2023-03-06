<?php
include '../model/Category.php';

if ($_POST['btn_action'] == 'Create') {
    if ($_POST['txt_category_name'] == "")
        header("Location: ../view/createcategory.php");
    else {
        $category = new Category("",$_POST['txt_category_name']);
        $category->insertCategory();
        header("Location: ../view/categorytables.php");
    }
}
else if($_POST['btn_action'] == 'Delete'){
    $category = new Category("","");
    $category->deleteCategory( $_POST['id_category']);
    header("Location: ../view/categorytables.php");
}
else if($_POST['btn_action'] == 'Update'){
    $category = new Category("",$_POST['txt_category_name']);
    $category->updateCategory($_POST['txt_category_id']);
    header("Location: ../view/categorytables.php");
}
?>