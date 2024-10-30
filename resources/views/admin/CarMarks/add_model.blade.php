<div class="modal fade" id="store_model" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> ادخال الموديلات  </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url('admin/car_mark/models/store')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div>
                        <label for="">  اسم الماركة   </label>
                        <input type="text" name="name" class="form-control" disabled readonly value="{{$mark['name']}}">
                        <input type="hidden" name="mark_id" class="form-control"   value="{{$mark['id']}}">
                    </div>
                    <div>
                        <label for="">  اسم الموديل   </label>
                        <input type="text" name="model_name" class="form-control">
                    </div>
                    <br>
                    <div>
                        <label for="">  اسم الموديل باللغة الانجليزية  </label>
                        <input type="text" name="model_name_en" class="form-control">
                    </div>


                    <br>
{{--                    <div>--}}
{{--                        <label for="">   ادخل الموديلات  <span class="badge badge-danger bg-danger"> افصل بين الموديل والاخر ب (-) </span>  </label>--}}
{{--                        <textarea name="models" id="" class="form-control"></textarea>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <label for="">  باللغة الانجليزية <span class="badge badge-danger bg-danger"> افصل بين الموديل والاخر ب (-) </span>  </label>--}}
{{--                        <textarea name="models_en" id="" class="form-control"></textarea>--}}
{{--                    </div>--}}
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> رجوع</button>
                    <button type="submit" class="btn btn-primary"> اضافة  </button>
                </div>
            </form>
        </div>
    </div>
</div>
