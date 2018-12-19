<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description', 'content', 'data'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function listArticles($paginate)
    {
        /* $listArticles = self::select('id', 'title', 'description', 'user_id', 'data')->paginate($paginate);
        
        foreach ($listArticles as $key => $value) {
            $value->user_id = User::find($value->user_id)->name;
            //$value->user_id = $value->user->name;
            //unset($value->user);
        } */

        $listArticles = DB::table('articles')
            ->join('users', 'users.id', '=', 'articles.user_id')
            ->select('articles.id', 'articles.title', 'articles.description', 'users.name', 'articles.data')
            ->whereNull('deleted_at')
            ->paginate($paginate);

        return $listArticles;
    }

    public static function listArticlesSite($paginate)
    {

        $listArticles = DB::table('articles')
            ->join('users', 'users.id', '=', 'articles.user_id')
            ->select('articles.id', 'articles.title', 'articles.description', 'users.name as author', 'articles.data')
            ->whereNull('deleted_at')
            ->whereDate('data', '<=', date('Y-m-d') )
            ->orderBy('data', 'DESC')
            ->paginate($paginate);

        return $listArticles;
    }
}
