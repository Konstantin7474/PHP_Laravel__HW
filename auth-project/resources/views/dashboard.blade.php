<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <style>
        body {
            background: #f3f4f6;
        }
    </style>
</head>

<body>
    <h1 class="text-2xl">Test Dashboard</h1>
    {{ auth()->user()->name }}
</body>

</html>