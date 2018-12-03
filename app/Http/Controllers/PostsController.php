<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Zttp\Zttp;

class PostsController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $response = Zttp::asFormParams()->post("https://www.google.com/recaptcha/api/siteverify", [
            'secret' => config('captcha.captcha.secret'),
            'response' => request('g-recaptcha-response'),
            'remoteip' => request()->ip(),
        ]);

//        dd($response->json());
        if ($response->json()['success'] !== true) {
            return redirect()->back()->withFlashMessage('Are you BOT ?');
        }

        Post::create([
            'title'=> request('title'),
        ]);

        return back()->withFlashMessage('You have added the post successfully !');
    }
}
