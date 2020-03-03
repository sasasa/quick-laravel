<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;

class Comment extends Model
{
    public static $rules = [
        'comment_body'    => 'required|string|max:400',
        'comment_files'    => 'required|array',
        'comment_files.*'    => 'image|mimes:jpeg,png,jpg,gif|dimensions:max_width=400',
    ];

    public function images()
    {
        return $this->morphMany(Image::class, 'attachable');
    }

    public function batchSave(Request $req)
    {
        DB::beginTransaction();
        try {
            $this->post_id = $req->post_id;
            $this->body = $req->comment_body;
            $this->save();
        
            $files = $req->file('comment_files');
            if ($files) foreach ($files as $file) {
                $file->store('public');
                $this->images()->create(['filename' => $file->hashName()]);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
    }

    public function batchDelete()
    {
        DB::beginTransaction();
        try {
            foreach ($this->images as $image)
            {
                Storage::disk('public')->delete($image->filename);
                $image->delete();
            }
            $this->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
    }
}
