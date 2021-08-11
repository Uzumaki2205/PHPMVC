<h1 class="text-center">Input Question Below</h1>
<form class="align-middle p-5" method="POST" action="/PHPMVC/Admin/CreateQuestion">
    <div class="input-group mb-3">
        <span class="input-group-text">Title</span>
        <input type="text" class="form-control" aria-label="Title" name="title" required>
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text">Description</span>
        <input type="text" class="form-control" name="description">
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text">Type Question</span>
        <input type="text" class="form-control" name="type_question">
    </div>
    <div class="input-group mb-3">
        <select class="form-select" name="point_question">
            <option selected value="5">Point of Question (Default = 5)</option>
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20">20</option>
            <option value="25">25</option>
            <option value="30">30</option>
        </select>
    </div>
    <div class="input-group mb-3">
        <div class="input-group-text">
            <input class="form-check-input mt-0" type="checkbox" value="1" name="result">
        </div>
        <input type="text" class="form-control" placeholder="Answer A" name="answer_A" required>
    </div>
    <div class="input-group mb-3">
        <div class="input-group-text">
            <input class="form-check-input mt-0" type="checkbox" value="2" name="result">
        </div>
        <input type="text" class="form-control" placeholder="Answer B" name="answer_B" required>
    </div>
    <div class="input-group mb-3">
        <div class="input-group-text">
            <input class="form-check-input mt-0" type="checkbox" value="3" name="result">
        </div>
        <input type="text" class="form-control" placeholder="Answer C" name="answer_C" required>
    </div>
    <div class="input-group mb-3">
        <div class="input-group-text">
            <input class="form-check-input mt-0" type="checkbox" value="4" name="result">
        </div>
        <input type="text" class="form-control" placeholder="Answer D" name="answer_D" required>
    </div>
    <div class="form-group mb-3" style="float: right">
        <button type="submit" name="create" class="btn btn-primary">Create</button>
        <a href="/PHPMVC/Admin/Index"><button type="button" class="btn btn-danger">Cancel</button></a>
    </div>
</form>