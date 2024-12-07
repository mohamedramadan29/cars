<div class="modal fade" id="add_country" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">  اضافة بانر جديد    </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url('admin/slider/add')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for=""> حدد الصفحة    </label>
                        <select required name="page_name" id="" class="form-select">
                            <option value="" selected disabled> -- حدد  -- </option>
                            <option value="الرئيسية"> الرئيسية  </option>
                            <option value="الوكالات"> الوكالات   </option>
                            <option value="المعارض"> المعارض   </option>
                            <option value="ارقام مميزة"> ارقام مميزة   </option>
                            <option value="مركز صيانة"> مركز صيانة   </option>
                            <option value="تاجير"> تاجير   </option>
                            <option value="غسيل السيارات"> غسيل السيارات    </option>
                            <option value="شركات المزاد"> شركات المزاد   </option>
                            <option value="معرض الادوات الاحتياطية"> معرض الادوات الاحتياطية    </option>
                        </select>
                    </div>
                    <div  class="mb-3">
                        <label for="">  الصورة   </label>
                        <input required type="file" name="image" class="form-control" accept="image/*">
                    </div>
                    <div  class="mb-3">
                        <label for="">  اضافة رابط </label>
                        <input type="text" name="link" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> رجوع</button>
                    <button type="submit" class="btn btn-primary"> اضافة  </button>
                </div>
            </form>
        </div>
    </div>
</div>
