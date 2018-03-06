<?php

namespace Tools;

/**
 * RSA�㷨��
 * ǩ�������ı��룺base64�ַ���/ʮ�������ַ���/�������ַ�����
 * ��䷽ʽ: PKCS1Padding���ӽ��ܣ�/NOPadding�����ܣ�
 *
 * Notice:Only accepts a single block. Block size is equal to the RSA key size!
 * ����Կ����Ϊ1024 bit�������ʱ������С��128�ֽڣ�����PKCS1Padding�����11�ֽ���Ϣ������������С��117�ֽ�
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
     * ���캯��
     *
     * @param string $public_key_file ��Կ�ļ�����ǩ�ͼ���ʱ���룩
     * @param string $private_key_file ˽Կ�ļ���ǩ���ͽ���ʱ���룩
     */
    public function __construct()
    {
    }

    // ˽�з���
    /**
     * �Զ��������
     */
    private function _error($msg)
    {
        die('RSA Error:' . $msg); //TODO
    }

    /**
     * ����������
     * ����ֻ֧��PKCS1_PADDING
     * ����֧��PKCS1_PADDING��NO_PADDING
     *
     * @param int  $padding ���ģʽ
     * @param string $type ����en/����de
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
     * ����ǩ��
     *
     * @param string  $data ǩ������
     * @param string  $code ǩ�����루base64/hex/bin��
     * @return string ǩ��ֵ
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
     * ��֤ǩ��
     *
     * @param string $data ǩ������
     * @param string $sign ǩ��ֵ
     * @param string $code ǩ�����루base64/hex/bin��
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
     * ����
     *
     * @param string  $data ����
     * @param string  $code ���ı��루base64/hex/bin��
     * @param int  $padding ��䷽ʽ��ò��php��bug������Ŀǰ��֧��OPENSSL_PKCS1_PADDING��
     * @return string ����
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
     * ����
     *
     * @param string $data ����
     * @param string $code ���ı��루base64/hex/bin��
     * @param int $padding ��䷽ʽ��OPENSSL_PKCS1_PADDING / OPENSSL_NO_PADDING��
     * @param bool $rev �Ƿ�ת���ģ�When passing Microsoft CryptoAPI-generated RSA cyphertext, revert the bytes in the block��
     * @return string ����
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