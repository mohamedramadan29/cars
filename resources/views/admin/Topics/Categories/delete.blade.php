<div class="modal fade" id="delete_category_{{$category['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> حذف القسم  </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url('admin/topic_category/delete/'.$category['id'])}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mb-2">
                        <label for="">  الاسم   </label>
                        <input type="text" name="name" class="form-control" value="{{$category->getTranslation('name','ar')}}">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> رجوع</button>
                    <button type="submit" class="btn btn-danger"> حذف القسم  </button>
                </div>
            </form>
        </div>
    </div>
</div>
