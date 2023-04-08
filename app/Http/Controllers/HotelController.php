<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\UserDetail;
use InvalidArgumentException;
use App\Models\ProductCustomer;
use App\DataTables\HotelDataTable;
use Illuminate\Support\Facades\DB;

class HotelController extends Controller
{
    public function index(HotelDataTable $dataTable)
    {
        return $dataTable->render('hotels.index');
    }

    public function getPriceList($userId)
    {
        $user = ProductCustomer::with('product')->where('user_id', $userId)->get();
        return response()->json($user);
    }

    public function store()
    {
        try {
            DB::transaction(function () {

                request()->validate([
                    'name' => 'required|string',
                    'email' => 'required|email|unique:users,email',
                    'username' => 'required|string|unique:users,username',
                    'password' => 'required',
                    'address' => 'required|string',
                    'phone_number' => 'required|string',
                ]);

                // Buat User terlebih dahulu lalu ...
                $user = User::create([
                    'name' => request('name'),
                    'email' => request('email'),
                    'username' => request('username'),
                    'password' => password_hash(request('password'), PASSWORD_DEFAULT),
                ])->assignRole('hotel');

                UserDetail::create([
                    'user_id' => $user->id,
                    'address' => request('address'),
                    'phone_number' => request('phone_number'),
                ]);

                // Buat price list dari user hotel tersebut
                $products = Product::get(['id', 'price']);
                foreach ($products as $product) {
                    ProductCustomer::create([
                        'user_id' => $user->id,
                        'product_id' => $product->id,
                        'price' => $product->price,
                    ]);
                }
            });
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Data user berhasil disimpan',
        ]);
    }
}
