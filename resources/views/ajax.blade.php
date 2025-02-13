<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AJAX POST Example</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <h1>AJAX POST Example</h1>

    <form id="ajax-form">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br><br>

        <button type="submit">Submit</button>
    </form>

    <div id="response" style="margin-top: 20px; color: green;"></div>

    <script>
        $(document).ready(function() {
            // Handle form submission
            $('#ajax-form1').on('submit', function(e) {
                e.preventDefault(); // Prevent the form from submitting traditionally

                // Get form data
                const formData = {
                    name: $('#name').val(),
                    email: $('#email').val(),
                };

                // AJAX POST request using jQuery
                $.ajax({
                    url: "{{ route('ajax.post') }}",
                    type: "POST",
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token
                    },
                    success: function(response) {
                        $('#response').text(response.message);
                    },
                    error: function(xhr) {
                        const errors = xhr.responseJSON.errors;
                        if (errors) {
                            let errorMsg = '';
                            for (const field in errors) {
                                errorMsg += errors[field][0] + '\n';
                            }
                            alert(errorMsg);
                        }
                    }
                });
            });

            $('#ajax-form').on('submit', function(e) {
                e.preventDefault();

                const formData = {
                    name: $('#name').val(),
                    email: $('#email').val(),
                };

                axios.post("{{ route('ajax.post') }}", formData)
                    .then(function(response) {
                        $('#response').text(response.data.message);
                    })
                    .catch(function(error) {
                        if (error.response && error.response.data.errors) {
                            let errorMsg = '';
                            for (const field in error.response.data.errors) {
                                errorMsg += error.response.data.errors[field][0] + '\n';
                            }
                            alert(errorMsg);
                        }
                    });
            });

        });
    </script>
</body>

</html>
