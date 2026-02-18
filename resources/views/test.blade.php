<!DOCTYPE html>
<html>
<head>
    <title>Select2 Test</title>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body>

<select id="cities" multiple style="width:300px">
    <option value="1">Karachi</option>
    <option value="2">Lahore</option>
    <option value="3">Islamabad</option>
</select>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$(document).ready(function () {
    $('#cities').select2();
});
</script>

</body>
</html>
