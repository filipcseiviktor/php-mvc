<?php

class Advertisements extends Controller
{
    /**
     * Pass the actual user's id to the model then call the query
     * Pass the query result to home/advertisements
     * $datas[0] will contain the result
     */
    public function index($userid)
    {
        $advertisement = new Advertisement();
        $selectAdvertisements = $advertisement->selectAdvertisements($userid);

        $this->render('home/advertisements', [$selectAdvertisements]);
    }
}