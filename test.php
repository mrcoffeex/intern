<!DOCTYPE html>
<html>
<head>
  <!-- Include Tagify CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">
</head>
<body>

  <!-- Textarea with tags input -->
  <textarea id="tags-input"></textarea>

  <!-- Include Tagify JavaScript at the end -->
  <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.min.js"></script>

  <script>
    // Initialize Tagify
    var input = document.querySelector('textarea[id="tags-input"]');
    new Tagify(input);
  </script>
</body>
</html>