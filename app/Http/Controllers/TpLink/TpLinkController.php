<?php

namespace App\Http\Controllers\TpLink;

use App\Keyword;
use App\Platform;
use App\Product;
use App\ProductInfo;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class TpLinkController extends Controller
{
    /**
     * 仪表盘
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dashboard()
    {
        // 统计品牌数
        $platform_count = Platform::all()->count();
        // 产品数量
        $product_count = Product::all()->count();
        return view('TpLink.index', compact('platform_count', 'product_count'));
    }

    /**
     * 个人信息
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile()
    {
        return view('TpLink.profile');
    }

    /**
     * 修改个人信息
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editProfile()
    {
        return view('TpLink.editProfile');
    }

    /**
     * 所有用户信息
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function users()
    {
        // 获取所有用户信息
        $users = User::orderBy('id', 'desc')->paginate(20);
        return view('TpLink.users', compact('users'));
    }

    /**
     * 修改用户信息
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editUser($id)
    {
        // 查找用户
        $user = User::findOrFail($id);
        return view('TpLink.editUser', compact('user'));
    }

    public function storeUser(Request $request, $id)
    {
        // 允许的字段
        $allow_fields = [
            'name', 'email', 'avatar', 'password'
        ];
        // 验证表单
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id
        ]);
        // 验证失败
        if ($validator->fails()) {
            return redirect()->route('tp.editUser', $id)
                ->withErrors($validator)
                ->withInput();
        }
        // 取得允许的字段
        $data = array_filter($request->only($allow_fields));
        $user = User::findOrFail($id);
        $user->name = $data['name'];
        $user->email = $data['email'];
        if ($data['password'] != null) {
            $user->password = bcrypt($data['password']);
        }
        $user->save();
        return redirect()->route('tp.users')
            ->with([
                'message' => 'Successfully modify',
                'alert-type' => 'success'
            ]);
    }

    /**
     * 查看用户信息
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showUser($id)
    {
        // 查找用户
        $user = User::findOrFail($id);
        return view('TpLink.showUser', compact('user'));
    }

    /**
     * 删除用户
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delUser($id)
    {
        // 直接删除用户
        User::findOrFail($id)->delete();
        return redirect()->route('tp.users');
    }

    /**
     * 查找所有平台
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function platforms()
    {
        // 查找所有平台
        $platforms = Platform::all();
        return view('TpLink.showPlatform', compact('platforms'));
    }

    /**
     * 查看某个平台的product
     * @param $id
     */
    public function showPlatform($id)
    {
        $platform = Platform::findOrFail($id);
        // 查找对应平台下的所有product
        $products = ProductInfo::where('platform_id', $id)->groupBy('product_id')->orderBy('num', 'desc')
            ->paginate(20);
//        dd($products);
        return view('TpLink.showPlatformProduct', compact('products', 'platform'));
    }

    /**
     * 所有的product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function products()
    {
        // 查找所有的product
//        $products = Product::orderBy('id', 'desc')->paginate(10);
        $products = ProductInfo::groupBy('product_id')->orderBy('num', 'desc')->paginate(20);
        return view('TpLink.products', compact('products'));
    }


    /**
     * 显示某个产品
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showProduct($id)
    {
        // 查找product
        $product = ProductInfo::where('product_id', $id)->orderBy('id', 'desc')->first();
        // 卖家处理
        $resellers = json_decode($product->reseller, true);
        // 一周趋势价格
        $weekCharData = $this->priceChart($id, 28);
        // 一个月
        $monthCharData = $this->priceChart($id, 120);
        return view('TpLink.showProduct', compact('product', 'resellers', 'weekCharData', 'monthCharData'));
    }

    /**
     * 根据id导出product
     * @param $id
     */
    public function exportProduct($id)
    {
        // 查找某个product的历史数据
        $product = DB::table('product_info')
            ->join('product', 'product_info.product_id', '=', 'product.id')
            ->select('product.id as id', 'product.name as name', 'product.url as url',
                'product_info.reseller as reseller', 'product_info.price as price', 'product_info.fast_delivery as fast_delivery',
                'product_info.free_shipping as free_shipping', 'product_info.num as num', 'product_info.created_at as created_at')
            ->where('product_info.product_id', $id)
            ->orderBy('product_info.num', 'desc')
            ->get()
            ->toArray();
        // 组合数据
        $data = [
            ['id', 'name', 'url', 'reseller', 'price', 'fast_delivery', 'free_shipping', 'num', 'created_at']
        ];
        foreach ($product as $value) {
            $data[] = [$value->id, $value->name, $value->url, $value->reseller, $value->price,
                $value->fast_delivery, $value->free_shipping, $value->num, $value->created_at];
        }
        Excel::create('product_' . $id . '_' . date('Y-m-d H:i:s', time()), function ($excel) use ($data) {
            $excel->sheet('Detail', function ($sheet) use ($data) {
                $sheet->rows($data);
            });
        })->export('xls');
    }

    public function exportPlatform($id)
    {
        // 查找某个product的历史数据
        $product = DB::table('product_info')
            ->join('product', 'product_info.product_id', '=', 'product.id')
            ->select('product.id as id', 'product.name as name', 'product.url as url',
                'product_info.reseller as reseller', 'product_info.price as price', 'product_info.fast_delivery as fast_delivery',
                'product_info.free_shipping as free_shipping', 'product_info.num as num', 'product_info.created_at as created_at')
            ->where('product_info.platform_id', $id)
            ->orderBy('product_info.num', 'desc')
            ->get()
            ->toArray();
        // 组合数据
        $data = [
            ['id', 'name', 'url', 'reseller', 'price', 'fast_delivery', 'free_shipping', 'num', 'created_at']
        ];
        foreach ($product as $value) {
            $data[] = [$value->id, $value->name, $value->url, $value->reseller, $value->price,
                $value->fast_delivery, $value->free_shipping, $value->num, $value->created_at];
        }
        Excel::create('platform_' . $id . '_' . date('Y-m-d H:i:s', time()), function ($excel) use ($data) {
            $excel->sheet('Detail', function ($sheet) use ($data) {
                $sheet->rows($data);
            });
        })->export('xls');
    }

    protected function priceChart($id, $limit)
    {
        /*生成Labels*/
        $labels = [];
        $prices = [];
        $chartDatas = [];
        /*取出最近10条记录*/
        $products = ProductInfo::where('product_id', $id)->orderBy('num', 'desc')->limit($limit)->get()->toArray();
        $i = sizeof($products)-1;
        $index = 0;
        for (; $i >= 0; $i--) {
            $labels[$index] = "'" . date('m-d h:s', strtotime($products[$i]['created_at'])) . "'";
            $prices[$index] = $products[$i]['price'];
            $index++;
        }
        return ['labels' => $labels, 'prices' => $prices];

    }

    public function importExcel()
    {
        $filePath = 'storage/imports/platform.xlsx';
        Excel::load($filePath, function ($reader) {
            $data = $reader->all()->toArray();
//            dd($data);
            foreach ($data as $k => $v) {
                echo $v['url'] . ':' . $v['name'] . '<br>';
            }
        });
    }

    /**
     * 显示关键字
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showKeyword()
    {
        // 查找全部keyword
        $keywords = Keyword::orderBy('id', 'desc')->paginate(20);
        return view('TpLink.showKeyword', compact('keywords'));
    }

    /**
     * 关键字提交
     */
    public function storeKeyword(Request $request)
    {
        // 验证表单
        $validator = \Validator::make($request->all(), [
            'value' => 'required|unique:keyword,value',
        ]);
        // 验证失败
        if ($validator->fails()) {
            return redirect()->route('tp.showKeyword')
                ->withErrors($validator)
                ->withInput();
        }
        $keyword = new Keyword();
        $keyword->value = $request->value;
        $keyword->save();
        return redirect()->route('tp.showKeyword')
            ->with([
                'message' => 'Successfully Add Keyword',
                'alert-type' => 'success'
            ]);
    }

    /**
     * 删除关键字
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delKeyword($id)
    {
        // 直接删除用户
        Keyword::findOrFail($id)->delete();
        return redirect()->route('tp.showKeyword');
    }

    public function exportKeyword()
    {
        // 查找所有的关键字
        $keywords = Keyword::all()->toArray();
        // 组装数据
        $data = [];
        foreach ($keywords as $keyword) {
            $data[] = [$keyword['value']];
        }
//        dd($data);
        // 导出excel
        Excel::create('keyword', function ($excel) use ($data) {
            $excel->sheet('Detail', function ($sheet) use ($data) {
                $sheet->rows($data);
            });
        })->export('xls');
    }
}
