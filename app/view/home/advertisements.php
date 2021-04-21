<?php

// If the user hasn't got name so if the query returns 0, locate the user to the home page
$location = 'http://' . HOST . '/' . ROOT_FOLDER_NAME . '/';
if (!isset($datas[0][0]->name)) {
    header("location: $location");
}
?>

<section class="banner">
    <div class="is-flex is-justify-content-center is-align-items-center container">
        <div
            class="banner_text is-flex is-justify-content-start is-justify-content-sm-center is-align-items-start is-flex-direction-column	 ml-2">
            <h1 class="banner_title is-align-self-center"> Advertisement from: <br>
                "<?php
                    echo $datas[0][0]->name;
                    ?>"</h1>

            <?php foreach ($datas[0] as $advertisement) { ?>

            <div class="columns is-align-self-center">
                <div class="column is-12 banner_text_h2">
                    <?php echo $advertisement->title  ?>
                </div>
            </div>

            <?php } ?>

        </div>
    </div>

</section>