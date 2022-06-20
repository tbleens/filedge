<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Upload extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'original_filename', 'file_id', 'file_path',
    'file_type', 'file_size', 'method'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function extension()
    {
        return $this->belongsTo(Extension::class, "file_type", "name");
    }

    public function getTotalUpload()
    {
        return $this->select(DB::raw("SUM(amount_total) as paidsum"))->count();
    }

    public function getTotalDownload()
    {
        return $this->select(DB::raw("SUM(amount_total) as paidsum"))->count();
    }

    public function scopesearchByFileName(Builder $query, $value)
    {
        return $query->where('original_filename', 'like', '%' . $value . '%');
    }
}
