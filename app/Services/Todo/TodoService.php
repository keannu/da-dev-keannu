<?php

namespace App\Services\Todo;

use App\Models\Todo\TodoModel;


/**
 * Class TodoService
 * 
 * @author Keannu Rim Kristoffer C. Regala <keannu>
 * @since 2023.06.11
 */
class TodoService
{

    /**
     * @var TodoModel $oTodoModel
     */
    private $oTodoModel;

    /**
     * TodoService constructor.
     * @param TodoModel $oTodoModel
     */
    public function __construct(TodoModel $oTodoModel)
    {
        $this->oTodoModel = $oTodoModel;
    }

    /**
     * getTodoList
     * @return array
     */
    public function getTodoList() : array
    {
        return [
            'code' => 200,
            'data' => $this->oTodoModel->getTodoList()
        ];
    }

    /**
     * createTodo
     * @param array $aTodoInfo
     * @return array
     */
    public function createTodo(array $aTodoInfo) : array
    {
        if ($this->oTodoModel->createTodo($aTodoInfo) === true) {
            return [
                'code' => 200,
                'data' => [
                    'message' => 'Task added successfully.'
                ]
            ];
        }

        return [
            'code' => 500,
            'data' => [
                'message' => 'Failed creating task. Please try again.'
            ]
        ];
    }

    /**
     * updateTodo
     * @param int $iTodoNo
     * @return array
     */
    public function updateTodo(int $iTodoNo) : array
    {
        if ($this->oTodoModel->updateTodo($iTodoNo, [ 'is_completed' => 'T']) === true) {
            return [
                'code' => 200,
                'data' => [
                    'message' => 'Task marked as complete.'
                ]
            ];
        }

        return [
            'code' => 500,
            'data' => [
                'message' => 'Failed marking task as complete. Please try again.'
            ]
        ];
    }

    /**
     * deleteTodo
     * @param int $iTodoNo
     * @return array
     */
    public function deleteTodo(int $iTodoNo) : array
    {
        if ($this->oTodoModel->updateTodo($iTodoNo, [ 'is_deleted' => 'T']) === true) {
            return [
                'code' => 200,
                'data' => [
                    'message' => 'Task deleted successfully.'
                ]
            ];
        }

        return [
            'code' => 500,
            'data' => [
                'message' => 'Failed deleting task. Please try again.'
            ]
        ];
    }
}
