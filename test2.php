<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>jQuery Word Export Plugin Demo</title>
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="page-content">
<h1>Hello, world!</h1>
<select>
<option value="hello">hello</option>
</select>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vehicula bibendum lacinia. Pellentesque placerat interdum nisl non semper. Integer ornare, nunc non varius mattis, nulla neque venenatis nibh, vitae cursus risus quam ut nulla. Aliquam erat volutpat. Aliquam erat volutpat. Etiam eu auctor risus, condimentum sodales nisi. Curabitur aliquam, lorem accumsan aliquam mattis, sem ipsum vulputate quam, at interdum nisl turpis pharetra odio. Vivamus diam eros, mattis eu dui nec, blandit pulvinar felis.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vehicula bibendum lacinia. Pellentesque placerat interdum nisl non semper. Integer ornare, nunc non varius mattis, nulla neque venenatis nibh, vitae cursus risus quam ut nulla. Aliquam erat volutpat. Aliquam erat volutpat. Etiam eu auctor risus, condimentum sodales nisi. Curabitur aliquam, lorem accumsan aliquam mattis, sem ipsum vulputate quam, at interdum nisl turpis pharetra odio. Vivamus diam eros, mattis eu dui nec, blandit pulvinar felis.</p>
</div>
<a class="word-export" href="javascript:void(0)"> Export as .doc </a>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="functions/FileSaver.js"></script>
<script src="functions/jquery.wordexport.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $("a.word-export").click(function(event) {
            $("#page-content").wordExport();
        });
    });
    </script>
</body>

</html>
