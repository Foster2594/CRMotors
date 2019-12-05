<?php

namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditCupon;
use App\Http\Requests\MakeCupon;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $coupons=Coupon::paginate();

        return view('admin.coupons.index', compact('coupons'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MakeCupon $request)
    {
        $coupons=Coupon::create($request->all());

        return redirect()->route('coupons.edit',$coupons->id)->with('info','Cupón guardado con éxito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coupon  $coupons
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        return view('admin.coupons.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coupon  $coupons
     * @return \Illuminate\Http\Response
     */
    public function update(EditCupon $request, Coupon $coupon)
    {
        /**
         */
        $coupon->update($request->all());

        return redirect()->route('coupons.edit',$coupon->id)->with('info','Cupón actualizado con éxito');
    }
}
