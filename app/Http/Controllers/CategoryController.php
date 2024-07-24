<?php

namespace App\Http\Controllers;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $view;
    public function __construct()
    {
        $this->view = [];
    }
    public function index()
    {
        //
        // Khởi tạo model
        $objCate = new Category();

        // Truy vấn + logic
        $this->view['listCate'] = $objCate->loadDataWithPager();
//        dd($this->view['listCate']);
        // Truy vân + logic
//        $objCate = new Category();
//        $listCate = $objCate->loadAllCate();
//        $arrayCate = [];
//        foreach ($listCate as $value){
//            $arrayCate[$value->id] = $value->name;
//        }
//        $this->view['listCate'] =  $arrayCate;
        ///
//        dd( $this->view['listCate']);
        return view('categories.index', $this->view);
    }
    public function create()
    {
        //
//        dd(123);
        $objCate = new Category();
        $this->view['listCate'] = $objCate->loadAllCate();
        return view('categories.create', $this->view);
    }
    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
//        dd($data);
        $category = Category::create($data);

        return redirect()->route('category.index')->with('success', 'Danh mục đã được tạo thành công.');

    }
}
