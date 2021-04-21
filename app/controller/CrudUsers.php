<?php

class CrudUsers extends Controller
{

    /**
     * Pass the query result to 'admin/users/index'
     * $datas[0] will contain the result
     */
    public function index()
    {
        $user = new CrudUser();
        $selectUsers = $user->index();

        $this->render('admin/users/index', [$selectUsers]);
    }


    // This function renders 'admin/users/create'
    public function create()
    {
        $this->render('admin/users/create');
    }

    // Store method will call the CrudUser model's create method to create new user
    public function store()
    {
        $user = new CrudUser();
        $user->create();
        return $this->index();
    }

    /**
     * Edit method used to pass the actual user's id to CrudUser model's edit method. That will select the actual user from the database
     * Then call the CrudUser model's edit method
     * Pass the query result to 'admin/users/update'
     * $datas[0] will contain the query result
     * $datas[1] will contain the actual user's id, because we want to pass that to the update method
     */
    public function edit($userKey)
    {
        $user = new CrudUser();
        $result = $user->edit($userKey);

        $this->render('admin/users/update', [0 => $result, 1 => $userKey]);
    }

    /**
     * Update method used to pass the actual user's id to CrudUser model's update method. That will update the actual user into the database
     * Returning the index method which renders the 'admin/users/index' view
     */
    public function update($userKey)
    {
        $user = new CrudUser();
        $user->update($userKey);

        return $this->index();
    }

    /**
     * Delete method used to pass the actual user's id to CrudUser model's delete method. That will delete the actual user from the database
     * Call the CrudUser's delete method with the userid that we want to delete
     * Returning the index method which renders the 'admin/users/index' view
     */
    public function delete($userKey)
    {
        $user = new CrudUser();
        $user->delete($userKey);
        return $this->index();
    }
}