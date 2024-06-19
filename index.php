<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Country State City Dropdown</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Select Country, State, and City</h1>
    <form>
        <label for="country">Country:</label>
        <select id="country" name="country">
            <option value="">Select Country</option>
            <!-- Populate countries from the database -->
            <?php
            $conn = new mysqli('localhost', 'root', '', 'myapp');
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            $sql = "SELECT id, name FROM countries";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['id']}'>{$row['name']}</option>";
            }
            
            $conn->close();
            ?>
        </select>
        
        <br><br>
        
        <label for="state">State:</label>
        <select id="state" name="state">
            <option value="">Select State</option>
        </select>
        
        <br><br>
        
        <label for="city">City:</label>
        <select id="city" name="city">
            <option value="">Select City</option>
        </select>
    </form>

    <script>
        $(document).ready(function() {
            $('#country').change(function() {
                var country_id = $(this).val();
                $.ajax({
                    url: 'get_states.php',
                    type: 'POST',
                    data: { country_id: country_id },
                    success: function(data) {
                        $('#state').html('<option value="">Select State</option>');
                        var states = JSON.parse(data);
                        states.forEach(function(state) {
                            $('#state').append('<option value="' + state.id + '">' + state.name + '</option>');
                        });
                    }
                });
            });
            
            $('#state').change(function() {
                var state_id = $(this).val();
                $.ajax({
                    url: 'get_cities.php',
                    type: 'POST',
                    data: { state_id: state_id },
                    success: function(data) {
                        $('#city').html('<option value="">Select City</option>');
                        var cities = JSON.parse(data);
                        cities.forEach(function(city) {
                            $('#city').append('<option value="' + city.id + '">' + city.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>
