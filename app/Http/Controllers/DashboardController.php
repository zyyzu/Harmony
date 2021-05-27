<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        //pobranie postow z bazy
        $posts = array();
        $dbresponse = DB::table('posts')
        ->join('users', 'posts.author', '=', 'users.id')
        ->select('posts.id as post_id','posts.content','posts.author', 'users.first_name','users.last_name', 'users.id as user_id','posts.visibility', 'posts.created_at', DB::raw('(SELECT COUNT(*) FROM likes WHERE likes.post_id=posts.id) AS likes'))
        ->where('posts.author', '=', Auth::id())
        ->orWhereRaw(DB::raw('posts.author IN (SELECT friends.user2_id FROM friends WHERE friends.user1_id='.Auth::id().')'))
        ->orWhereRaw(DB::raw('posts.author IN (SELECT friends.user1_id FROM friends WHERE friends.user2_id='.Auth::id().')'))
        ->orderByDesc('posts.id')
        ->paginate(15);
        //TODO komentarze
        $liked = DB::table('likes')
        ->where('user_id', Auth::id())
        ->get();
        foreach ($dbresponse as $key => $postdb) {
            //TODO eloquent
            $post = new PostObject($postdb->id, $postdb->content, $postdb->author, $postdb->created_at);
            $post->setAuthor($postdb->first_name.' '.$postdb->last_name);
            $post->setLikes(intval($postdb->likes));

            //TODO avoid 15 database querries
            /*$liked = DB::table('likes')
            ->where('post_id', $postdb->post_id)
            ->where('user_id', Auth::id())
            ->count();*/
            $likeSwitch = false;
            foreach($liked as $key => $like){
                if($like->post_id==$postdb->post_id){
                    $likeSwitch = true;
                    break;
                }
            }
            if($liked>0){
                $post->setLiked(true);
            }else{
                $post->setLiked(false);
            }
            array_push($posts, $post);
        }

        return view('wall.wall',[
            'userFirstName'=> Auth::user()->first_name,
            'userLastName'=> Auth::user()->last_name,
            'posts' => $posts,
            'dbposts' => $dbresponse
        ]);
    }
}
//TODO Eloquent
class Comment{
    private int $id;
    private int $authorId;
    private string $author;
    private string $content;
    private string $creationDate;

    function __construct(int $id, string $content, int $authorid, string $creationDate)
    {
        $this->id=$id;
        $this->content=$content;
        $this->authorId=$authorid;
        $this->creationDate=$creationDate;
    }
}
class PostObject{
    private int $id;
    private string $content;
    private int $authorId;
    private string $author;
    private int $likes;
    private int $visibility = 0;
    private string $creationDate;
    private bool $liked;

    function __construct(int $id, string $content, int $authorid, string $creationDate)
    {
        $this->id=$id;
        $this->content=$content;
        $this->authorId=$authorid;
        $this->creationDate=$creationDate;
    }

    function setLiked(bool $liked){
        $this->liked=$liked;
    }

    function setAuthor(string $author){
        $this->author=$author;
    }
    function setLikes(int $likes){
        $this->likes=$likes;
    }
    function getPostID(): int{
        return $this->id;
    }
    function getPostContent():String {
        return $this->content;
    }
    function getPostAuthor(): string{
        return $this->author;
    }
    function getPostAuthorId(): int{
        return $this->authorId;
    }
    function getPostLikes(): int{
        return $this->likes;
    }
    function getPostVisibility(): int{
        return $this->visibility;
    }
    function getPostCreationDate(): string{
        return $this->creationDate;
    }
    function isLiked() :bool {
        return $this->liked;
    }
}
