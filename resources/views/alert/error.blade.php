@if ($errors->any())
    <div class='alert alert-danger text-center' style="width: 50%; margin: 10px auto">
        <button class='close' data-dismiss='alert'>&times;</button> {{ implode('', $errors->all(':message')) }}</div>
@endif
