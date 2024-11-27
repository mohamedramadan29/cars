<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Http\Traits\Slug_Trait;
use App\Http\Traits\Upload_Images;
use App\Models\admin\CarMark;
use App\Models\admin\State;
use App\Models\front\ProductGallary;
use App\Models\front\shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ShopController extends Controller
{
    use Message_Trait;
    use Slug_Trait;
    use Upload_Images;

    public function products()
    {
        $products = shop::all();
        $marks = CarMark::all();
        return view('front.products', compact('products','marks'));
    }

    public function product_details($user_id, $slug)
    {
        $product = shop::with('gallary','User')->where('slug', $slug)->where('user_id', $user_id)->first();
        if ($product) {
            return view('front.product-details', compact('product'));
        }
    }


    public function index()
    {
        $products = shop::where('user_id', Auth::id())->get();
        return view('front.users.products.index', compact('products'));
    }

    public function store(Request $request)
    {
        $citizen = State::all();
        if ($request->isMethod('post')) {
            try {

                $data = $request->all();

                $rules = [
                    'name' => 'required',
                    'city' => 'required',
                    'price' => 'required',
                    'phone' => 'required',
                    'image' => 'required|image|mimes:jpg,png,jpeg,webp',
                    'desc' => 'required'
                ];
                $messages = [

                    'name.required' => ' من فضلك حدد اسم المنتج   ',
                    'city.required' => ' من فضلك حدد المدينة   ',
                    'price.required' => ' من فضلك ادخل السعر   ',
                    'phone.required' => ' من فضلك  ادخل رقم الهاتف  ',
                    'image.image' => ' من فضلك ادخل صورة فقط ',
                    'image.mimes' => ' نوع الصورة فقط jpg, png , jpeg , webp ',
                    'desc.required' => ' من فضلك ادخل وصف المنتج  ',
                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return Redirect::back()->withInput()->withErrors($validator);
                }

                if ($request->hasFile('image')) {
                    $file_name = $this->saveImage($request->image, public_path('assets/uploads/Products'));
                }
                DB::beginTransaction();
                $product = new shop();
                $product->user_id = Auth::id();
                $product->name = $data['name'];
                $product->slug = $this->CustomeSlug($data['name']);
                $product->city_id = $data['city'];
                $product->price = $data['price'];
                $product->phone = $data['phone'];
                $product->whatsapp = $data['whatsapp'];
                $product->desc = $data['desc'];
                $product->main_image = $file_name;
                $product->save();

                //$gallary = new ProductGallary();
                if ($request->hasFile('gallary')) {
                    foreach ($request->file('gallary') as $img) {
                        $img_file = $this->saveImage($img, public_path('assets/uploads/ProductsGallary'));
                        ProductGallary::create([
                            'product_id' => $product->id,
                            'image' => $img_file,
                        ]);
                    }
                }
                DB::commit();
                return $this->success_message(' تم اضافة المنتج بنجاح  ');

            } catch (\Exception $e) {
                return $this->exception_message($e);
            }
        }

        return view('front.users.products.add', compact('citizen'));
    }

    public function update(Request $request, $id)
    {
        $citizen = State::all();
        $product = shop::where('user_id', Auth::id())->where('id', $id)->first();
        if ($request->isMethod('post')) {
            try {

                $data = $request->all();
                $rules = [
                    'name' => 'required',
                    'city' => 'required',
                    'price' => 'required',
                    'phone' => 'required',
                    'desc' => 'required'
                ];
                if ($request->hasFile('image')) {
                    $rules['image'] = 'required|image|mimes:jpg,png,jpeg,webp';
                }
                $messages = [

                    'name.required' => ' من فضلك حدد اسم المنتج   ',
                    'city.required' => ' من فضلك حدد المدينة   ',
                    'price.required' => ' من فضلك ادخل السعر   ',
                    'phone.required' => ' من فضلك  ادخل رقم الهاتف  ',
                    'image.image' => ' من فضلك ادخل صورة فقط ',
                    'image.mimes' => ' نوع الصورة فقط jpg, png , jpeg , webp ',
                    'desc.required' => ' من فضلك ادخل وصف المنتج  ',
                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return Redirect::back()->withInput()->withErrors($validator);
                }

                if ($request->hasFile('image')) {
                    $file_name = $this->saveImage($request->image, public_path('assets/uploads/Products'));
                }
                if ($request->hasFile('image')) {
                    /////// Delete Old Image
                    $old_image = public_path('assets/uploads/Products/' . $product['logo']);
                    if (file_exists($old_image)) {
                        unlink($old_image);
                    }
                    $file_name = $this->saveImage($request->image, public_path('assets/uploads/Products'));
                    $product->update([
                        'main_image' => $file_name,
                    ]);
                }
                DB::beginTransaction();
                $product->update([
                    "name" => $data['name'],
                    "slug" => $this->CustomeSlug($data['name']),
                    "city_id" => $data['city'],
                    "price" => $data['price'],
                    "phone" => $data['phone'],
                    "whatsapp" => $data['whatsapp'],
                    "desc" => $data['desc'],
                ]);
                //$gallary = new ProductGallary();
                if ($request->hasFile('gallary')) {
                    foreach ($request->file('gallary') as $img) {
                        $img_file = $this->saveImage($img, public_path('assets/uploads/ProductsGallary'));
                        ProductGallary::create([
                            'product_id' => $product->id,
                            'image' => $img_file,
                        ]);
                    }
                }
                DB::commit();
                return $this->success_message(' تم تعديل  المنتج بنجاح  ');

            } catch (\Exception $e) {
                return $this->exception_message($e);
            }
        }

        return view('front.users.products.update', compact('citizen','product'));
    }


}
