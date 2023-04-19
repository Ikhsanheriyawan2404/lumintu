<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\UserDetail;
use InvalidArgumentException;
use App\Models\ProductCustomer;
use App\DataTables\UserDataTable;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('admin.users.index', [
            'roles' => Role::get(),
        ]);
    }

    public function store()
    {
        $itemId = request('item_id');

        try {
            DB::transaction(function () use ($itemId) {

                $validated = [
                    'name' => 'required|string',
                    'email' => 'required|email|unique:users,email',
                    'username' => 'required|string|unique:users,username',
                    'password' => 'required',
                    'role' => 'required|string',
                    'address' => 'required|string',
                    'phone_number' => 'required|string',
                ];

                if ($itemId) {
                    $validated['email'] = 'required|email|unique:users,email,' . $itemId;
                    $validated['username'] = 'required|string|unique:users,username,' . $itemId;
                    $validated['password'] = 'sometimes';
                    request()->validate($validated);

                    $user = User::findOrFail($itemId);
                    $user->name = request('name');
                    $user->email = request('email');
                    $user->username = request('username');
                    $user->password = request('password') ? password_hash(request('password'), PASSWORD_DEFAULT) : $user->password;
                    $user->syncRoles(request('role'));
                    $user->save();

                    $userDetail = UserDetail::where('user_id', $user->id)->first();

                    if (!$userDetail) {
                        $userDetail = new UserDetail();
                        $userDetail->user_id = $user->id;
                    }

                    $userDetail->address = request('address');
                    $userDetail->phone_number = request('phone_number');
                    $userDetail->save();
                } else {
                    request()->validate($validated);

                    $user = User::create([
                        'name' => request('name'),
                        'email' => request('email'),
                        'username' => request('username'),
                        'password' => password_hash(request('password'), PASSWORD_DEFAULT),
                    ])->assignRole(request('role'));

                    UserDetail::create([
                        'user_id' => $user->id,
                        'address' => request('address'),
                        'phone_number' => request('phone_number'),
                    ]);

                    if (request('role') == 'hotel') {
                        // Buat price list dari user hotel tersebut
                        $products = Product::get(['id', 'price']);
                        foreach ($products as $product) {
                            ProductCustomer::create([
                                'user_id' => $user->id,
                                'product_id' => $product->id,
                                'price' => $product->price,
                            ]);
                        }
                    }
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

    public function edit($userId)
    {
        $user = User::with('user_detail', 'roles')->find($userId);
        return response()->json($user);
    }

    public function changeStatus($userId)
    {
        $order = User::find($userId);
        $order->update([
            'active' => request('active')
        ]);

        return response()->json(['message' => 'User berhasil ' . (request('active') == 1 ? 'diaktifkan' : 'dinonaktifkan')]);
    }
}
