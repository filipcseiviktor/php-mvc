<section class="banner">
    <div class="is-flex is-justify-content-center is-align-items-center crud_create_container">
        <div
            class="banner_text is-flex is-justify-content-sm-start is-justify-content-md-center is-align-items-center is-flex-direction-column">
            <h1 class="banner_title "> Update user (min: 1 max: 10 chars)</h1>
            <div class="field">
                <div class="control">
                    <form
                        action="http://<?php echo HOST ?>/<?php echo ROOT_FOLDER_NAME ?>/crudusers/update/<?php echo  $datas[1] ?>"
                        method="POST">
                        <?php foreach ($datas[0] as $user) { ?>
                        <input class="input" type="text" name="update_user_name" minlength="1" maxlength="10"
                            value="<?php echo $user->name; ?>" required>
                        <?php } ?>
                        <button class="button is-link mt-3" type="submit"> UPDATE USER </button>
                    </form>

                </div>
            </div>

        </div>
    </div>

</section>