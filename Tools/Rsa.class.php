<?php

namespace Tools;

/**
 * RSA算法类
 * 签名及密文编码：base64字符串/十六进制字符串/二进制字符串流
 * 填充方式: PKCS1Padding（加解密）/NOPadding（解密）
 *
 * Notice:Only accepts a single block. Block size is equal to the RSA key size!
 * 如密钥长度为1024 bit，则加密时数据需小于128字节，加上PKCS1Padding本身的11字节信息，所以明文需小于117字节
 *
 * @author: ZHIHUA_WEI
 * @version: 1.0.0
 * @date: 2017/06/30
 */
class RSA
{
    private $pubKey = '-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCXGSWyuqp6btqueeTBp2nnVsgL
yUNeR6XMPQBd+QosOcN8tPMDDXSDp7ZnJ7IIXdWMD0mMRGwaaSQmy5kGnFcsZDW3
vTtA8eTNHKGghpCFvym8UcQsjBvwuyOeIciw/3XL1YDi73lMt1mCf7CoqJ0Q8IXR
7b+IG8/agwVmfCEskQIDAQAB
-----END PUBLIC KEY-----';
    private $priKey = '-----BEGIN RSA PRIVATE KEY-----
MIICXQIBAAKBgQCXGSWyuqp6btqueeTBp2nnVsgLyUNeR6XMPQBd+QosOcN8tPMD
DXSDp7ZnJ7IIXdWMD0mMRGwaaSQmy5kGnFcsZDW3vTtA8eTNHKGghpCFvym8UcQs
jBvwuyOeIciw/3XL1YDi73lMt1mCf7CoqJ0Q8IXR7b+IG8/agwVmfCEskQIDAQAB
AoGAKaGTIniOCifK9vG81qKS6ludyKmOd0aUZv6TwFCivea4dv7ASiIF7VRjTG7C
fc2kze9UW2JqyqgXftzv78NZvQQCop7mdLseiFCZmTRyx34wRV3HLAtlRxkHI2p5
o36nac1zQZJko8dD3ohcJht2B2aQLKezID97xVRIhJYoL0ECQQDJV34yxaIKooyh
Qtsu2rmku9AV7UkEmBuUtsXa0LWyS/xpRa0SbW2Cw9PyQH6bHCUCu4xQR2W7jsio
NINAy3r5AkEAwB3qIEUq95n9PKpElV4Y37lzpAVdVTkyOEyn8CG7+zg8fasnfhyr
ar9ArMnqD9Ol9JKqVSdhhwAj5tcrhs3MWQJBAI8P+xzKbxxNac1/+svtILHbvbyG
0TZRem+N+0JCwIhDE8QdfR+133Vl/iiJCSzfr7CkYMv+H1xI1W0newfETckCQB7H
rC8nZc7tuQjzLrHPtaSCjeiFg4KX+1fR0EZE4V1KkUaBGX63ES+1HKOSZhHLExew
N+IUwSdj+lyNtMeQSWECQQCMW2t57uTkC/TTnlgz6aJsjTp+Da4izT0XzLAf2D1P
lk/HD994XEZjGQqpfI1mMBxmXqeapm2Fmaa5xOfkoECX
-----END RSA PRIVATE KEY-----';

    /**
     * 构造函数
     *
     * @param string $public_key_file 公钥文件（验签和加密时传入）
     * @param string $private_key_file 私钥文件（签名和解密时传入）
     */
    public function __construct()
    {
    }

    // 私有方法
    /**
     * 自定义错误处理
     */
    private function _error($msg)
    {
        die('RSA Error:' . $msg); //TODO
    }

    /**
     * 检测填充类型
     * 加密只支持PKCS1_PADDING
     * 解密支持PKCS1_PADDING和NO_PADDING
     *
     * @param int  $padding 填充模式
     * @param string $type 加密en/解密de
     * @return bool
     */
    private function _checkPadding($padding, $type)
    {
        if ($type == 'en') {
            switch ($padding) {
                case OPENSSL_PKCS1_PADDING:
                    $ret = true;
                    break;
                default:
                    $ret = false;
            }
        } else {
            switch ($padding) {
                case OPENSSL_PKCS1_PADDING:
                case OPENSSL_NO_PADDING:
                    $ret = true;
                    break;
                default:
                    $ret = false;
            }
        }
        return $ret;
    }

