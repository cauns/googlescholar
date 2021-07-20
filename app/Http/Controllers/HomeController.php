<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 7/17/21
 * Time: 2:46 PM
 */

namespace App\Http\Controllers;


use App\helper\ScholarHelper;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $helper = new ScholarHelper();
            $data = $helper->getArticleByAuthorId($request->request->get('search'));
            $viewHtml = view('result', compact('data'))->render();
            return response()->json([
                'status' => 200,
                'data' => $viewHtml,
                'code' => $data['publications']['list'],
            ]);

        }
        return \response()->json([
            'status' => 201,
            'data' => 'omg'
        ]);
    }
}
