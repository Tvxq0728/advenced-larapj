<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    public function getDetail(){
        $txt="ID".$this->id."". $this->name . '(' . $this->age .  '才'.') '.$this->nationality;
        return $txt;
    }
    protected $fillable=["name","age","nationality"];

    public static $rules=array(
        "name"=>"required",
        "age"=>"integer|min:0|max:150",
        "nationality"=>"required"
    );
    public function books(){
        // return $this->hasOne("App\Models\Book");
        return $this->hasMany("App\Models\Book");
    }
}