    private function _encode($data, $code)
    {
        switch (strtolower($code)) {
            case 'base64':
                $data = base64_encode('' . $data);
                break;
            case 'hex':
                $data = bin2hex($data);
                break;
            case 'bin':
            default:
        }
        return $data;
    }

    private function _decode($data, $code)
    {
        switch (strtolower($code)) {
            case 'base64':
                $data = base64_decode($data);
                break;
            case 'hex':
                $data = $this->_hex2bin($data);
                break;
            case 'bin':
            default:
        }
        return $data;
    }

    private function _getPublicKey($file)
    {
        $key_content = $this->_readFile($file);
        if ($key_content) {
            $this->pubKey = openssl_get_publickey($key_content);
        }
    }

    private function _getPrivateKey($file)
    {
        $key_content = $this->_readFile($file);
        if ($key_content) {
            $this->priKey = openssl_get_privatekey($key_content);
        }
    }

    private function _readFile($file)
    {
        $ret = false;
        if(is_file($file)) {
            if (!file_exists($file)) {
                $this->_error("The file {$file} is not exists");
            } else {
                $ret = file_get_contents($file);
            }
        }else{
            $ret = $file;
        }
        return $ret;
    }

    private function _hex2bin($hex = false)
    {
        $ret = $hex !== false && preg_match('/^[0-9a-fA-F]+$/i', $hex) ? pack("H*", $hex) : false;
        return $ret;
    }

    /**
     * 生成签名
     *
     * @param string  $data 签名材料
     * @param string  $code 签名编码（base64/hex/bin）
     * @return string 签名值
     */
    public function sign($data, $code = 'base64')
    {
        $ret = false;
        if (openssl_sign($data, $ret, $this->priKey)) {
            $ret = $this->_encode($ret, $code);
        }
        return $ret;
    }

    /**
     * 验证签名
     *
     * @param string $data 签名材料
     * @param string $sign 签名值
     * @param string $code 签名编码（base64/hex/bin）
     * @return bool
     */
    public function verify($data, $sign, $code = 'base64')
    {
        $ret = false;
        $sign = $this->_decode($sign, $code);
        if ($sign !== false) {
            switch (openssl_verify($data, $sign, $this->pubKey)) {
                case 1:
                    $ret = true;
                    break;
                case 0:
                case -1:
                default:
                    $ret = false;
            }
        }
        return $ret;
    }

    /**
     * 加密
     *
     * @param string  $data 明文
     * @param string  $code 密文编码（base64/hex/bin）
     * @param int  $padding 填充方式（貌似php有bug，所以目前仅支持OPENSSL_PKCS1_PADDING）
     * @return string 密文
     */
    public function encrypt($data, $code = 'base64', $padding = OPENSSL_PKCS1_PADDING)
    {
        $ret = false;
        if (!$this->_checkPadding($padding, 'en')) $this->_error('padding error');
        if (openssl_private_encrypt($data, $result, $this->priKey, $padding)) {
            $ret = $this->_encode($result, $code);
        }
        return $ret;
    }

    /**
     * 解密
     *
     * @param string $data 密文
     * @param string $code 密文编码（base64/hex/bin）
     * @param int $padding 填充方式（OPENSSL_PKCS1_PADDING / OPENSSL_NO_PADDING）
     * @param bool $rev 是否翻转明文（When passing Microsoft CryptoAPI-generated RSA cyphertext, revert the bytes in the block）
     * @return string 明文
     */
    public function decrypt($data, $code = 'base64', $padding = OPENSSL_PKCS1_PADDING, $rev = false)
    {
        $ret = false;
        $data = $this->_decode($data, $code);
        if (!$this->_checkPadding($padding, 'de')) $this->_error('padding error');
        if ($data !== false) {
            if (openssl_public_decrypt($data, $result, $this->pubKey, $padding)) {
                $ret = $rev ? rtrim(strrev($result), "\0") : '' . $result;
            }
        }
        return $ret;
    }
}