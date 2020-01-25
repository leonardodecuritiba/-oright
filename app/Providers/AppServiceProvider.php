<?php

namespace App\Providers;

use App\Models\Admins\Admin;
use App\Models\Blog\BlogCategory;
use App\Models\Blog\Comment;
use App\Models\Blog\Post;
use App\Models\Cases\Casex;
use App\Models\Clients\Assign;
use App\Models\Clients\Client;
use App\Models\Plans\Plan;
use App\Models\Works\Category;
use App\Models\Works\Coparcenary;
use App\Models\Works\Work;
use App\Models\Works\WorkFile;
use App\Observers\Admins\AdminObserver;
use App\Observers\Blogs\CommentObserver;
use App\Observers\Cases\CaseObserver;
use App\Observers\Plans\PlanObserver;
use App\Observers\Clients\AssignObserver;
use App\Observers\Clients\ClientObserver;
use App\Observers\Blogs\BlogCategoryObserver;
use App\Observers\Works\CategoryObserver;
use App\Observers\Blogs\PostObserver;
use App\Observers\Works\CoparcenaryObserver;
use App\Observers\Works\WorkFileObserver;
use App\Observers\Works\WorkObserver;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Faker\Generator as FakerGenerator;
use Faker\Factory as FakerFactory;
use Zizaco\Entrust\MigrationCommand;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot() {
		Schema::defaultStringLength( 191 );
//		User::observe( UserObserver::class );
		Admin::observe( AdminObserver::class );
		Category::observe( CategoryObserver::class );
		Client::observe( ClientObserver::class );
		BlogCategory::observe( BlogCategoryObserver::class );
		Post::observe( PostObserver::class );
		Comment::observe( CommentObserver::class );
		Work::observe( WorkObserver::class );
		WorkFile::observe( WorkFileObserver::class );
		Coparcenary::observe( CoparcenaryObserver::class );
		Casex::observe( CaseObserver::class );
		Assign::observe( AssignObserver::class );
		Plan::observe( PlanObserver::class );
		Carbon::setLocale('pt_BR');
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register() {
		$this->app->singleton( FakerGenerator::class, function () {
			return FakerFactory::create( 'pt_BR' );
		} );
//		$this->app->extend('command.entrust.migration', function () {
//			return new class extends MigrationCommand {
//				public function handle() {
//					parent::fire();
//				}
//			};
//		});
	}
}
