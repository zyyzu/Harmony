<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('post-visibility', function(User $user, int $postID){
            $result = DB::table('posts')->select('author')->where('id', $postID)->first();
            $authorID = $result->author;

            if($authorID==$user->id) return true;

            $friendTest = DB::table('friends')
            ->select('id')
            ->where([
                ['user1_id', '=', $authorID],
                ['user2_id', '=', $user->id]
            ])
            ->orWhere([
                ['user2_id', '=', $authorID],
                ['user1_id', '=', $user->id]
            ])
            ->count();


            if($friendTest==0) return false;
            else return true;
        });
        //
    }
}
