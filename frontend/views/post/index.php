<?php
/** @var yii\web\View $this */
/** @var \common\models\Post $posts */

use yii\bootstrap5\LinkPager;


?>
<h1>Post</h1>
<br/>
<div class="row">
<?php
if ($posts) {
foreach ($posts as $post) { ?>

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo $post->title ?></h5>
                <p class="card-text"><?php
                    // shorted content
                    echo substr($post->content, 0, 100);
                    ?>
                </p>
                <!-- shorted content -->

                <a href="<?php echo \yii\helpers\Url::to(['post/view', 'id' => $post->id]) ?>" class="btn btn-primary">View</a>
            </div>
        </div>
    </div>

<?php }
    echo LinkPager::widget([
        'pagination' => $pagination,
    ]);
} else { ?>
<h3> No items</h3>
<?php } ?>
</div>