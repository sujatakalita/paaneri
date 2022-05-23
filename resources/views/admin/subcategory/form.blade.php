<div class="needs-validation">
    <div class="form-group mb-0">
        <label for="validationCustom02" class="mb-1">Select Category:</label>
        <select class="custom-select w-100 form-control" name="parent_id" required>
            <option value="">--Select--</option>
            @foreach($categories as $key=>$category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="validationCustom01" class="mb-1">Sub Category Name:</label>
        <input class="form-control" name="name" id="name" type="text">
    </div>
    <div class="form-group mb-0">
        <label for="validationCustom02" class="mb-1">Category Image :</label>
        <input class="form-control" name="category_image" id="category_image" type="file">
    </div>
    <div class="form-group mb-0">
        <label for="validationCustom02" class="mb-1">Status:</label>
        <select class="custom-select w-100 form-control" required name="status" id="status">
            <option value="">--Select--</option>
            <option value="1">Active</option>
            <option value="2">InActive</option>
        </select>
    </div>
</div>