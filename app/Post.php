<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;
use App\Traits\Taggable;

class Post extends Model
{
    use Taggable;

    protected $fillable = ['subject', 'body'];
    
    public function images()
    {
        return $this->morphMany(Image::class, 'attachable');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
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

            $this->deleteWithTags();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function batchSave($req)
    {
        DB::beginTransaction();
        try {
            // $this->fill($req->all())->save();
            $this->tagsCreate($req);

            $files = $req->file('files');
            if ($files) foreach ($files as $file) {
                $file->store('public');
                $this->images()->create(['filename' => $file->hashName()]);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
