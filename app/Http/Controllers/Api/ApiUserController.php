<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Models\User;
use Illuminate\Http\Request;

class ApiUserController extends ApiController
{
    public function index(Request $request){
        $userList = User::query()
        ->select(['id', 'name','phone', 'password'])
        ->latest('id')
        ->get();
        
        return $this->sendSuccess($userList);
    }
    public function show(Request $request,$id){
        $userList = User::query()
        ->select(['id', 'name','phone', 'password'])
        ->where('id', $id)
        ->first();
        
        return $this->sendSuccess($userList);
    }
    public function store(Request $request){
        User::create([
            'name' =>'siswa',
            'phone' => '123456',
            'password' => 'siswa123'
        ]);
        return $this->sendMessage("User berhasil ditambahkan");
    }
    public function update(Request $request,$id){
        User::query()
        ->where('id', $id)
        ->update([
            'name' => 'siswa 1'
        ]);
        return $this->sendMessage('Data berhasil disimpan');
    }
    public function destroy(Request $request,$id){
        User::query()
        ->where('id', $id)
        ->delete();
        return $this->sendMessage('Data berhasil dihapus');
    }
}
