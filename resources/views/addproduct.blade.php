<form method="POST" action="{{ route('addproduct2') }}" enctype="multipart/form-data">
    <input type="file" name="file" id="filex">
    @csrf
    <button>Submit</button>
</form>