<?php
if (!function_exists('showCategories')) {
    function showCategories($categories, $parent, $char)
    {
        foreach ($categories as $category) {
            if ($category["parent"] == $parent) {
                echo  '<option value=' . $category['id'] . '>' . $char . $category["name"] . '</option>';
                $new_parent = $category["id"];
                showCategories($categories, $new_parent, $char . "|--");
            }
        }
    }
}

if (!function_exists('listCategories')) {
    function listCategories($categories, $parent, $char)
    {
        foreach ($categories as $category) {
            if ($category['parent'] == $parent) {
                echo '<div class="item-menu"><span>' . $char . $category['name'] . '</span>
                <div class="category-fix">
                    <a class="btn-category btn-primary" href="editcategory.html"><i
                            class="fa fa-edit"></i></a>
                    <a class="btn-category btn-danger" href="#"><i
                            class="fas fa-times"></i></i></a>
                </div>
            </div>';
                $new_parent = $category['id'];
                listCategories($categories, $new_parent, $char . ' ---| ');
            }
        }
    }
}
