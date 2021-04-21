<section class="banner">
    <div class="is-flex is-justify-content-center is-align-items-center container">
        <div
            class="banner_text is-flex is-justify-content-start is-justify-content-sm-center is-align-items-center is-flex-direction-column ml-2">
            <h1 class="banner_title is-align-self-center">Admin panel</h1>
            <div class="is-align-self-center mb-5">
                <form action="http://<?php echo HOST ?>/<?php echo ROOT_FOLDER_NAME ?>/crudusers/create" method="POST">
                    <a onclick="this.parentNode.submit();" class="button is-link mt-3" type="submit"> CREATE NEW
                        USER</a>
                    <a href="http://<?php echo HOST ?>/<?php echo ROOT_FOLDER_NAME ?>/" class="button is-link mt-3">Go
                        to user panel</a>
                </form>
            </div>

            <?php foreach ($datas[0] as $user) { ?>

            <div class="columns">
                <div class="column is-2 banner_text_h2" id="cruduser-first-col">
                    <form action="
                    http://<?php echo HOST ?>/<?php echo ROOT_FOLDER_NAME ?>/advertisements/<?php echo $user->id ?>"
                        method="POST">
                        <input type="hidden" name="user_id" value="<?php echo $user->id ?>">
                        <a onclick="this.parentNode.submit();"> <?php echo  $user->name ?></a>
                    </form>
                </div>
                <div class="column is-2 banner_text_h2" id="cruduser-second-col">
                    <form
                        action="http://<?php echo HOST ?>/<?php echo ROOT_FOLDER_NAME ?>/crudusers/edit/<?php echo $user->id ?>"
                        method="PUT">
                        <button class="button is-success" type="submit"> Update user
                        </button>
                    </form>
                </div>
                <div class="column is-2 banner_text_h2" id="cruduser-third-col">
                    <form
                        action="http://<?php echo HOST ?>/<?php echo ROOT_FOLDER_NAME ?>/crudusers/delete/<?php echo $user->id ?>"
                        method="POST">
                        <button class="button is-danger" type="submit"> Delete user</button>
                    </form>
                </div>
                <div class="column is-3 banner_text_h2" id="cruduser-fourth-col">
                    <form
                        action="http://<?php echo HOST ?>/<?php echo ROOT_FOLDER_NAME ?>/crudadvertisements/create/<?php echo $user->id ?>"
                        method="POST">
                        <input type="hidden" name="create_advertisements_userid" value="<?php echo $user->id ?>">
                        <button class="button is-warning" type="submit"> Create advertisement</button>
                    </form>
                </div>
                <div class="column is-3 banner_text_h2" id="cruduser-fifth-col">
                    <form
                        action="http://<?php echo HOST ?>/<?php echo ROOT_FOLDER_NAME ?>/crudadvertisements/show/<?php echo $user->id ?>"
                        method="PUT">
                        <button class="button" type="submit"> Update/delete advertisement(s)</button>
                    </form>
                </div>

            </div>

            <?php } ?>

        </div>
    </div>

</section>