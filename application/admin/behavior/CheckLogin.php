<?php

namespace app\admin\behavior;

class CheckLogin{
    public function run(&$params)
    {
        //判断是否有session 防止翻墙
        $mg_name = session('mg_name');
        if (empty($mg_name))
        {
            $url = url('admin/manager/login');
            echo <<<eof
            <script type="text/javascript">
             window.top.location.href="$url";
           </script>
eof;


        }
    }
}