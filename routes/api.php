Route::post('/authenticate', 'AuthController@authenticate');
Route::get('/users/{id}', 'UserController@show');
// Autres routes...
