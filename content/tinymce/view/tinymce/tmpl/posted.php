<h2>See the source of this page.</h2>
<?php

echo SomeRequest::getVar('content');

echo "\n\n<hr />\n\n";

echo SomeRequest::getString("content","","post",JREQUEST_ALLOWHTML);
