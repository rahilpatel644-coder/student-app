<?php
use Illuminate\Http\Request;
use App\Http\Controllers\StudentController;

Route::get('/login', function () {
    return view('login');
});
Route::resource('students', StudentController::class);

Route::post('/login', function (Request $request) {
    if ($request->email == "admin@gmail.com") {
        session(['user' => $request->email]);
        return redirect()->route('students.index');
    }
    return back()->with('error', 'Invalid Email');
});

Route::get('/logout', function () {
    session()->forget('user');
    return redirect('/login');
});

Route::middleware(['check.login'])->group(function () {
    Route::resource('students', StudentController::class);
});