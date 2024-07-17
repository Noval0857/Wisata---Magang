<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form with Editor</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <form id="wisataForm" method="POST" action="{{ route('simpan-data') }}" enctype="multipart/form-data">
        @csrf
        <div class="editor" contenteditable="true">
            <p>Content of the editor.</p>
        </div>
        <input type="hidden" name="deskripsi_1" id="deskripsi_1">

        <input type="text" name="nama_wisata" placeholder="Nama Wisata" required>
        <input type="file" name="foto" required>
        <input type="url" name="google_maps_url" placeholder="Google Maps URL" required>
        <input type="hidden" name="category_id" value="1"> <!-- Assumes category_id is 1 for example -->
        <button type="submit">Save</button>
    </form>

    <script>
        $(document).ready(function() {
            $('#wisataForm').on('submit', function(event) {
                var content = $('.editor').html();
                $('#deskripsi_1').val(content);
            });
        });
    </script>
</body>
</html>
