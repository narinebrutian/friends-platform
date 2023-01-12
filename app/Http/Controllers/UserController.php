<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $users = User::all();
        return view('search', compact('users'));
    }

    /**
     * @param Request $request
     * @return string|void
     */
    public function search(Request $request)
    {
        if ($request->ajax()) {
            $data = User::where('name', 'like', '%' . $request->search . '%')->get();

            $output = "";

            if (count($data) > 0) {
                $output = '
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                ';

                foreach ($data as $user){
                    $output .= '
                        <tr>
                            <th scope="row">'.$user->id.'</th>
                            <td>'.$user->name.'</td>
                            <td>
                                <button class="btn btn-outline-success"><span>&#43; &nbsp;</span>Add Friend</button>
                                <button class="btn btn-outline-primary">View Profile</button>
                            </td>
                        </tr>
                    ';
                }

                $output .= '
                        </tbody>
                    </table>
                ';
            } else {
                $output .= "No results.";
            }
            return $output;
        }

    }
}
