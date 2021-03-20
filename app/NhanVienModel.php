<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class NhanVienModel extends Authenticatable
{
    //ten bang
    protected $table = 'nhanvien';
    //Khoa chinh
    protected $primaryKey= 'nv_id';
    //Truong can them
    protected $fillable = ['nv_hoten','nv_sdt','username','password','q_id'];

    protected $hidden =[];
    protected $dates =[];
}
