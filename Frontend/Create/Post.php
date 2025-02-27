<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
</head>

<body>
    <form action="javascript:void(0)" method="post" onsubmit="Create()">
        <table>
            <tr>
                <th>Create</th>
            </tr>
            <tr>
                <th>title</th>
                <td><input type="text" name="title" id="title"></td>
            </tr>
            <tr>
                <th>description</th>
                <td><input type="text" name="description" id="description"></td>
            </tr>
            <tr>
                <th>Choose img</th>
                <td><input type="file" name="img" id="img"></td>
            </tr>
            <tr>
                <td>
                    <button type="submit">Create</button>
                </td>
            </tr>
        </table>
    </form>

    <script type="text/javascript" src="../JS/Create/Post.js"></script>
</body>

</html>