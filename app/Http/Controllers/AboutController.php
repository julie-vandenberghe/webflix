<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index() {
        return view('about', [
            'title' => 'Webflix',
            'team' => [
                [
                    'prenom' => 'Julie', 
                    'nom' => 'Vandenberghe', 
                    'fonction' => 'développeuse', 
                    'image' => 'https://i.pravatar.cc/75?u=julie'
                ],
                [
                    'prenom' => 'Angèle', 
                    'nom' => 'Despretz', 
                    'fonction' => 'développeuse', 
                    'image' => 'https://i.pravatar.cc/75?u=angele'
                ],
                [
                    'prenom' => 'Loki', 
                    'nom' => '🐱', 
                    'fonction' => 'ronronneur', 
                    'image' => 'https://images.unsplash.com/photo-1490650034439-fd184c3c86a5?q=80&w=2080&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
                ],
            ]
        ]);
    }

    public function show($user) {
   
        return view('about-show', [
            'user' => $user,
        ]);
    }


}
