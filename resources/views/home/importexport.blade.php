<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <style>
        /* General body styling */
body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

/* Container styling */
.container {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    width: 100%;
    max-width: 400px;
}

/* Title styling */
h1 {
    margin-bottom: 20px;
    color: #333;
}

/* File input styling */
input[type="file"] {
    display: none;
}

/* File label styling */
.file-label {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border-radius: 4px;
    cursor: pointer;
}

/* Button styling */
.upload-button {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 20px;
    background-color: #28a745;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

.upload-button:hover {
    background-color: #218838;
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Upload Your File</h1>
        <form action="{{ url('import') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" id="fileInput"  onchange="document.getElementById('fileName').textContent = this.files[0] ? this.files[0].name : 'No file chosen'" />
            <label for="fileInput" class="file-label">Choose file</label>
            <p id="fileName">No file chosen</p>
            <button type="submit" class="upload-button">Upload</button>

            <a href="{{ route('export') }}">Export File</a>

        </form>
    </div>
</body>
</html>
