<?php

namespace App\Http\Controllers;

class ResponseFormatter
{
	protected static $response = [
		'meta' => [
			'code' => 200,
			'status' => 'success',
			'message' => null
		],
		'data' => null
	];

	public static function success($data = null, $message = null, $code = null)
	{
		self::$response['meta']['message'] = $message;
		self::$response['data'] = $data;

		return response()->json($data, $code ?? 200);
	}

	public static function error($data = null, $message = null, $code = 400, $detail = null)
	{
		self::$response['meta']['status'] = 'error';
		self::$response['meta']['code'] = $code;
		self::$response['meta']['message'] = $message;
		self::$response['data'] = $data;

		if ($detail != null && $detail instanceof \Illuminate\Support\MessageBag) {
			$errorMessages = [];
            foreach ($detail->toArray() as $key => $value) {
				$errorMessages = array_merge($errorMessages, $value);
            }
			$detail = $errorMessages;
		}

        return response()->json([
			'success' => false,
			'code' => $code,
			'message' => $message,
			'detail' => $detail
		], $code);
	}
}
