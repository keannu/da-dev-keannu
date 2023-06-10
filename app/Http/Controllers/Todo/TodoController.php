<?php

namespace App\Http\Controllers\Todo;

use App\Http\Requests\Todo\CreateTodoRequest;
use App\Services\Todo\TodoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class TodoController
 * 
 * @author Keannu Rim Kristoffer C. Regala <keannu>
 * @since 2023.06.11
 */
class TodoController
{
    /**
     * @var TodoService $oTodoService
     */
    private $oTodoService;

    /**
     * TodoController constructor.
     * @param TodoService $oTodoService
     */
    public function __construct(TodoService $oTodoService)
    {
        $this->oTodoService = $oTodoService;
    }

    /**
     * getTodoList
     * @return JsonResponse
     */
    public function getTodoList()
    {
        $aResult = $this->oTodoService->getTodoList();
        
        return response()->json($aResult['data'], $aResult['code']);
    }

    /**
     * createTodo
     * @param CreateTodoRequest $oCreateTodoRequest
     * @return JsonResponse
     */
    public function createTodo(CreateTodoRequest $oCreateTodoRequest)
    {
        $aResult = $this->oTodoService->createTodo($oCreateTodoRequest->validated());
        
        return response()->json($aResult['data'], $aResult['code']);
    }

    /**
     * updateTodo
     * @param int $iUserNo
     * @return JsonResponse
     */
    public function updateTodo(int $iUserNo)
    {
        $aResult = $this->oTodoService->updateTodo($iUserNo);
        
        return response()->json($aResult['data'], $aResult['code']);
    }

    /**
     * deleteTodo
     * @param int $iUserNo
     * @return JsonResponse
     */
    public function deleteTodo(int $iUserNo)
    {
        $aResult = $this->oTodoService->deleteTodo($iUserNo);
        
        return response()->json($aResult['data'], $aResult['code']);
    }
}
