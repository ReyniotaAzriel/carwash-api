<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Pastikan Anda mengimpor model User
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::orderBy('username')->get(); // orderBy menggunakan satu parameter
        return response()->json([
            'status' => true,
            'message' => 'Data ditemukan',
            'data' => $data // tanpa tanda kutip untuk variable data

        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataUser = new User();

        $rules =  [
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone_number' => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => true,
                'message' => 'data gagal ditambahkan',
                'data' => $validator->errors(),
            ]);
        }
        $dataUser->username = $request->username;
        $dataUser->email = $request->email;
        $dataUser->password = $request->password;

        $post = $dataUser ->save();
        return response() ->json([
            'status'=>true,
            'message' => 'data berhasil ditambahkan',
        ]);

    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = User::find($id);
        if($data){
            return response()->json([
                'status'=>true,
                'message'=>'Data ditemukan',
                'data'=>$data
            ],200);
        }else{
            return response()->json([
                'status'=>false,
                'message'=>'Data tidak ditemukan'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    { {
            $dataUser = User::find($id);
            if(empty($dataUser)){
                return response()->json_decode([
                    'status'=>false,
                    'message' => 'data tidak ditemukan',
                ]);
            }

            $rules =  [
                'username' => 'required',
                'email' => 'required',
                'password' => 'required',
                'phone_number' => 'required',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'status' => true,
                    'message' => 'data gagal diubah',
                    'data' => $validator->errors(),
                ]);
            }
            $dataUser->username = $request->username;
            $dataUser->email = $request->email;
            $dataUser->password = $request->password;

            $post = $dataUser->save();
            return response()->json([
                'status' => true,
                'message' => 'data berhasil diubah',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataUser = User::find($id);
        if (empty($dataUser)) {
            return response()->json_decode([
                'status' => false,
                'message' => 'data gagal dihapus',
            ],404);
    }
    $post = $dataUser ->delete();

    return response()->json([
        'status'=>true,
        'message' => 'data berhasil dihapus',
    ]);
}
}
