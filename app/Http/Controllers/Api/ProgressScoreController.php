<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProgressScore;
use App\Services\ProgressScoreValidation;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProgressScoreController extends Controller
{
    /**
     * Creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ProgressScoreValidation $progressScoreValidation)
    {
        $errors = $progressScoreValidation->getErrors($request);

        if ($errors) {
            return response()->json($errors, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $progressScore = new ProgressScore(
            [
                'employee_id' => $request->input('employee_id'),
                'progress'    => $request->input('progress'),
                'goal_id'     => $request->input('goal_id'),
            ]
        );

        $progressScore->save();

        return response()->json($progressScore, Response::HTTP_CREATED);
    }
}
