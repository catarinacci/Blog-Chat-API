<?php

use App\Http\Controllers\NotificationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutenticateController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\TypeReactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReactionmController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryCotroller;
use App\Http\Controllers\Api\NewPasswordController;
use App\Http\Controllers\Api\EmailVerificationController;
use App\Http\Controllers\TagController;


Route::post('register', [AutenticateController::class, 'register']);

Route::post('login', [AutenticateController::class, 'login']);

Route::post('verify-email', [EmailVerificationController::class, 'verify'])->middleware('auth:sanctum');
Route::post('send-verify-email', [EmailVerificationController::class, 'sendVerificationEmail'])->middleware('auth:sanctum');

Route::post('forgot-password', [NewPasswordController::class, 'forgotPassword']);
Route::post('reset-password', [NewPasswordController::class, 'reset']);

Route::post('logout', [AutenticateController::class, 'logout'])->middleware('auth:sanctum');

// Midleware auth and verifyed
Route::get('unauthenticated', function(){
    return response()->json(['res' => false, 'msj'=>'Unauthenticated'],400);
})->name('unauthenticated');
Route::get('unverified', function(){
    return response()->json(['res' => false, 'msj'=>'Your email address is not verified.'],400);
})->name('unverified');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function(){

    //Users
    Route::get('user', [UserController::class, 'show']);
    Route::post('user', [UserController::class, 'update']);
    Route::delete('user', [UserController::class, 'destroy']);

    //Notes
    Route::get('note/{note}', [NoteController::class, 'show']);
    Route::post('note', [NoteController::class, 'store']);
    Route::post('note/{note}', [NoteController::class, 'update']);
    Route::get('notes', [NoteController::class, 'index']);
    Route::delete('note/{note}', [NoteController::class, 'destroy']);
    Route::get('notes-user', [NoteController::class, 'noteUser']);
    Route::get('search/{value}', [NoteController::class, 'search']);

    //Comments
    Route::post('comment', [CommentController::class, 'store']);
    Route::delete('comment/{comment}', [CommentController::class, 'destroy']);
    // Route::get('comment_user', [CommentController::class, 'commentUser']);
    // Route::get('comment_nota/{nota}', [CommentController::class, 'commentNote']);

    //Reactions
    Route::get('reactions', [ReactionmController::class, 'index']);
    Route::post('reaction-note', [ReactionmController::class, 'reactionNote']);
    Route::post('reaction-comment', [ReactionmController::class, 'reactionComment']);
    Route::get('reaction-type', [ReactionmController::class, 'show']);
    Route::delete('reaction/{reaction}', [ReactionmController::class, 'reactionDelete']);

    //Notifications
    Route::get('notifications', [NotificationController::class, 'show']);
    Route::get('notifications/unread', [NotificationController::class, 'unread']);
    Route::get('notifications/read', [NotificationController::class, 'read']);
    Route::get('notifications/{notification_id}', [NotificationController::class, 'maskasread']);

    //Categories
    Route::get('categories',[CategoryCotroller::class, 'show']);
    Route::get('categories/{category_id}',[CategoryCotroller::class, 'searchCategory']);

    //Tags
    Route::get('tags',[TagController::class, 'show']);
    Route::get('tag/{tag_id}',[TagController::class, 'search']);
    Route::post('tag-note', [TagController::class, 'addNote']);
});




Route::get('prueba', function(){

});
