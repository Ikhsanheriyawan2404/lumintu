<?php

namespace App\Http\Controllers;

use App\DataTables\ProductsDataTable;
use App\Http\Requests\PegawaiRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    public function index(ProductsDataTable $dataTable)
    {
        return $dataTable->render('pegawai.index');
    }

    public function store(ProductRequest $request)
    {
        try {
            DB::transaction(function () use ( $request) {
                $user = $request->validated();
                User::Create(
                    [
                        'username' => $request->username,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                    ], $user
                );

            });
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Pegawai berhasil ditambahkan',
        ]);
    }

    public function edit($userId)
    {
        $user = User::find($userId);
        return response()->json($user);
    }
    public function update(PegawaiRequest $request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $user = User::where('id', '=', $id)->update([
                    'username' => $request->username,
                    'email' => $request->email,
                    'password' => $request->password,
                ]);
            } );
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Data barang berhasil diubah',
        ]);
    }
}
