<?php
session_start();

// Include head, header and admin_server.php
require '../includes/head.php';
include '../includes/header.php';
require '../includes/admin_server.php';
?>

<!-- Skeleton for page -->
<main class="container">

    <div class="row align-items-center justify-content-center">

        <div class="col-10 card_admin_allposts text-left admin_panel">

            <div class="row align-items-center">

                <div class="col-5 col-lg-4">
                    <h3 class="admin_h3">Admin panel</h3>
                </div>

                <div class="col-5 col-lg-6">
                    <a href="new_post_form.php" class="btn btn-sm admin_allposts_button">New post</a>
                </div>
            </div>

            <table class="table table-hover">
                <tr>
                    <th class="table_width">Date</th>
                    <th class="table_width">Title</th>
                    <th class="admin_description">Description</th>
                    <th class="table_width">Created by</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>

                <tr>
                    <!-- Loops out table with title, date, created by, edit link and delete link -->
                    <?php
                    foreach($admin as $single_admin){
                    ?>
                        <?= "<td>" ?><?= $single_admin['post_date']; ?><?= "</td>"?>
                        <?= "<td class='admin_link'>" ?><a href="single_post.php?post_id=<?= $single_admin['post_id'];?>"><?= $single_admin['title'];?></a><?=  "</td>"?>

                        <!-- If string length is more than 200 characters, show only 200 characters -->
                        <?php if(strlen($single_admin['description']) >= 200){
                            echo '<td class="admin_description">' . substr($single_admin["description"],0,200) . ' ...' ?> <p class="index_readmore"><a href="../views/single_post.php?post_id=<?= $single_admin['post_id'];?>">Read more</a></p><?= "</td>"?>

                        <?php
                        }else{
                            echo '<td class="admin_description">' . $single_admin["description"]?> <p class="index_readmore"><a href="../views/single_post.php?post_id=<?= $single_admin['post_id'];?>">Read more</a></p><?= "</td>"?>

                        <?php
                        }
                        ?>

                    <?= "<td>" ?><?= $single_admin['created_by']?><?= "</td>"?>
                    <?= "<td>" ?><a href="../views/edit_post_form.php?post_id=<?= $single_admin['post_id']; ?>"><i class="far fa-edit admin_icon"></i></a><?= "</td>"?>
                    <?= "<td>"?><a href="../includes/delete_posts.php?post_id=<?= $single_admin['post_id']; ?>"><i class="fas fa-trash-alt admin_icon"></i></a><?= "</td>"?>
                </tr>

                    <?php
                    }
                    ?>

            </table>

        </div>

    </div>


</main>

<!-- Include footer -->
<?php include '../includes/footer.php';?> 