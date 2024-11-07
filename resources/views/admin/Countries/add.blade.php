<div class="modal fade" id="add_country" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">  اضافة دولة جديدة   </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url('admin/country/add')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div>
                        <label for=""> الاسم   </label>
                        <input type="text" name="name_ar" class="form-control">
                    </div>
                    <div>
                        <label for=""> الاسم باللغة الانجليزية    </label>
                        <input type="text" name="name_en" class="form-control">
                    </div>
                    <div>
                        <label for=""> المدن   <span class="badge badge-soft-danger">  افصل بين كل مدينة والاخري ب ( - ) </span>  </label>
                        <textarea name="citizen_ar" class="form-control" id=""></textarea>
                    </div>
                    <div>
                        <label for=""> المدن باللغة الانجليزية   <span class="badge badge-soft-danger">  افصل بين كل مدينة والاخري ب ( - ) ويكون نفس ترتيب اللغة العربية  </span>  </label>
                        <textarea name="citizen_en" class="form-control" id=""></textarea>
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
