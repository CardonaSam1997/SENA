<?php

namespace App\Http\Controllers\Web;

use App\Services\PayPalService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    private $paypal;

    public function __construct(PayPalService $paypal)
    {
        $this->paypal = $paypal;
    }

    public function create(Request $request)
    {
        return $this->paypal->createOrder($request->amount);
    }

    public function capture($orderId, Request $request)
{
    $response = $this->paypal->captureOrder($orderId);

    $captureStatus = $response['purchase_units'][0]
        ['payments']['captures'][0]['status'] ?? null;

    if ($captureStatus === 'COMPLETED') {

        DB::table('apply_tasks')
            ->where('professional_id', $request->professional_id)
            ->where('task_id', $request->task_id)
            ->update([
                'paid' => true,
                'paid_at' => now()
            ]);

        return response()->json(['message' => 'Pago exitoso']);
    }

    return response()->json([
        'message' => 'No se pudo realizar el pago'
    ], 400);
}
}