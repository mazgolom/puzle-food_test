<?php

namespace App\Http\Controllers\V1\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SaveOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\Order as OrderResources;
use App\Models\Order;
class OrderController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveOrderRequest $request)
    {
        $validated = $request->validated();

        $Order = new Order();
        $Order->name = $request->name;
        $Order->surname = $request->surname;
        $Order->middle_name = $request->middle_name;
        $Order->phone = $request->phone;
        $Order->address = $request->address;
        $Order->order_id = rand(1000,10000);
        $Order->summ = $request->summ;
        
        if( ! $Order->save() ) return response()->json(['msg' => 'Что-то пошло не так,попробуйте еще раз.'],400);

        return response()->json([
            'msg' => 'Операция прошла успешно.',
            'data' => new OrderResources($Order)
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($order_id)
    {
        $Order = Order::firstWhere('order_id',$order_id);

        if( ! $Order ) return response()->json(['msg' => 'Ордер не найден.'],404);

        return response()->json([ 'data' => new OrderResources($Order)]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, $order_id)
    {
        $Order = Order::firstWhere('order_id',$order_id);
        if( ! $Order ) return response()->json(['msg' => 'Ордер не найден.'],404);
        $validated = $request->validated();

        $Order->name = $request->name;
        $Order->surname = $request->surname;
        $Order->middle_name = $request->middle_name;
        $Order->phone = $request->phone;
        $Order->address = $request->address;
        $Order->summ = $request->summ;
        
        if( ! $Order->update() ) return response()->json(['msg' => 'Что-то пошло не так,попробуйте еще раз.'],400);

        return response()->json([
            'msg' => 'Ордер обновлен.',
            'data' => new OrderResources($Order)
        ],200);
    }

}
