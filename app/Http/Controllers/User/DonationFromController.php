<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use App\Donation;
use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DonationFromController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //באמצע פיתוח
      return view('user.donations.from.index', [
        'donationsFrom' => Donation::where('donation_from_user', Auth::user()->id)
        ->with(['users'=>    function($query){
            // selecting fields from users table
            $query->select('id','name', 'email');
        }])
        ->with(['articles'=> function($query){
            // selecting fields from articles table
            $query->select('id','title', 'description_short');
        }])
        ->paginate(10)
      ]);
      //באמצע פיתוח
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Donation $donation)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      Donation::create($request->all());

      return redirect()->route('user.donationfrom.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function show(Donation $donation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function edit(Donation $donation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donation $donation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donation $donation)
    {
        //
    }
}
