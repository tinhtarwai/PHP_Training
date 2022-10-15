<?php

namespace App\Dao;

use App\Models\Task;
use App\Contracts\Dao\ListDaoInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

/**
 * Data accessing object for post
 */
class ListDao implements ListDaoInterface
{
  /**
   * To show post
   */
  public function index() {
    
  }
  /**
   * To save post
   */
  public function storeList(request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);
 
    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    } 
    $task = new Task;
    $task->name = $request->name;
    $task->save();
    return redirect('/');
  }

  /**
   * To delete post by id
   */
  public function deleteList($id) {
    Task::findOrFail($id)->delete();
    return redirect('/');
  }
}
