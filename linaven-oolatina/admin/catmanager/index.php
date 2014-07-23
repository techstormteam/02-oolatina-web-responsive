<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Category Management</title>
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <?php
        require_once dirname(__FILE__) . '/dao_category.php';
        $dao_category = new dao_category();

        //Load table list
        $list_category = $dao_category->get_all();

        //Load select list
        $list_parent_category = $dao_category->get_all();

        //Load edit item
        if (!empty($_GET['e_id'])) {
            $edit_item = $dao_category->get_by_id($_GET['e_id']);
        }

        //If insert action
        if (!empty($_POST['btn_insert']) && empty($_GET['e_id'])) :
            $cat_name = $_POST['txt_cat_name'];
            $parent_id = $_POST['ddl_parent'];

            if ($dao_category->insert($cat_name, $parent_id)) :
                ?>
                <script type="text/javascript">
                    alert('Inserted new category successfully!');
                    window.location = "index.php";
                </script>
                <?php
            else :
                ?>
                <script type="text/javascript">
                    alert('Failed, the category name existed!');
                    window.location = "index.php";
                </script>
            <?php
            endif;
        endif;

        //If edit action
        if (!empty($_POST['btn_edit']) && !empty($_GET['e_id'])) :
            $cat_id = $_GET['e_id'];
            $cat_name = $_POST['txt_cat_name'];
            $parent_id = $_POST['ddl_parent'];

            $result = $dao_category->edit($cat_id, $cat_name, $parent_id);
            if ($result == 1) :
                ?>
                <script type="text/javascript">
                    alert('Edited category successfully!');
                    window.location = "index.php";
                </script>
                <?php
            elseif ($result == 0) :
                ?>
                <script type="text/javascript">
                    alert('Failed, the category name existed!');
                    window.location = "index.php";
                </script>
                <?php
            elseif ($result == -1) :
                ?>
                <script type="text/javascript">
                    alert('Failed, category is the same as parent!');
                    window.location = "index.php";
                </script>
                <?php
            endif;
        endif;

        //If delete action
        if (!empty($_GET['d_id'])) {
            $d_id = $_GET['d_id'];

            if ($dao_category->delete($d_id)) :
                ?>
                <script type="text/javascript">
                    alert('Deleted category successfully!');
                    window.location = "index.php";
                </script>
                <?php
            else:
                ?>
                <script type="text/javascript">
                    alert('Deleted category failed!');
                    window.location = "index.php";
                </script>
            <?php
            endif;
        }
        ?>

        <form name="cat_form" method="POST">
            <div class="container">
                <div class="top">
                    <label for="txt_cat_name">Category Name:<span style="color: red;">*</span></label>
                    <input name="txt_cat_name" type="text" value="<?php if (!empty($edit_item)) echo $edit_item['cat_name']; ?>" placeholder="Category Name" required="">
                    <br/>
                    <br/>
                    <label for="ddl_parent">Select Parent Category:</label>
                    <select name="ddl_parent">
                        <?php
                        if (empty($list_parent_category)):
                            ?>
                            <option value="-1">Default</option>
                            <?php
                        else:
                            ?>
                            <option value="-1">Default</option>
                            <?php
                            foreach ($list_parent_category as $item) :
                                ?>
                                <option value="<?php echo $item['cat_id']; ?>" 
                                <?php if (!empty($edit_item) && $edit_item['parent_id'] > -1 && $edit_item['parent_id'] == $item['cat_id']) echo 'selected="selected"'; ?>
                                        ><?php echo $item['cat_name']; ?></option>
                                        <?php
                                    endforeach;
                                endif;
                                ?>
                    </select>
                    <br/>
                    <br/>
                    <input type="submit" name="btn_insert" value="Insert">
                    <input type="submit" name="btn_edit" value="Edit">
                </div>
                <div class="bottom">
                    <table>
                        <tr>
                            <th>Category ID</th>
                            <th>Category Name</th>
                            <th>Parent Category ID</th>
                            <th>Parent Category Name</th>
                            <th colspan="2">Action</th>
                        </tr>
                        <?php foreach ($list_category as $item): ?>
                            <tr>
                                <td><?php echo $item['cat_id'] ?></td>
                                <td><?php echo $item['cat_name'] ?></td>
                                <td><?php echo $item['parent_id'] ?></td>
                                <td><?php echo $dao_category->get_name($item['parent_id']) ?></td>
                                <td>
                                    <a href="index.php?e_id=<?php echo $item['cat_id'] ?>">edit</a>
                                </td>
                                <td>
                                    <a href="index.php?d_id=<?php echo $item['cat_id'] ?>" onclick="return confirm('Are you sure? All children of this category will aslo be deleted!');">delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </form>
    </body>
</html>
