简易自建图床。

用户需要更改的位置:

* 1.

  /list/index.php 

  更改外链的显示前缀为您的地址。

  ```php
  $link = "http://******/pic/".$value;
  ```

* 2.

  /login/fun.php

  更改您的用户名和密码。

  ```
  if($account="******" && $passwd="*******")
  ```

* 3.
  /favicon.ico
  更改网站ico

停更中
