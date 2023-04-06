<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;

class UserController extends Controller
{
    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('users.index');
    }

    public function store()
    {
        //
    }

    public function destroy
}
