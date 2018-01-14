<?php

namespace App;
// namespace App\Model; //chinh lai khi move vao Folder Model

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;//them vao

class User extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getItems(){
        return $this->all();
    }

    public function addItem($request){
        $this->username = $request->username;
        // $this->password = Hash::make($request->password);
        $this->password = encrypt($request->password);
        $this->fullname = $request->fullname;
        return $this->save();  //để ý phải có return, nếu ko kqua trả về là null nhé
    }

    public function delItem($id){
        return $this->findOrFail($id)->delete();
    }

    public function getItem($id){
        return $this->findOrFail($id);
    }
    public function editItem($id,$request){       
        $request->validate([
            //'username'=>'required|unique:users'.$id         ,
            //'username' => 'required',            
            'fullname' => 'required',           
        ],[
            //'username.required'=>'Bạn phải nhập username',
            // 'username.unique'=>'Username đã tồn tại',
            'fullname.required'=>'Bạn phải nhập fullname',
        ]);
        if(!empty($request->password)){
            $request->validate([
                'repass'    =>'same:password'
            ],[
                'repass.same'=>'Mật khẩu không khớp'
            ]);            
        } 
        
        $objItem = $this->findOrFail($id);
        // $objItem->username = $request->username;       
        $objItem->fullname = $request->fullname;
        if(!empty($request->password)){
            $objItem->password = encrypt($request->password);
        }

        return $objItem->save();
    }
}
