<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template Input</title>
</head>
<body>
    <h1>Input Placeholder Values</h1>

    <!-- Display validation errors -->
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form to submit placeholders -->
    <form action="/generate" method="POST">
        @csrf

        <div id="placeholders">
            <div>
                <label for="key1">Placeholder Key 1:</label>
                <input type="text" name="placeholders[0][key]" id="key1" required>

                <label for="value1">Placeholder Value 1:</label>
                <input type="text" name="placeholders[0][value]" id="value1" required>
            </div>

            <div>
                <label for="key2">Placeholder Key 2:</label>
                <input type="text" name="placeholders[1][key]" id="key2" required>

                <label for="value2">Placeholder Value 2:</label>
                <input type="text" name="placeholders[1][value]" id="value2" required>
            </div>
        </div>

        <!-- Button to submit the form -->
        <button type="submit">Save and Download</button>
    </form>
</body>
</html>
