<?php

namespace App\Models\Todo;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

/**
 * Class TodoModel
 * 
 * @author Keannu Rim Kristoffer C. Regala <keannu>
 * @since 2023.06.11
 */
class TodoModel
{
    /**
     * @const TABLE_NAME string
     */
    const TABLE_NAME = 'todo';

    /**
     * TodoModel constructor
     */
    public function __construct()
    {
    }

    /**
     * getTodoList
     * @return array
     */
    public function getTodoList() : array
    {
        return DB::table(self::TABLE_NAME)
            ->select([ 'todo_no', 'task', 'is_completed' ])
            ->orderBy('created_at', 'desc')
            ->where('is_deleted', '=', 'F')
            ->get()
            ->toArray();
    }

    /**
     * createTodo
     * @param array $aTodoInfo
     * @return bool
     */
    public function createTodo(array $aTodoInfo) : bool
    {
        try {
            return (bool) DB::table(self::TABLE_NAME)
                ->insert($aTodoInfo);
        } catch(QueryException $oException) {
            return false;
        };
    }

    /**
     * updateTodo
     * @param int $iTodoNo
     * @param array $aTodoInfo
     * @return bool
     */
    public function updateTodo(int $iTodoNo, array $aTodoInfo) : bool
    {
        try {
            return (bool) DB::table(self::TABLE_NAME)
                ->where('todo_no', $iTodoNo)
                ->update($aTodoInfo);
        } catch(QueryException $oException) {
            return false;
        };
    }
}
