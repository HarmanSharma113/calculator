<!DOCTYPE html>
<html>
<head>
    <title>Volumetric Weight Calculator</title>
</head>

<body>
    <h1 >Volumetric Weight Calculator</h1>
    <form id="volumetric-weight-form">
        @csrf
        <label for="length">Length (cm):</label>
        <input type="number" id="length" name="length" required><br>
        <br>
        <label for="width">Width (cm):</label>
        <input type="number" id="width" name="width" required><br>
        <br>
        <label for="height">Height (cm):</label>
        <input type="number" id="height" name="height" required><br>
        <br>
        <label for="weight">Weight:</label>
        <input type="number" id="weight" name="weight" required><br>
        <br>
        <label for="weightUnit">Weight Unit:</label>
        <select id="weightUnit" name="weightUnit">
            <option value="kg">Kilograms (kg)</option>
            <option value="lbs">Pounds (lbs)</option>
        </select><br>

        <button type="submit">Calculate</button>
    </form>

    <div id="result"></div>
    <div id="converted-weight"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#volumetric-weight-form").submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: '/calculate-volumetric-weight',
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        $("#result").html("Volumetric Weight: " + response.volumetricWeight.toFixed(2) + " kg");
                        $("#converted-weight").html("Weight: " + response.convertedWeight.toFixed(2) + " " + $("#weightUnit").val());
                    },
                    error: function(xhr) {
                        alert("An error occurred. Please try again.");
                    }
                });
            });
        });
    </script>
</body>
</html>
