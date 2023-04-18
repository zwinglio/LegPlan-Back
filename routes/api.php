<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ObjectiveController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\InitiativeController;
use App\Http\Controllers\PerspectiveController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
    return response()->json([
        'version' => app()->version(),
    ]);
});

Route::get('/company', [CompanyController::class, 'index']);
Route::put('/company', [CompanyController::class, 'update']);

Route::apiResource('/users', UserController::class);

Route::apiResource('/departments', DepartmentController::class);

Route::apiResource('/perspectives', PerspectiveController::class);
Route::apiResource('/perspectives/{perspective}/objectives', ObjectiveController::class);
Route::apiResource('/perspectives/{perspective}/objectives/{objective}/initiatives', InitiativeController::class);
Route::apiResource('/perspectives/{perspective}/objectives/{objective}/initiatives/{initiative}/actions', ActionController::class);
Route::apiResource('/perspectives/{perspective}/objectives/{objective}/initiatives/{initiative}/actions/{action}/tasks', TaskController::class);


Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
});

Route::group(['middleware' => 'auth:api',], function ($router) {
    Route::post('me', [AuthController::class, 'me']);
});
