<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
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
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        /* Custom blue focus to match the "Post Creator" style in your image */
        .form-control:focus, .form-select:focus {
            border-color: #a0b1ff;
            box-shadow: 0 0 0 0.25rem rgba(160, 177, 255, 0.25);
        }
        .btn-update {
            background-color: #198754;
            color: white;
            padding: 8px 24px;
            border: none;
            transition: 0.2s;
        }
        .btn-update:hover {
            background-color: #146c43;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="form-container">
        <h4 class="mb-4 text-dark">Edit Post</h4>
        <form method="POST" action="{{ route('posts.update', 1) }}">
            @csrf
            @method('PUT')
                <div class="mb-3">
                <label for="editTitle" class="form-label fw-semibold text-secondary">Title</label>
                <input type="text" class="form-control" id="editTitle" value="My First Bootstrap Post">
            </div>

            <div class="mb-3">
                <label for="editDescription" class="form-label fw-semibold text-secondary">Description</label>
                <textarea class="form-control" id="editDescription" rows="5">This is the existing content that needs to be updated by the user.</textarea>
            </div>

            <div class="mb-4">
                <label for="editCreator" class="form-label fw-semibold text-secondary">Post Creator</label>
                <select class="form-select border-primary-subtle shadow-sm" id="editCreator" style="border-width: 2px;">
                    <option value="Ahmed" selected>Ahmed</option>
                    <option value="Sarah">Sarah</option>
                    <option value="John">John</option>
                </select>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-update rounded-1">Update Post</button>
                <a href="#" class="btn btn-outline-secondary rounded-1">Cancel</a>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
