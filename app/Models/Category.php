<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'id',
        'name',
        'status',
        'created_at',
        'updated_at'
    ];

    public $timestamps = false;

    public function loadAllCate()
    {
        return DB::table($this->table)
            ->select($this->fillable)
            ->get();
    }

    public function loadDataWithPager()
    {
        // Truy vấn kèm phân trang
        return $this->latest('id')
            ->paginate(10);
    }
}
