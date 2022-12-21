<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param \App\Models\Wallet $wallet
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Wallet $wallet)
    {
        $this->authorize('view', $wallet);

        return view('wallets.show', [
            'wallet' => $wallet,
        ]);
    }
}
