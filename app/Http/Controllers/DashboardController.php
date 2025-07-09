<?php

namespace App\Http\Controllers;

use App\Models\Preference;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
        $data = [65, 59, 80, 81, 56, 55, 40];

         $label = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
        $user = auth()->user();
        $dataset1 = [65, 59, 80, 81, 56, 55, 40];
        $dataset2 = [28, 48, 40, 19, 86, 27, 90];
       
        $words = [
            ['Laravel', 2],
            ['PHP', 4],
            ['Blade', 2],
            ['Eloquent', 3],
            ['Artisan', 2],
            ['Route', 3],
            ['Controller', 3],
            ['Model', 1],
            ['Migration', 3],
            ['Tinker', 4],
        ];
        

          $missingPreferences = !Preference::where('user_id', $user->id)->exists();

         
        return view('dashboard', compact('labels', 'data','label', 'dataset1', 'dataset2','words','missingPreferences'));
    }
}
