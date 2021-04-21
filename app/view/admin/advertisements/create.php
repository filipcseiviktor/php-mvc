<section class="banner">
    <div class="is-flex is-justify-content-center is-align-items-center crud_create_container">
        <div
            class="banner_text is-flex is-justify-content-sm-start is-justify-content-md-center is-align-items-center is-flex-direction-column">
            <h1 class="banner_title "> Create Advertisement (min: 1 max: 40 chars)</h1>
            <div class="field">
                <div class="control">
                    <form action="http://<?php echo HOST ?>/<?php echo ROOT_FOLDER_NAME ?>/crudadvertisements/store"
                        method="POST">
                        <input type="hidden" name="create_advertisements_userid" value="<?php echo $datas[0] ?>">
                        <input class="input" type="text" minlength="1" maxlength="40"
                            name="create_advertisements_title">
                        <button class="button is-link mt-3" type="submit"> Create Advertisement </button>
                    </form>
                </div>
            </div>

        </div>
    </div>

</section>