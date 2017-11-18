<?php

//分页计数
function icount($num=10) {
    $i = 1;
    if ($_GET['p'])
        if ($_GET['p'] == 1) {
            $i = 1;
        } else {
            $i = 1 + ($_GET['p'] - 1) * $num;
        }
    return $i;
}


//分割符
function _sort($_string, $_num) {
    if (mb_strlen($_string, 'utf-8') > $_num) {
        $_string = mb_substr($_string, 0, $_num, 'utf-8') . '...';
    }
    return $_string;
}

//自定义函数验证
function checkPlace() {
    if (empty($_POST['dv_room_id']) && empty($_POST['dv_place'])) {
        return false;
    }
    return true;
}

//抓取函数
function curl_request($url, $post = '', $referer = '', $show = 1) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0)');
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
    curl_setopt($curl, CURLOPT_HEADER, $show);
    curl_setopt($curl, CURLOPT_REFERER, "http://");
    curl_setopt($curl, CURLOPT_TIMEOUT, 10);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    if ($post) {
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post));
    }
    if ($referer) {
        curl_setopt($curl, CURLOPT_REFERER, $referer);
    }
    $data = curl_exec($curl);
    curl_close($curl);
    return $data;
}

//模拟登录正方系统，失败返回0，成功返回学号姓名。
function analogLogin($user, $pw) {
    $url = 'http://210.38.162.117/default2.aspx';
    $result = curl_request($url);

    $pattern = '/<input type="hidden" name="__VIEWSTATE" value="(.*?)" \/>/is';
    preg_match_all($pattern, $result, $matches);
    $viewstate = $matches[1][0];

    preg_match('/Location: \/\((.*)\)/', $result, $temp);
    $temp = $temp[1];

    $url2 = 'http://210.38.162.117/(' . $temp . ')/default2.aspx';
    $button = iconv('utf-8', 'gb2312', '学生');
    $post = array(
        '__VIEWSTATE' => $viewstate,
        'txtUserName' => $user,
        'TextBox2' => $pw,
        'txtSecretCode' => '',
        'RadioButtonList1' => $button,
        'Button1' => '',
        'lbLanguage' => '',
        'hidpdrs' => '',
        'hidsc' => '',
    );
    $result2 = curl_request($url2, $post);
    $url3 = 'http://210.38.162.117/(' . $temp . ')/xs_main.aspx?xh=' . $user;
    $result3 = curl_request($url3);
    preg_match('/<span id=\"xhxm\">(.*)<\/span>/', $result3, $name);
    $ico = iconv('gb2312', 'utf-8', $name[1]);
    if (empty($name[1])) {
        return 0;
    }
    $person = explode('  ', $ico);
    $person['id'] = $person[0];
    $person['name'] = rtrim($person[1], '学');
    $person['name'] = rtrim($person['name'], '同');

    $post_m['xh'] = $person['id'];
    $post_m['xm'] = $person['name'];
    $post_m['gnmkdm'] = 'N121501';

    $sid = http_build_query($post_m);
    $url4 = 'http://210.38.162.117/(' . $temp . ')/xsgrxx.aspx?' . $sid;
    $referer = 'http://210.38.162.117/(' . $temp . ')/xs_main.aspx?xh=' . $person['id'];
    $result4 = curl_request($url4, $post_m, $referer);
    preg_match('/<span id=\"lbl_xzb\">(.*)<\/span>/', $result4, $class);
    $person['class'] = iconv('gb2312', 'utf-8', $class[1]);

    return $person;
}

//密码验证
function verifyPwd($pwd){
    $pattern = '/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,21}$/';
    return preg_match($pattern, $pwd);
}

//返回第一个数字数组有而第二个数组数组没有的数字数组
function array_dif($array,$array2){
    $info = array();
    foreach($array as $val){
        foreach($array2 as $val2){
            if($val==$val2){
                continue 2;
            } 
        }
        $info[] = $val;
    }
    return $info;
}

?>