<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    protected $fillable = ['subject', 'body'];
    
    public static $rules = [
        'subject'    => 'required|string|max:20',
        'body'    => 'required|string|max:400',
        'files'    => 'required|array',
        'files.*'    => 'image|mimes:jpeg,png,jpg,gif|dimensions:max_width=600',
    ];
    
    public function images()
    {
        return $this->morphMany(Image::class, 'attachable');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
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
            foreach ($this->comments as $comment)
            {
                foreach ($comment->images as $image)
                {
                    Storage::disk('public')->delete($image->filename);
                    $image->delete();
                }
            }

            $this->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
    }

    public function batchSave(Request $req)
    {
        DB::beginTransaction();
        try {
            $this->fill($req->all())->save();

            $files = $req->file('files');
            if ($files) foreach ($files as $file) {
                $file->store('public');
                $this->images()->create(['filename' => $file->hashName()]);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
    }
}
