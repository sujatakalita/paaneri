<div class="needs-validation">
    <div class="form-group">
        <label for="validationCustom02">Select Mega Menu:</label>
        <select class="custom-select w-100 form-control" name="mega_menu_id" id="mega_menu_id" required>
            <option value="">--Select--</option>
            @foreach($mega_menu as $key=>$mega_menus)
            <option value="{{$mega_menus->id}}">{{$mega_menus->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="validationCustom02">Select Category:</label>
        <select class="custom-select w-100 form-control" name="parent_id" id="parent_id" required>
            <option value="">--Select--</option>
        </select>
    </div>
    <div class="form-group">
        <label for="validationCustom01">Sub Category Name:</label>
        <input class="form-control" name="name" type="text">
    </div>
    <div class="form-group">
        <label for="validationCustom02">Category Image :</label>
        <input class="form-control" name="category_image" type="file" required>
    </div>
    <div class="form-group">
        <label for="validationCustom02" class="mb-1">SEO Title :</label>
        <input class="form-control" name="seoTitle" type="text">
    </div>
    <div class="form-group">
        <label for="validationCustom02" class="mb-1">SEO Description :</label>
        <textarea class="form-control" name="seoDescription" ></textarea>
    </div>
    <div class="form-group">
        <label for="validationCustom02" class="mb-1">SEO Keywords :</label>
        <textarea class="form-control" name="seoKeywords" ></textarea>
        <small>Using cooma, separate each keyword phase.</small>
    </div>
    <div class="form-group">
        <label for="validationCustom02" class="mb-1">Canonical URLs :</label>
        <textarea class="form-control" name="canonicalUrl" ></textarea>
    </div>
    <div class="form-group">
        <label for="validationCustom02">Status:</label>
        <select class="custom-select w-100 form-control" required name="status" id="status">
            <option value="">--Select--</option>
            <option value="1">Active</option>
            <option value="2">InActive</option>
        </select>
    </div>
</div>