<section class="banner">
    <div class="is-flex is-justify-content-center is-align-items-center crud_create_container">
        <div class="banner_text is-flex is-justify-content-center is-align-items-center is-flex-direction-column">
            <h1 class="banner_title "> Update Advertisement (min: 1 max: 40 chars)</h1>
            <div class="field">
                <div class="control">
                    <form
                        action="http://<?php echo HOST ?>/<?php echo ROOT_FOLDER_NAME ?>/crudadvertisements/update/<?php echo  $datas[1] ?>"
                        method="POST">

                        <?php foreach ($datas[0] as $userKey => $user) { ?>
                        <input class="input" type="text" name="update_advertisement_title" minlength="1" maxlength="40"
                            value="<?php echo $user->title; ?>">
                        <?php } ?>

                        <button class="button is-link mt-3" type="submit"> Update Advertisement </button>
                    </form>
                </div>
            </div>

        </div>
    </div>

</section>