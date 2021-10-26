<?php

namespace App\Services;

use App\Models\Employee;
use App\Models\Goal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProgressScoreValidation
{
    private $errors = [];

    const MESSAGES = [
        'INCORRECT_ID' => 'Incorrect id for field ',
    ];

    public function getErrors(Request $request): array
    {
        $validator = Validator::make($request->all(), [
            'employee_id' => 'required|integer',
            'progress'    => 'required|integer|between:0,100',
            'goal_id'     => 'required|integer',
        ]);

        if ($validator->fails()) {
            $this->errors += $validator->errors()->getMessages();
        }

        $employee = Employee::find($request->input('employee_id'));
        if ($employee === null) {
            $this->addIncorrectIdError('employee_id');
        }

        $goal = Goal::find($request->input('goal_id'));
        if ($goal === null) {
            $this->addIncorrectIdError('goal_id');
        }

        return $this->errors;
    }

    private function addIncorrectIdError(string $field): void
    {
        $message = self::MESSAGES['INCORRECT_ID'] . $field;

        if (isset($this->errors[$field])) {
            $this->errors[$field][] = $message;
        } else {
            $this->errors[] = [$field => $message];
        }
    }
}
