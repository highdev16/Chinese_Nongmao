<?php
file_put_contents("../keywords.txt", $_REQUEST['keywords']);
file_put_contents("../description.txt", $_REQUEST['description']);
file_get_contents("http://localhost:8080/generatestaticpages");
echo 'success';