<section class="banner">
    <div class="is-flex is-justify-content-center is-align-items-start container">
        <div class="banner_text is-flex is-justify-content-center is-justify-content-sm-center is-align-items-center
            is-flex-direction-column">
            <h1 class=" banner_title is-align-self-center"> Update / Delete advertisement</h1>
            <div class="is-align-self-center mb-5">
                <a href="http://<?php echo HOST ?>/<?php echo ROOT_FOLDER_NAME ?>/crudusers" class="button is-link">Go
                    to admin panel</a>
            </div>
            <?php foreach ($datas[0] as $advertisement) { ?>

            <div class="columns is-flex mt-5 showadvertisements" style="text-align: center">
                <div class="column-4" id="showadvertisements-first-col">
                    <?php echo $advertisement->title  ?>
                </div>
                <div class="column-4 ml-md-5">
                    <form
                        action="http://<?php echo HOST ?>/<?php echo ROOT_FOLDER_NAME ?>/crudadvertisements/edit/<?php echo $advertisement->advertisementid ?>"
                        method="PUT">
                        <button class="button is-success" type="submit">UPDATE</button>
                    </form>
                </div>
                <div class="column-4 ml-md-5">
                    <form
                        action="http://<?php echo HOST ?>/<?php echo ROOT_FOLDER_NAME ?>/crudadvertisements/delete/<?php echo $advertisement->title ?>"
                        method="POST">
                        <button class="button is-danger" type="submit">DELETE</button>
                    </form>
                </div>
            </div>

            <?php } ?>

        </div>
    </div>

</section>