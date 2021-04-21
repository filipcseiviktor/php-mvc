<section class="banner">
    <div class="is-flex is-justify-content-center is-align-items-center crud_create_container">
        <div
            class="banner_text is-flex is-justify-content-sm-start is-justify-content-md-center is-align-items-center is-flex-direction-column">
            <h1 class="banner_title " id="create_user"> Create User (min: 1 max: 10 chars)</h1>
            <div class="field">
                <div class="control">
                    <form action="http://<?php echo HOST ?>/<?php echo ROOT_FOLDER_NAME ?>/crudusers/store"
                        method="POST">

                        <input class="input" type="text" maxlength="10" name="create_user_name" required>
                        <button class="button is-link mt-3" type="submit"> CREATE USER </button>
                    </form>
                </div>
            </div>

        </div>
    </div>

</section>