<form action="/convert-pdf-to-html" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="pdf">
    <button type="submit">Convert PDF to HTML</button>
</form>
