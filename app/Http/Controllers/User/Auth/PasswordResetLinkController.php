<?php

namespace App\Http\Controllers\User\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     * (パスワードリセットリンク要求ビューを表示します。)
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('user.auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     * (着信パスワードリセットリンク要求を処理します。)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        //このユーザーにパスワードリセットリンクを送信します。私たちが試みたら
        //リンクを送信するには、応答を調べてからメッセージを確認します
        //ユーザーに表示する必要があります。最後に、適切な応答を送信します。
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
        ? back()->with('status', __($status))
        : back()->withInput($request->only('email'))
                ->withErrors(['email' => __($status)]);
}
}
