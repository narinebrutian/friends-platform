<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserAutoCompleteController extends Controller
{
    /**
     * @return View
     */
    public  function index(): View
    {
        return view('users.search');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function query(Request $request): JsonResponse
    {
        $input = $request->get('query');
        $data = User::where("name", "LIKE", "%".$input."%")
              ->get();

        return response()->json($data);
    }
}
