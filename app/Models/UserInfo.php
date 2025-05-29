<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class UserInfo extends Model
{
    use HasFactory;
public function showMedecins()
{
    $medecins = UserInfo::all();
    return view('admin.medecins', compact('medecins'));
}

}
