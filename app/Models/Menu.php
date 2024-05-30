<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Menu extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'name',
    //     'gambar',
    //     'harga',
    // ];

    protected $guarded = [];
    public function getImageAsset()
    {
        // if ($this->image) {
        //     return asset('storage/ImageSpots/'.$this->image);
        // }
        if (File::exists('upload/menu/' . $this->gambar)) {
            return asset('/upload/menu/'.$this->gambar);
        }

        return 'https://placehold.co/150x200?text=No+Image';
    }
}
