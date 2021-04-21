<?php

class Home extends Controller
{

    /**
     * Pass the query result to home/index
     * $datas[0] will contain the result
     */
    public function index()
    {
        $user = new User();
        $selectUsers = $user->select();

        $this->render('home/index', [$selectUsers]);
    }
}