<?php


class CrudAdvertisements extends Controller
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

    // This function renders 'admin/advertisements/create'
    public function create($userid)
    {
        $this->render("admin/advertisements/create", [$userid]);
    }

    /**
     * Show method will call the Advertisement model's selectAdvertisements method to select the advertisement(s) to the related user
     * Call that method with the actual user's id
     * Pass the query result to 'admin/advertisements/show'
     * $datas[0] will contain the result
     */

    public function show($userId)
    {
        $advertisement = new Advertisement();
        $selectAdvertisements = $advertisement->selectAdvertisements($userId);
        $this->render('admin/advertisements/show', [$selectAdvertisements]);
    }

    // Store method will call the CrudAdvertisement model's create method to create new advertisement
    public function store()
    {

        $advertisement = new CrudAdvertisement();
        $advertisement->create();
        return $this->index();
    }

    /**
     * Edit method used to pass the actual advertisement's id to CrudAdvertisement model's edit method. That will select the actual advertisement from the database
     * Then call the CrudAdvertisement model's edit method
     * Pass the query result to 'admin/advertisements/update'
     * $datas[0] will contain the query result
     * $datas[1] will contain the actual advertisement's id, because we want to pass that to the update method
     */
    public function edit($AdvertisementId)
    {
        $advertisement = new CrudAdvertisement();
        $result = $advertisement->edit($AdvertisementId);

        //passing $userKey to 'admin/update'. $datas[0] contains the query result, $datas[1] contains the $userKey
        $this->render('admin/advertisements/update', [0 => $result, 1 => $AdvertisementId]);
    }

    /**
     * Update method used to pass the actual advertisement's id to CrudAdvertisement model's update method. That will update the actual advertisement into the database
     * Returning the index method which renders the 'admin/users/index' view
     */
    public function update($AdvertisementId)
    {
        $advertisement = new CrudAdvertisement();
        $advertisement->update($AdvertisementId);

        return $this->index();
    }

    /**
     * Delete method used to pass the actual user's id to CrudAdvertisement model's delete method. That will delete the actual advertisement from the database
     * Call the CrudAdvertisement's delete method with the advertisement's title that we want to delete
     * Returning the index method which renders the 'admin/users/index' view
     */
    public function delete($title)
    {
        $user = new CrudAdvertisement();
        $user->delete($title);
        return $this->index();
    }
}