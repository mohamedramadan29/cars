<div class="modal fade" id="edit_slider_{{ $slider['id'] }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> تعديل البانر </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('admin/slider/update/' . $slider['id']) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for=""> حدد الصفحة </label>
                        <select required name="page_name" id="" class="form-select">
                            <option value="" disabled> -- حدد -- </option>
                            <option @if($slider['home_page']  == 'الرئيسية') selected @endif value="الرئيسية"> الرئيسية  </option>
                            <option @if($slider['home_page']  == 'الوكالات') selected @endif value="الوكالات"> الوكالات   </option>
                            <option @if($slider['home_page']  == 'المعارض') selected @endif value="المعارض"> المعارض   </option>
                            <option @if($slider['home_page']  == 'ارقام مميزة') selected @endif value="ارقام مميزة"> ارقام مميزة   </option>
                            <option @if($slider['home_page']  == 'مركز صيانة') selected @endif value="مركز صيانة"> مركز صيانة   </option>
                            <option @if($slider['home_page']  == 'تاجير') selected @endif value="تاجير"> تاجير   </option>
                            <option @if($slider['home_page']  == 'غسيل السيارات') selected @endif value="غسيل السيارات"> غسيل السيارات    </option>
                            <option @if($slider['home_page']  == 'شركات المزاد') selected @endif value="شركات المزاد"> شركات المزاد   </option>
                            <option @if($slider['home_page']  == 'معرض الادوات الاحتياطية') selected @endif value="معرض الادوات الاحتياطية"> معرض الادوات الاحتياطية    </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for=""> الصورة </label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                        <img src="{{ asset('assets/uploads/Slider/' . $slider['image']) }}" width="60px" alt="">
                    </div>
                    <div class="mb-3">
                        <label for=""> اضافة رابط </label>
                        <input type="text" name="link" class="form-control" value="{{ $slider['link'] }}">
                    </div>
                    <div class="mb-3">
                        <label for=""> الحالة </label>
                        <select required name="status" id="" class="form-select">
                            <option value="" selected disabled> -- حدد -- </option>
                            <option @if ($slider['status'] == 1) selected @endif value="1"> نشط </option>
                            <option @if ($slider['status'] == 0) selected @endif value="0"> غير نشط </option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> رجوع</button>
                    <button type="submit" class="btn btn-primary"> تعديل  </button>
                </div>
            </form>
        </div>
    </div>
</div>
