<section class="banner">
    <div class="is-flex is-justify-content-center is-align-items-center container">
        <div
            class="banner_text is-flex is-justify-content-start is-justify-content-sm-center is-align-items-start is-flex-direction-column	 ml-2">
            <h1 class="banner_title is-align-self-center"> Available Users</h1>
            <div class="buttons is-align-self-center">
                <a href="http://<?php echo HOST ?>/<?php echo ROOT_FOLDER_NAME ?>/crudusers" class="button is-link">Go
                    to admin panel</a>
            </div>
            <?php foreach ($datas[0] as $userKey => $user) { ?>

            <div class="columns is-align-self-center">
                <div class="column is-12 banner_text_h2">
                    <form action="advertisements/<?php echo $user->id ?>" method="POST">
                        <input type="hidden" name="user_id" value="<?php echo $userKey += 1  ?>">
                        <a class="main_button" onclick="this.parentNode.submit();">
                            <?php echo  $user->name ?></a>
                    </form>
                </div>
            </div>

            <?php } ?>

        </div>
    </div>

</section>