<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Handlers\ImageUploadHandler;

class UsersController extends Controller
{
    //用户个人页
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(UserRequest $request, ImageUploadHandler $uploader, User $user)
    {
        $data = $request->all();

        //$user->update($request->all());
        if($request->avatar) {
            //我们个人空间里显示区域最大也就 181px，即使要兼容 视网膜屏幕（Retina Screen） 的话，最多也就需要 181px * 2 = 362px
            $result = $uploader->save($request->avatar, 'avatars', $user->id, 362);
            if($result) {
                $data['avatar'] = $result['path'];
            }
        }

        $user->update($data);
        return redirect()->route('users.show', $user->id)->with('success','个人资料更新成功！');
    }
}
