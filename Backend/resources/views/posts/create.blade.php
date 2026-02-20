<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Creator Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 50px;
        }
        .form-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
        }
        /* Match the specific border color in your image for the focused/active field */
        .custom-input-focus:focus {
            border-color: #c0ccff;
            box-shadow: 0 0 0 0.25rem rgba(192, 204, 255, 0.5);
        }
        /* Styling for the green submit button */
        .btn-submit {
            background-color: #198754;
            color: white;
            padding: 8px 24px;
            border: none;
        }
        .btn-submit:hover {
            background-color: #157347;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="form-container">
        <form method="POST" action="{{route('posts.store')}}">
                @csrf
            <div class="mb-3">
                <label for="postTitle" class="form-label text-secondary">Title</label>
                <input name="title" type="text" class="form-control custom-input-focus" id="postTitle">
            </div>

            <div class="mb-3">
                <label for="postDescription" class="form-label text-secondary">Description</label>
                <textarea name="text" class="form-control custom-input-focus" id="postDescription" rows="4"></textarea>
            </div>

            <div class="mb-4">
                <label for="postCreator" class="form-label text-secondary">Post Creator</label>
                <select name="creator" class="form-select border-primary-subtle shadow-sm" id="postCreator" style="border-width: 2px;">
                    <option selected>Ahmed</option>
                    <option value="1">Sarah</option>
                    <option value="2">John</option>
                </select>
            </div>

            <button type="submit" class="btn btn-submit rounded-1">Submit</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
