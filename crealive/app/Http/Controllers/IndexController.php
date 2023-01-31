<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Content;
use Database\Seeders\CategorySeeder;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    private $array;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $mainCategories = Category::where('parentId', '=', null)->orderBy('created_at', 'desc')->get();
        $subCategories = Category::where('parentId', '!=', null)->orderBy('created_at', 'desc')->get();
        $contents = Content::where('isActive', '=', true)->orderBy('created_at', 'desc')->paginate(10);
        $contents->withPath('/');
        $pageCount = $contents->lastPage();
        $currentPage = $contents->currentPage();
        $nextPage = $contents->nextPageUrl();
        $prevPage = $contents->previousPageUrl();
        $itemCount = $contents->count();
        return view('index', [
            'mainCategories' => $mainCategories,
            'subCategories' => $subCategories,
            'contents' => $contents,
            'pageCount' => $pageCount,
            'currentPage' => $currentPage,
            'nextPage' => $nextPage,
            'prevPage' => $prevPage,
            'itemCount' => $itemCount
        ]);
    }

    public function search($id)
    {
        $categories = Category::tree();
        $root = $this->getParent($id);
        $idarray = $this->addQeueu($root, $categories);
        $contents = Content::whereIn('categoryId',$idarray)->get();
        return view('contentSearch',['contents'=>$contents]);
    }

    public function addQeueu($rootid, $categories)
    {
        foreach ($categories as $root) {
            if ($root->id == $rootid) {
                $queue = [$root];
                $subcat = [];


                while (count($queue) != 0) {
                    if ($queue[0]->children != null) {
                        foreach ($queue[0]->children as $child) {
                            array_push($queue, $child);
                        }
                    }

                    $subcat[] = $queue[0]->id;
                    unset($queue[0]);
                    $queue = array_values($queue);
                }

            }
        }

        return $subcat;


    }

    private function getParent($id)
    {
        $parent = Category::where('id', '=', $id)->first();
        if ($parent->parentId != null) {
            $category = $this->getParent($parent->parentId);
        } else {
            $category = $parent->id;
        }

        return $category;


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public
    function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public
    function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public
    function show($id)
    {
        $content = Content::with('category')->get()->find($id);
        return view('contentDetails', ['content' => $content]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        //
    }
}
