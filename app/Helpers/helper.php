<?php
if (!function_exists('showCategories')) {
    function showCategories($categories, $parent, $char, $parent_id_child)
    {
        foreach ($categories as $category) {
            if ($category["parent"] == $parent) {
                if ($category['id'] == $parent_id_child ? 'selected' : '') {
                    echo  '<option selected value=' . $category['id'] . '>' . $char . $category["name"] . '</option>';
                } else {
                    echo  '<option  value=' . $category['id'] . '>' . $char . $category["name"] . '</option>';
                }
                $new_parent = $category["id"];
                showCategories($categories, $new_parent, $char . "|--", $parent_id_child);
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
                    <a class="btn-category btn-primary" href="/admin/category/edit/'.$category['id'].'"><i
                            class="fa fa-edit"></i></a>
                    <a class="btn-category btn-danger" href="/admin/category/delete/'.$category['id'].'"><i
                            class="fas fa-times"></i></i></a>
                </div>
            </div>';
                $new_parent = $category['id'];
                listCategories($categories, $new_parent, $char . ' ---| ');
            }
        }
    }
}
