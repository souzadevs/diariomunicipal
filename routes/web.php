<?php

use App\Http\Controllers\{
    AuthorController,
    DepartmentController,
    DocumentController,
    DocumentStatusController,
    DocumentTypeController,
    LawController,
    LawProjectController,
    LawProjectSituationController,
    LawProjectStatusController,
    LawProjectStepController,
    PollController,
    PostController,
    UserController,
};

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('management')->group(function() {

    Route::prefix('author')->group(function() {
        Route::get('index', [AuthorController::class, 'index']);
        Route::post('store', [AuthorController::class, 'store']);
        Route::get('modal-store', [AuthorController::class, 'modalStore']);
        Route::post('delete', [AuthorController::class, 'delete']);
    });

    Route::prefix('department')->group(function() {
        Route::get('index', [DepartmentController::class, 'index']);
        Route::post('store', [DepartmentController::class, 'store']);
        Route::get('modal-store', [DepartmentController::class, 'modalStore']);
        Route::post('delete', [DepartmentController::class, 'delete']);
    });

    Route::prefix('document')->group(function() {
        Route::get('index', [DocumentController::class, 'index']);
        Route::post('store', [DocumentController::class, 'store']);
        Route::get('modal-store', [DocumentController::class, 'modalStore']);
        Route::post('delete', [DocumentController::class, 'delete']);
    });

    Route::prefix('document-type')->group(function() {
        Route::get('index', [DocumentTypeController::class, 'index']);
        Route::post('store', [DocumentTypeController::class, 'store']);
        Route::get('modal-store', [DocumentTypeController::class, 'modalStore']);
        Route::post('delete', [DocumentTypeController::class, 'delete']);
    });

    Route::prefix('document-status')->group(function() {
        Route::get('index', [DocumentStatusController::class, 'index']);
        Route::post('store', [DocumentStatusController::class, 'store']);
        Route::get('modal-store', [DocumentStatusController::class, 'modalStore']);
        Route::post('delete', [DocumentStatusController::class, 'delete']);
    });

    Route::prefix('law')->group(function() {
        Route::get('index', [LawController::class, 'index']);
        Route::post('store', [DocumentStatusController::class, 'store']);
        Route::get('modal-store', [DocumentStatusController::class, 'modalStore']);
        Route::post('delete', [DocumentStatusController::class, 'delete']);
    });

    Route::prefix('law')->group(function() {
        Route::get('index', [LawController::class, 'index']);
        Route::post('store', [LawController::class, 'store']);
        Route::get('modal-store', [LawController::class, 'modalStore']);
        Route::post('delete', [LawController::class, 'delete']);
    });

    Route::prefix('law-status')->group(function() {
        Route::get('index', [LawController::class, 'index']);
        Route::post('store', [LawController::class, 'store']);
        Route::get('modal-store', [LawController::class, 'modalStore']);
        Route::post('delete', [LawController::class, 'delete']);
    });

    Route::prefix('law-log')->group(function() {
        Route::get('index', [LawController::class, 'index']);
    });

    Route::prefix('law-project-log')->group(function() {
        Route::get('index', [LawProjectController::class, 'index']);
    });

    Route::prefix('law-project')->group(function() {
        Route::get('index', [LawController::class, 'index']);
        Route::post('store', [LawController::class, 'store']);
        Route::get('modal-store', [LawController::class, 'modalStore']);
        Route::post('delete', [LawController::class, 'delete']);
    });

    Route::prefix('law-project-situation')->group(function() {
        Route::get('index', [LawProjectSituationController::class, 'index']);
        Route::post('store', [LawProjectSituationController::class, 'store']);
        Route::get('modal-store', [LawProjectController::class, 'modalStore']);
        Route::post('delete', [LawProjectSituationController::class, 'delete']);
    });

    Route::prefix('law-project-status')->group(function() {
        Route::get('index', [LawProjectStatusController::class, 'index']);
        Route::post('store', [LawProjectStatusController::class, 'store']);
        Route::get('modal-store', [LawProjectStatusController::class, 'modalStore']);
        Route::post('delete', [LawProjectStatusController::class, 'delete']);
    });

    Route::prefix('law-project-step')->group(function() {
        Route::get('index', [LawProjectStepController::class, 'index']);
        Route::post('store', [LawProjectStepController::class, 'store']);
        Route::get('modal-store', [LawProjectStepController::class, 'modalStore']);
        Route::post('delete', [LawProjectStepController::class, 'delete']);
    });

    Route::prefix('poll')->group(function() {
        Route::get('index', [PollController::class, 'index']);
        Route::post('store', [PollController::class, 'store']);
        Route::get('modal-store', [PollController::class, 'modalStore']);
        Route::post('delete', [PollController::class, 'delete']);
    });

    Route::prefix('post')->group(function() {
        Route::get('index', [PostController::class, 'index']);
        Route::post('store', [PostController::class, 'store']);
        Route::get('modal-store', [PostController::class, 'modalStore']);
        Route::post('delete', [PostController::class, 'delete']);
    });

    Route::prefix('user')->group(function() {
        //  Route::get('index', [UserController::class, 'index']);
        //  Route::post('store', [UserController::class, 'store']);
        //  Route::get('modal-store', [UserController::class, 'modalStore']);
        //  Route::post('delete', [UserController::class, 'delete']);
    });

});
