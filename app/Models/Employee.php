<?php


// app/Models/Employee.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = []; // atau: protected $fillable = ['nip','nama','jabatan','satuan_kerja','agama','pendidikan'];
}
